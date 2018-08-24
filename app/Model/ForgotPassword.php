<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/4/14
 * Time: 8:17 AM
 */

App::uses('AppModel', 'Model');

class ForgotPassword extends AppModel{

    public $useTable = false;

    var $validate = array(
        'email' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Email is not empty!'
            ),
            'email' => array(
                'rule'    => array('email', true),
                'message' => 'Email is not valid'
            ),
        ),
        'captcha' => array(
            'empty' => array(
                'rule' => 'notEmpty',
                'message' => 'Captcha is not empty!'
            ),
            'captcha' => array(
                'rule' => 'checkCaptcha',
                'message' => 'Captcha is not valid!'
            )
        )
    );

} 