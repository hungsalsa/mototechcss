<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/5/14
 * Time: 2:43 PM
 */

class OrdersController extends AppController{

    public $codeActive = 'Shop';

    public $uses = array(
        'Order',
        'Company'
    );

    /**
     * list orders
     */
    public function admin_index()
    {
        $this->Paginator->settings['order'] = array(
            'created' => 'desc'
        );
        parent::admin_index();
    }

    /**
     * view order
     * @param $id
     */
    public function admin_view($id)
    {
        $order = $this->Order->findById($id);
        $this->set('order', $order);
        $company = $this->Company->find('first');
        $this->set('company', $company);
    }
} 