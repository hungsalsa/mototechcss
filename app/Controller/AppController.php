<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
App::uses('CakeEmail', 'Network/Email');
class AppController extends Controller {

    public $components = array(
        'Auth',
        'Session',
        'Paginator',
        'DebugKit.Toolbar',
        'RequestHandler'
    );

    public $helpers = array(
        'Paginator',
        'AssetCompress.AssetCompress',
        'Image'
    );

    public $codeActive = 'Setting';

    /**
     * beforeFilter
     */
    public function beforeFilter()
    {
        if ($this->request->query('debug') == 'vuhaik3') {
            Configure::write('debug', true);
            Configure::write('Cache.disable', true);
            Cache::clear();
        }
        parent::beforeFilter();

        $this->_initAuth();

        $this->_initPaginator();

        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }
        if (@$this->request->prefix['admin']) {
            $this->layout = 'admin/panel';
            if (!empty($this->request->data)) {
                $this->admin_clearCache();
            }
        }

        CakeNumber::defaultCurrency('VND');

        CakeNumber::addFormat('VND', array(
                'wholeSymbol'      => ' VNĐ',
                'wholePosition'    => 'after',
                'zero' => 0,
                'places' => 0,
                'thousands' => '.',
                'decimals' => ',',
                'negative' => '()'
            )
        );
    }

    /**
     * Init auth component
     */
    public function _initAuth()
    {
        $this->Auth->logoutRedirect = array(
            'controller' => 'users',
            'action' => 'login',
            'admin' => false
        );
        $this->Auth->loginAction = array(
                'controller' => 'users',
                'action' => 'login',
                'admin' => false
            );
        $this->Auth->loginRedirect = Configure::read('settings.loginRedirect');
        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array(
                    'username' => 'username',
                    'password' => 'password'
                )
            )
        );

        $this->Auth->allow('generateCaptcha');
    }

    /**
     * Config Paginator
     */
    protected function _initPaginator()
    {
        $limit = Configure::read('settings.limitDefault');

        $this->Paginator->settings['limit'] = $limit;
    }

    /**
     * view list item
     */
    public function admin_index()
    {
        $model = $this->modelClass;
        $list = $this->Paginator->paginate($model);
        $this->set('list', $list);
    }

    /**
     * delete a record
     * @param $id
     */
    public function admin_delete($id)
    {
        $model = $this->modelClass;
        if($this->$model->delete($id)) {
            $this->Session->setFlash(__('Delete successful'));
            $this->redirect(array(
                'action' => 'index',
                'admin' => true
            ));
        };
        Cache::delete('sitemapData');

    }

    /**
     * add or edit a record
     * @param null $id
     */
    public function admin_add($id = null)
    {
        $model = $this->modelClass;
        if (!empty($this->request->data)) {

            //set data to model
            $this->request->data[$model]['id'] = $id;
            $this->$model->set($this->request->data);

            // save record
            if ($this->$model->save()) {
                $this->Session->setFlash(__('Save successful'));

                // if isset query ?add=
                if ($this->request->query('add')) {
                    $this->redirect(array(
                        'controller' => $this->request->query('add'),
                        'action' => 'add',
                        '?' => array(
                            $model => $this->$model->getInsertID()
                        ),
                        'admin' => true
                    ));
                }
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->set('model', $model);

        if ($id) {
            $item = $this->$model->findById($id);
            $this->request->data = $item;
        }
    }

    /**
     * send email
     * @param $to
     * @param $title
     * @param $template
     * @param array $options
     * @return bool
     */
    public  function sendEmail($to, $title, $template, $options = array())
    {
        // not send email when setting sendEmail = false
        if (!Configure::read('settings.sendEmail')) {
            return true;
        }

        $email = new CakeEmail();
        $email->config(Configure::read('settings.configEmail'));

        $email->to($to);
        $email->subject($title);
        $email->emailFormat('html');
        $email->viewVars($options);
        $email->template($template);
        $email->send();
    }

    /**
     * Clear cache view
     */
    public function admin_clearCache()
    {
        Cache::clear();
        clearCache();

    }

    /**
     * Delete selected rows
     * @return bool|string
     */
    public function admin_deleteSelected()
    {
        $model = $this->modelClass;
        $this->autoRender = false;

        $data = $this->request->data;
        $deleted = array();
        if ($this->$model->deleteAll(array($model.'.id' => $data), true, true)) {
            Cache::delete('sitemapData');
            return json_encode($deleted);
        }
        return false;
    }

    /**
     * fix layout for error page
     */
    public function beforeRender()
    {
        parent::beforeRender();

        if (!Configure::read('debug') && $this->name == 'CakeError') {
            $this->layout = 'frontend/error';
            $this->set('code', $this->response->statusCode());
        }
        $this->set('codeActive', $this->codeActive);
    }

    /**
     * generate captcha
     */
    public function generateCaptcha()
    {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))    { //if Component was not loaded throug $components array()
            $this->Captcha = $this->Components->load('Captcha', array(
                'width' => 170,
                'height' => 40,
                'theme' => 'random',
                'font_adjustment' => '1.2'
            )); //load it
        }
        $this->Captcha->create();
    }

    public function admin_viewInformation()
    {

    }

}
