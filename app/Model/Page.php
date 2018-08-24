<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/11/14
 * Time: 8:39 AM
 */

class Page extends AppModel{

    public $validate = array(
        'slug' => array(
            'rule' => 'isUnique',
            'required' => false,
            'message' => 'Slug is used'
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'type' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'Type is required'
        ),
    );

    public function beforeValidate($options = array())
    {
        parent::beforeValidate($options);
        if (!$this->data['Page']['slug']) {
            $this->data['Page']['slug'] = seo($this->data['Page']['name']);
        } else {
            $this->data['Page']['slug'] = seo($this->data['Page']['slug']);
        }
    }
} 