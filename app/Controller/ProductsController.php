<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/9/14
 * Time: 12:15 PM
 */

class ProductsController extends AppController{

    public $uses = array(
        'Product',
        'ProductCategory'
    );

    public $codeActive = 'Shop';

    /**
     * admin index
     */
    public function admin_index() {
        $this->Paginator->settings['order'] = array(
            'Product.created' => 'desc'
        );
        $typeSearch = $this->request->query('type');
        $key = $this->request->query('key');
        $conditions = array();

        if ($typeSearch) {
            switch ($typeSearch) {
                case 'parent_id':
                    $conditions['Product.product_category_id'] = $key;
                    break;
                case 'searchForm':
                    $name = $this->request->query('name');
                    $category_id = $this->request->query('category');
                    $status = $this->request->query('status');
                    if ($name) {
                        $conditions['Product.name LIKE'] = '%'.$name.'%';
                    }
                    if ($category_id) {
                        $conditions['Product.product_category_id'] = $category_id;
                    }
                    if ($status != null) {
                        $conditions['Product.active'] = $status;
                    }
                    $this->request->data['Search'] = array(
                        'name' => $name,
                        'category' => $category_id,
                        'status' => $status
                    );
                    $this->set('searchForm', true);
                    break;
            }
        }

        $categories = $this->ProductCategory->find('list');
        $this->set('productCategories', $categories);

        $this->Paginator->settings['conditions'] = $conditions;
        $products = $this->Paginator->paginate('Product');
        $this->set('products', $products);
    }

    /**
     * admin add
     * @param null $id
     */
    public function admin_add($id = null)
    {

        $categories = $this->ProductCategory->find('all', array(
            'conditions' => array(
                'ProductCategory.parent_id' => null,
                'ProductCategory.active' => true
            )
        ));
        $setArrayPro = array();
        foreach ($categories as $item) {
            if ($item['product_categories']) {
                foreach ($item['product_categories'] as $sub) {
                    $setArrayPro[$item['ProductCategory']['name']][$sub['id']] = '--| '.$sub['name'];
                }
            }
        }

        $this->set('productCategories', $setArrayPro);

        parent::admin_add($id);

        $this->loadModel('Manufacture');
        $manufactures = $this->Manufacture->find('all', array(
            'conditions' => array(
                'Manufacture.parent_id' => null,
                'Manufacture.active' => true
            )
        ));
        $setArray = array();
        foreach ($manufactures as $item) {
            if ($item['Child']) {
                foreach ($item['Child'] as $sub) {
                    $setArray[$item['Manufacture']['name']][$sub['id']] = $sub['name'];
                }
            }
        }
        // echo '<pre>';
        // print_r($setArrayPro    );die;
        $this->set('manufactures', $setArray);

        if ($this->request->query('ProductCategory')) {
            $this->request->data['Product']['product_category_id'] = $this->request->query('ProductCategory');
        }
        if ($id) {
            $this->request->data['Product']['manufactures'] = explode(',', $this->request->data['Product']['manufactures']);
        }
    }

    public function admin_changePrice($id) {
        $newPrice = $this->request->query('newValue');
        $this->Product->create();
        $this->Product->id = $id;
        $this->Product->saveField('price', $newPrice);
        $this->autoRender = false;
        $this->layout = false;
        return json_encode(array(
            'newValue' => $newPrice,
            'id' => $id,
            'price' => CakeNumber::currency($newPrice)
        ));
    }

} 