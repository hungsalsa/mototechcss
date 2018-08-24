<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 5:18 PM
 */

class ProductCategory extends AppModel{

    public $actsAs = array(
        'Uploader.Attachment' => array(
            // 'containable',
            'image' => array(
                'tempDir' => TMP,
                'nameCallback' => 'renameUploadFile',
                'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                'type' => 'image',
                'finalPath' => '',
                'mimeType' => array('image/gif'),
                'quality' => 100,
                'transforms' => array(
                    'thumb_50' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 50,
                        'height' => 50,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                )
            ),
            'background' => array(
                'tempDir' => TMP,
                'nameCallback' => 'renameUploadFile',
                'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                'type' => 'image',
                'finalPath' => '',
                'mimeType' => array('image/gif'),
                'quality' => 100,
                'transforms' => array(
                    'thumb_50' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 50,
                        'height' => 50,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                )
            )
        ),
        'Tree'
    );

    public $belongsTo = array(
        'product_category' => array(
            'class' => 'ProductCategory',
            'foreignKey' => 'parent_id'
        )
    );

    public $hasMany = array(
        'product_categories' => array(
            'class' => 'ProductCategory',
            'foreignKey' => 'parent_id',
            'conditions' => array(
                'active' => true
            ),
            'fields' => 'name, slug, id, image'
        )
    );

    public $validate = array(
        'slug' => array(
            'rule' => 'isUnique',
            'required' => false,
            'message' => 'Slug is used'
        ),
        'name' => array(
            'rule' => 'notEmpty'
        )
    );

    public function beforeValidate($options = array())
    {
        if (!$this->data['ProductCategory']['slug']) {
            $this->data['ProductCategory']['slug'] = seo($this->data['ProductCategory']['name']);
        } else {
            $this->data['ProductCategory']['slug'] = seo($this->data['ProductCategory']['slug']);
        }
        parent::beforeValidate($options);
    }  


    public $dataCat; 
    public function getCateParent($parent=null,$level =""){
        $dataCat;
         $result =  $this->find('list', array(
            'conditions' => array(
                'parent_id' => $parent,
                'active' => true
            ),
			'order'=>array('name'=>'asc'),
        ));

        $level = "--| ";
        foreach ($result as $key => $value) {
            if($parent == 0){
                $level ="";
            }
            $this->dataCat[$key] =  $level.$value;
            self::getCateParent($key,$level);
        }

        return $this->dataCat;
     } 
} 