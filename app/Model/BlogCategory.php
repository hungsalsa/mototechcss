<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 5:18 PM
 */

class BlogCategory extends AppModel{

    public $actsAs = array(
        'Tree'
    );
    public $belongsTo = array(
        'blog_categories' => array(
            'class' => 'BlogCategory',
            'foreignKey' => 'parent_id'
        )
    );

    public $hasMany = array(
        'posts' => array(
            'class' => 'Post',
            'fields' => 'name, slug, id',
            'conditions' => array(
                'active' => true,
            ),
            'order' => array(
                'order' => 'asc'
            )
        )
    );

    public $validate = array(
        'slug' => array(
            'rule' => 'isUnique',
            'required' => false,
            'message' => 'Slug is used'
        )
    );

    public function beforeValidate($options = array())
    {
        if (!$this->data['BlogCategory']['slug']) {
            $this->data['BlogCategory']['slug'] = seo($this->data['BlogCategory']['name']);
        } else {
            $this->data['BlogCategory']['slug'] = seo($this->data['BlogCategory']['slug']);
        }
        parent::beforeValidate($options);
    }

    public $dataCatblog; 
    public function blogCategoriesParent($parent=null,$level =""){
         $result =  $this->find('list', array(
            'conditions' => array(
                'parent_id' => $parent,
                'active' => true
            ),
            'order'=>array('name'=>'asc'),
        ));

        $level = "---| ";
        foreach ($result as $key => $value) {
            if($parent == 0){
                $level ="";
            }
            $this->dataCatblog[$key] =  $level.$value;
            self::blogCategoriesParent($key,$level);
        }

        return $this->dataCatblog;
    }


    // public $IDCatblogList; 
    // public function ListIdCateSub($idparent){
    //     return $this->find('list', array(
    //     'fields' => array('id'),
    //     'conditions' => array(
    //         'BlogCategory.active' => true,
    //         'BlogCategory.parent_id' => $idparent
    //         ),
    //     // 'recursive' => 0
    //     );

    // }

} 