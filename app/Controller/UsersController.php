<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/3/14
 * Time: 3:23 PM
 */
App::uses('AppController', 'Controller');
class UsersController extends AppController{

    public $uses = array(
        'User',
        'ForgotPassword'
    );

    public $codeActive = 'User';

    /**
     * callback before filter
     */
    public function beforeFilter()
    {
        parent::beforeFilter();
        $action = $this->request->action;
        $arrLayoutLogin = array(
            'login',
            'forgotPassword',
            'changePasswordToken',
            'register'
        );
        $arrRedirect = array(
            'login',
            'register',
            'forgotPassword'
        );
        if (in_array($action, $arrRedirect)) {
            if ($this->Auth->user('id')) {
                $this->redirect(Configure::read('settings.loginRedirect'));
            }
        }
        if (in_array($action, $arrLayoutLogin)) {
            $this->layout = 'admin/login';
        }
        if ($this->Auth->user('role') < Configure::read('settings.level.UserManagement')) {
            if (!empty($this->request->data)) {
                unset($this->request->data['User']['role']);
                unset($this->request->data['User']['email']);
            }
        }
        $this->Auth->allow('register', 'loginFb', 'login', 'forgotPassword', 'changePasswordToken');
    }
    /**
     * User login
     */
    public function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Login successful'));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'));
            }
        }
    }

    /**
     * User logout
     */
    public function logout()
    {
        $this->Session->destroy();
        if ($this->Auth->logout()) {
            $this->redirect($this->Auth->redirectUrl());
        }
    }

    /**
     * user forgot password
     */
    public function forgotPassword()
    {
        if ($this->request->data) {
            $this->ForgotPassword->set($this->request->data);
            $this->ForgotPassword->captcha = $this->Components->load('Captcha')->getVerCode();
            if($this->ForgotPassword->validates()) {
                $email = $this->request->data['ForgotPassword']['email'];

                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.email' => $email
                    )
                ));
                if (!$user) {
                    $this->Session->setFlash(__('Email not found!'));
                    $this->redirect(array('action' => 'login'));
                }

                $token = $this->User->createToken($user['User']['id'], 200);
                $this->User->id = $user['User']['id'];
                if ($this->User->saveField('token', $token)) {
                    $this->sendEmail($email, __('Reset Password'), 'forgot_password', array(
                        'user' => $user,
                        'token' => $token
                    ));
                    $this->Session->setFlash(__('Please check email to get new password and login here!'));
                    $this->redirect(array('action' => 'login'));
                }

            };
        }
    }

    /**
     * change password when user click to link forgot password
     * @param $token
     * @throws NotFoundException
     */
    public function changePasswordToken($token)
    {
        if (!$token) {
            throw new NotFoundException();
        }
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.token' => $token
            )
        ));
        if (!$user) {
            $this->Session->setFlash(__('Token not found!'));
            $this->redirect(array('action' => 'login'));
        }

        if (!empty($this->request->data)) {
            if ($this->request->data['User']['token'] != $user['User']['token']) {
                throw new NotFoundException();
            }
            if ($this->request->data['User']['id'] != $user['User']['id']) {
                throw new NotFoundException();
            }

            $this->request->data['User']['token'] = null;
            $this->User->set($this->request->data);
            if ($this->User->save()) {
                $this->Session->setFlash(__('Change password successful!'));
                $this->Auth->login($user['User']);
                $this->redirect(Configure::read('settings.loginRedirect'));
            }
        }

        $this->set('token', $token);
        $this->set('user', $user);
    }

    /**
     * user register
     */
    public function register() {
        $this->layout = 'admin/login';
        if (!empty($this->request->data)) {
            $this->request->data['User']['id'] = null;
            $this->request->data['User']['role'] = Configure::read('settings.level.UserRegister');
            $this->User->set($this->request->data);
            if ($this->User->save()) {
                $this->Session->setFlash(__('Register successful!'));
                $this->redirect(array('action' => 'login'));
            }
        }

        // login facebook
//        if (isset($this->request->query['code'])) {
//            $userData = $this->facebookLib->api('/me');
//            if ($userData) {
//                $this->loginFbWithData($userData);
//            }
//        }
//        $urlLogin = $this->facebookLib->getLoginUrl();
//        $this->set('urlLoginFb', $urlLogin);
    }

    /**
     * login with fb
     * @param $userData
     * @return bool|string
     */
    public function loginFbWithData($userData) {

        $exitedUser = $this->User->find('first', array(
            'conditions' => array(
                'User.email' => $userData['email']
            )
        ));

        // if user connected to fb
        if ($exitedUser) {
            $user = $exitedUser;
        } else {
            //create new user
            $user = $this->createUserFb($userData);
        }

        if ($user) {
            if ($this->Auth->login($user['User'])) {
                $this->Session->setFlash(__('Login successful'));
                $this->redirect(Configure::read('settings.loginUserRedirect'));
            };
        }
        return false;
    }

    /**
     * create user from data facebook
     * @param $data
     * @return null
     */
    public function createUserFb($data) {

        $user = null;
        $gender = Configure::read('settings.user.genderFemale');
        if ($data['gender'] == 'male') {
            $gender = Configure::read('settings.user.genderMale');
        }
        $password = $this->User->createToken(null, 7);

        $newUser['User'] = array(
            'email' => $data['email'],
            'facebook_id' => $data['id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $gender,
            'password' => $password,
            'role' => Configure::read('settings.level.UserRegister')
        );
        if ($this->User->save($newUser)) {
            $user = $this->User->read(null,$this->User->id);
        };

        return $user;
    }

    /**
     * List users
     */
    public function admin_index()
    {
        $this->_checkPermission();
        $users = $this->Paginator->paginate('User');
        $this->set('users', $users);
    }

    /**
     * edit profile
     * @param null $id
     */
    public function admin_profile($id = null)
    {
        if (!$id) {
            $id = $this->Auth->user('id');
        } else {
            if ($this->Auth->user('id') != $id && $this->Auth->user('id') < Configure::read('settings.level.UserManagement')) {
                $this->Session->setFlash(__('Permission die'));
                $this->redirect($this->Auth->loginRedirect);
            }
        }

        if (!empty($this->request->data)) {
            $this->User->set($this->request->data);
            if ($this->User->save()) {
                $this->Session->setFlash(__('Save successful'));
            }
        }

        $user = $this->User->findById($id);
        $this->request->data = $user;
    }

    /**
     * add or edit user
     * @param null $id
     */
    public function admin_add($id = null)
    {
        $this->_checkPermission();

        parent::admin_add($id);
    }

    /**
     * change password for user
     */
    public function admin_changePassword()
    {
        if (!empty($this->request->data)) {
            $this->request->data['User']['id'] = $this->Auth->user('id');
            $this->User->set($this->request->data);
            if ($this->User->save()) {
                $this->Session->setFlash(__('Save successful'));
                $this->redirect(array('action' => 'profile'));
            };
        }

    }

    /**
     * check permision
     */
    protected function _checkPermission()
    {
        $levelUserManagement = Configure::read('settings.level.UserManagement');
        if ($this->Auth->user('role') < $levelUserManagement) {
            $this->Session->setFlash(__('Permission die'));
            $this->redirect($this->Auth->loginRedirect);
        }
    }
} 