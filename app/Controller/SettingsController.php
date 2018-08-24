<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 1/22/14
 * Time: 11:22 PM
 */

App::uses('AppController', 'Controller');

class SettingsController extends AppController{

    public $codeActive = 'Site';

    var $uses = array(
        'Setting'
    );

    public function admin_index()
    {
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $this->Setting->set($data);
            if ($this->Setting->save()) {
                Cache::clear('setting');
                $this->Session->setFlash(__('Update successful!'));
            }
        }
        $setting = $this->Setting->find('first');
        $this->request->data = $setting;
    }

} 