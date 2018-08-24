<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/18/14
 * Time: 11:20 PM
 */

class SalesController extends AppController{

    public $codeActive = 'Shop';

    public function admin_index()
    {
        $this->Paginator->settings['order'] = array(
            'created' => 'desc'
        );
        parent::admin_index();
    }
} 