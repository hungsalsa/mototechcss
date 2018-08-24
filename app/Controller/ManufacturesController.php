<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/11/14
 * Time: 9:02 AM
 */

class ManufacturesController extends AppController{

    public $codeActive = 'Shop';

    public function admin_index()
    {
        $this->Paginator->settings['order'] = array(
            'Manufacture.rght' => 'desc',
        );
        $manufactures = $this->Paginator->paginate('Manufacture');
        $this->set('manufactures', $manufactures);
    }

    public function admin_add($id = null)
    {
        parent::admin_add($id);
        $parents = $this->Manufacture->find('list', array(
            'conditions' => array(
                'Manufacture.parent_id' => null
            )
        ));
        $this->set(compact('parents'));

    }
}