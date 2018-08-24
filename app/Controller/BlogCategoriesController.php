<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 4:40 PM
 */
App::uses('AppController', 'Controller');
class BlogCategoriesController extends AppController{

    public $uses = array(
        'BlogCategory'
    );

    public $codeActive = 'Blog';

    public function admin_index()
    {
        $typeSearch = $this->request->query('type');
        $key = $this->request->query('key');
        if ($typeSearch) {
            switch ($typeSearch) {
                case 'parent_id':
                    $this->Paginator->settings['conditions'] = array(
                        'BlogCategory.parent_id' => $key
                    );
                    break;
                case 'type':
                    $this->Paginator->settings['conditions'] = array(
                        'BlogCategory.type' => $key
                    );
                    break;
            }
        }
        $this->Paginator->settings['order'] = array(
            'BlogCategory.lft' => 'asc',
        );
        $categories = $this->Paginator->paginate('BlogCategory');
        $this->set('categories', $categories);

    }

    public function admin_add($id = null)
    {
        parent::admin_add($id);

        $categories = $this->BlogCategory->blogCategoriesParent();
        if(empty($categories)){
            $categories = array();
        }
        // END TU THEM

        $parents = $this->BlogCategory->find('list', array(
            'conditions' => array(
                'parent_id' => '',
                'id !=' => $id
            )
        ));
        $this->set('parents', $categories);
        $this->set('types', Configure::read('settings.BlogCategory.types'));
    }
} 