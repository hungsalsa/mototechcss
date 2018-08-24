<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/5/14
 * Time: 3:07 PM
 */

class Order extends AppModel{

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true,
        ),
    );

    /**
     * add order from session
     * @param $order
     * @return bool|mixed
     */
    public function addOrderFromSession($order)
    {
        $this->set($order);
        if  ($this->save()) {
            $id = $this->getInsertId();
            return $id;
        };
        return false;
    }
} 