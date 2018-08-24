<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 9:35 PM
 */
App::uses('AppController', 'Controller');
class PostsController extends AppController{

    public $uses = array(
        'Post',
        'BlogCategory'
    );

    public $codeActive = 'Blog';

    /**
     * list news
     */
    public function admin_index()
    {
        $this->Paginator->settings['order'] = array(
            'Post.created' => 'desc'
        );
        $queries = $this->request->query;
        if (isset($queries['name']) && $queries['name']) {
            $this->Paginator->settings['conditions'] = array(
                'OR' => array(
                    'Post.name LIKE' => '%'.$queries['name'].'%',
                    'Post.slug LIKE' => '%'.seo($queries['name']).'%',
                )
            );
        }
        $this->request->data['Post'] = $queries;

        $posts = $this->Paginator->paginate('Post');
        $this->set('posts', $posts);
    }

    /**
     * add edit post
     * @param null $id
     */
    public function admin_add($id = null)
    {
        parent::admin_add($id);
        // $categories = $this->BlogCategory->find('list');
        $categories = $this->BlogCategory->blogCategoriesParent();
        if(empty($categories)){
            $categories = array();
        }
        // END TU THEM
        $this->set('blogCategories', $categories);
        if ($this->request->query('BlogCategory')) {
            $this->request->data['Post']['blog_category_id'] = $this->request->query('BlogCategory');
        }
    }
} 