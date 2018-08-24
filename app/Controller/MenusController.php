<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/9/14
 * Time: 10:16 PM
 */

class MenusController extends AppController{

    public $uses = array(
        'Menu',
        'Page',
        'BlogCategory',
        'ProductCategory'
    );

    public $codeActive = 'Site';

    public function admin_index()
    {
        $this->Paginator->settings['order'] = array(
            'Menu.rght' => 'desc',
        );
        $menus = $this->Paginator->paginate('Menu');
        $this->set('menus', $menus);
    }

    public function admin_add($id = null)
    {
        parent::admin_add($id);
        $parents = $this->Menu->find('list', array(
            'conditions' => array(
                'Menu.id !=' => $id,
                'Menu.parent_id' => ''
            )
        ));
        $this->set('parents', $parents);

        $pages = $this->Page->find('list', array(
            'conditions' => array(
                'Page.active' => true
            )
        ));
        
		// $blogCategory = $this->BlogCategory->find('list', array(
        //     'conditions' => array(
        //         'BlogCategory.active' => true
        //     )
        // ));
		// TU THEM
        $blogCategory = $this->BlogCategory->blogCategoriesParent();

        // echo "<pre>";print_r($blogCategory);
        if(empty($blogCategory)){
            $blogCategory = array();
        }

        // END TU THEM
        $productCategory = $this->ProductCategory->find('list', array(
            'conditions' => array(
                'ProductCategory.active' => true
            )
        ));

        $this->set(array(
            'pages' => $pages,
            'productCategories' => $productCategory,
            'blogCategories' => $blogCategory
        ));
    }
} 