<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/3/14
 * Time: 8:43 PM
 */

class Manufacture extends AppModel{

    public $actsAs = array(
        'Tree',
    );

    public $belongsTo = array(
        'ParentMenu' => array(
            'className' => 'Manufacture',
            'foreignKey' => 'parent_id'
        )
    );

    public $hasMany = array(
        'Child' => array(
            'className' => 'Manufacture',
            'foreignKey' => 'parent_id',
            'order' => 'order ASC'
        )
    );
} 