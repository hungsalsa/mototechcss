<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/3/14
 * Time: 8:43 PM
 */

class Menu extends AppModel{

    public $actsAs = array(
        'Uploader.Attachment' => array(
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
        ),
        'Tree'
    );

    public $belongsTo = array(
        'ParentMenu' => array(
            'className' => 'Menu',
            'foreignKey' => 'parent_id'
        )
    );

    /**
     * set child for menu when save
     * @param array $options
     * @return bool|void
     */
    public function beforeSave($options = array())
    {
        parent::beforeSave($options);
        $this->data['Menu']['child'] = $this->data['Menu'][$this->data['Menu']['type']];
        if (isset($this->data['Menu']['parent_id']) && $this->data['Menu']['parent_id']) {
            $this->data['Menu']['order'] = null;
        }
    }

    /**
     * get all menu for display
     * @return array
     */
    public function getAllMenus()
    {
        $menus = $this->find('all', array(
            'conditions' => array(
                'Menu.active' => true,
            ),
            'order' => array(
                'Menu.order' => 'asc',
            ),
            'joins' => array(
                array(
                    'table' => 'product_categories',
                    'alias' => 'ProductCategory',
                    'type' => 'left',
                    'conditions' => array(
                        'Menu.type = "ProductCategory"',
                        'Menu.child = ProductCategory.id'
                    )
                ),
                array(
                    'table' => 'blog_categories',
                    'alias' => 'BlogCategory',
                    'type' => 'left',
                    'conditions' => array(
                        'Menu.type = "BlogCategory"',
                        'Menu.child = BlogCategory.id'
                    )
                ),
                array(
                    'table' => 'pages',
                    'alias' => 'Page',
                    'type' => 'left',
                    'conditions' => array(
                        'Menu.type = "Page"',
                        'Menu.child = Page.id'
                    )
                )
            ),
            'fields' => array(
                'Menu.id',
                'Menu.introduction',
                'Menu.name',
                'Menu.image',
                'Menu.type',
                'Menu.parent_id',
                'Menu.child',
                'ProductCategory.slug',
                'Page.slug',
                'BlogCategory.slug'
            )
        ));

        return $menus;
    }
} 