<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 9:35 PM
 */
App::uses('AppController', 'Controller');
class IntroductionsController extends AppController{

    public $uses = array(
        'Introduction',
        'Post',
        'BlogCategory'
    );

}