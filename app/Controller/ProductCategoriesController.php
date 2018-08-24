<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/9/14
 * Time: 11:55 AM
 */

class ProductCategoriesController extends AppController{

    public $codeActive = 'Shop';

    /**
     * list category
     */
    public function admin_index()
    {
        unset($this->ProductCategory->hasMany['product']);
        $queries = $this->request->query;
        if (isset($queries['name']) && $queries['name']) {
            $this->Paginator->settings['conditions'] = array(
                'OR' => array(
                    'ProductCategory.name LIKE' => '%'.$queries['name'].'%',
                    'ProductCategory.slug LIKE' => '%'.seo($queries['name']).'%',
                )
            );
            $this->request->data['ProductCategory'] = $queries;
        }

        $this->Paginator->settings['order'] = array(
            'ProductCategory.lft' => 'asc',
        );
        $categories = $this->Paginator->paginate('ProductCategory');
        $this->set('categories', $categories);
    }

    public function admin_add($id = null)
    {

        parent::admin_add($id);
        $parents = $this->ProductCategory->find('list', array(
            'conditions' => array(
                'parent_id' => '',
                'id !=' => $id
            )
        ));
        $this->loadModel('Manufacture');
        $manufactures = $this->Manufacture->find('list', array(
            'conditions' => array(
                'parent_id' => '',
            )
        ));
        $this->set('parents', $parents);
        $this->set(compact('manufactures'));

    }
} 