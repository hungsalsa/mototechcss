<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/4/14
 * Time: 8:17 AM
 */

class User extends AppModel{

    var $validate = array(
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username is not empty!'
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Username is used!'
            ),
            'minLength' => array(
                'rule'    => array('minLength', 3),
                'message' => 'Username must be at least 3 characters long.'
            ),
            'special' => array(
                'rule' => 'checkSpecialCharacter',
                'message' => 'Please do not enter special character'
            )
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Name user is not empty'
        ),
        'role' => array(
            'rule' => 'notEmpty',
            'message' => 'Please select role'
        ),
        'email' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Email is not empty'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'Email is used'
            ),
            'email' => array(
                'rule'    => array('email', true),
                'message' => 'Email is not valid'
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Password is not empty',
            ),
            'minLength' => array(
                'rule'    => array('minLength', 6),
                'message' => 'Password must be at least 6 characters long.'
            ),
            'maxLength' => array(
                'rule'    => array('maxLength', 15),
                'message' => 'Password must be no larger than 15 characters long.'
            ),

        ),
        'new_password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'New Password is not empty',
            ),
            'minLength' => array(
                'rule'    => array('minLength', 6),
                'message' => 'Password must be at least 6 characters long.'
            ),
            'maxLength' => array(
                'rule'    => array('maxLength', 15),
                'message' => 'Password must be no larger than 15 characters long.'
            ),
        ),
        'old_password'  => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Current pasword not empty'
            ),
            'checkPass' => array(
                'rule' =>'checkOldPassword',
                'message' => 'Current Password does not match'
            )
        ),
        'password_confirm' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'password confirm not empty'
            ),
            'confirmPass' => array(
                'rule' => 'checkConfirmPassword',
                'message' => 'Password & Confirm Password must be match.'
            )
        ),
    );

    /**
     * check special character
     * @return bool
     */
    public function checkSpecialCharacter() {
        $userName = $this->data['User']['username'];
        $specialCharacters = Configure::read('settings.user.character');
        foreach ($specialCharacters as $character) {
            if (strpos($userName, $character)) {
                return false;
                break;
            }
        }
        return true;
    }

    /**
     * before save
     *  - encrypt password for user
     * @param array $options
     * @return bool
     */
    public function beforeSave($options = array())
    {
        parent::beforeSave($options);
        if (isset($this->data[$this->alias]['new_password'])) {
            $this->data[$this->alias]['password'] = $this->data[$this->alias]['new_password'];
        }
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], 'sha1', true);
        }
        return true;
    }

    /**
     * validate old password
     * @return bool
     */
    public function checkOldPassword()
    {
        $check = false;

        $oldPassword = $this->data['User']['old_password'];
        $user = $this->find('first', array(
            'conditions' => array(
                'User.id' => AuthComponent::user('id'),
                'User.password' => Security::hash($oldPassword, 'sha1', true)
            )
        ));
        if ($user) {
            $check = true;
        }
        return $check;
    }

    /**
     * validate confirm password
     * @return bool
     */
    public function checkConfirmPassword()
    {
        return ($this->data['User']['new_password'] === $this->data['User']['password_confirm']);
    }

    /**
     * create random string
     * @param null $special
     * @param int $length
     * @return string
     */
    public function createToken($special = null, $length = 6)
    {
        return substr(sha1(time() . $special . rand()), 1, $length);
    }
} 