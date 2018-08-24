<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/10/14
 * Time: 9:26 PM
 */
App::import('Helper', 'Number');
App::uses('AppController', 'Controller');
App::uses('BaoKimPayment', 'Lib');

class FrontendController extends AppController{

    public $uses = array(
        'Setting',
        'Company',
        'ProductCategory',
        'BlogCategory',
        'Page',
        'Product',
        'Banner',
        'Post',
        'Menu',
        'Order',
        'Contact',
        'Support',
        'UserOnline',
        'Introduction',
        'Manufacture'
    );

        // public $helpers = array(
        //     'Cache',
        // );

    public $baoKim;

    // public $cacheAction = array(
    //     'index' => array('callbacks' => true, 'duration' => 10),
    //     'pageView' => array('callbacks' => true, 'duration' => 10),
    //     'postIndex' => array('callbacks' => true, 'duration' => 10),
    //     'productCategory' => array('callbacks' => true, 'duration' => 10),
    //     'postCategory' => array('callbacks' => true, 'duration' => 10),
    //     'productIndex' => array('callbacks' => true, 'duration' => 10),
    //     'siteMap' => array('callbacks' => true, 'duration' => 10),
    //     'allProducts' => array('callbacks' => true, 'duration' => 10),
    // );

    public function beforeFilter()
    {
        parent::beforeFilter();

        $this->Auth->allow(
            'index',
            'search',
            'siteMap',
            'productIndex',
            'postIndex',
            'productCategory',
            'pageView',
            'shoppingCart',
            'checkout',
            'postCategory',
            'allProducts',
            'getProductByManufacture'
        );

        if ($this->request->is('ajax')) {
            return true;
        }

        if ($this->action == 'siteMap') {
            return true;
        }
        //$this->initUserOnline();
        $this->layout = 'frontend/layout';

        $this->getSettings();

        //$this->getNews();

        $cart = $this->Session->read('Cart');
        $this->set('shoppingCart', $cart);

        $this->getMenu();

        $this->getBanner();
        $this->getNewsFixed();
        $this->getIntroduction();
        $this->getSupport();
        $this->productCategories();
        $this->getManufactures();
    }

    public function getManufactures() {
        $manufactures = $this->Manufacture->find('all', array(
            'conditions' => array(
                'Manufacture.parent_id' => null
            ),
            'order' => array(
                'Manufacture.order' => 'desc'
            )
        ));
        $this->set(compact('manufactures'));
    }

    public function productCategories() {
        $productCategories = Cache::read('productCategoriesFixed');
        if (!$productCategories) {

            $productCategories = $this->ProductCategory->find('all', array(
                'conditions' => array(
                    'ProductCategory.active' => true,
                    'ProductCategory.parent_id' => null
                ),
                'order' => array(
                    'ProductCategory.order' => 'asc'
                ),
                'fields' => 'slug, name, manufacture_id, image, introduction, background'
            ));
            Cache::write('productCategoriesFixed', $productCategories);
        }
        $this->set('productCategoriesFixed', $productCategories);
    }

    public function getIntroduction() {
        $introductions = Cache::read('introductionsHome');
        if (!$introductions) {
            $introductions = $this->Introduction->find('all', array(
                'conditions' => array(
                    'Introduction.active' => true
                ),
                'order' => array(
                    'order' => 'asc',
                    'created' => 'desc'
                )
            ));
            Cache::write('introductionsHome', $introductions);
        }
        $this->set(compact('introductions'));
    }

    public function getBanner() {
        $banners = Cache::read('banners');
        if (!$banners) {
            $banners = $this->Banner->find('all', array(
                'conditions' => array(
                    'Banner.active' => true
                )
            ));
            Cache::write('banners', $banners);
        }
        $this->set(compact('banners'));
    }

    /**
     * get news fixed
     */
    public function getNewsFixed()
    {
        $newsFixed = Cache::read('newsFixed');
        if (!$newsFixed) {
            $newsFixed = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.active' => true,
                    'OR' => array(
                        array(
                            'Post.free' => true
                        ),
                        array(
                            'Post.help' => true
                        )
                    )
                ),
                'order' => array(
                    'Post.order' => 'asc',
                    'Post.created' => 'desc'
                ),
                'fields' => 'name, slug, help, free'
            ));
            Cache::write('newsFixed', $newsFixed);
        }

        $hotNews = Cache::read('hotNews');
        if (!$hotNews) {
            $hotNews = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.active' => true,
                    'Post.hot' => true,
                ),
                'order' => array(
                    'Post.order' => 'asc',
                    'Post.created' => 'desc'
                ),
                'fields' => 'name, slug, hot',
                'limit' => 10
            ));
            Cache::write('hotNews', $hotNews);
        }

        $topViews = Cache::read('topViews');
        if (!$topViews) {
            $topViews = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.active' => true,
                ),
                'order' => array(
                    'Post.views' => 'desc',
                    'Post.order' => 'asc',
                    'Post.created' => 'desc'
                ),
                'fields' => 'name, slug, views',
                'limit' => 10
            ));
            Cache::write('topViews', $topViews);
        }

        $this->set('topViews', $topViews);
        $this->set('hotNews', $hotNews);
        $this->set('newsFixed', $newsFixed);
    }

    /**
     * get settings and company infomation
     */
    public function getSettings()
    {
        $settings = Cache::read('settings');
        if (!$settings) {
            $settings = $this->Setting->find('first', array(
                'joins' => array(
                    array(
                        'table' => 'company',
                        'alias' => 'Company',
                        'type' => 'left',
                        'conditions' => array(
                            'Company.name !=' => null
                        )
                    )
                ),
                'fields' => array('Setting.*', 'Company.*')
            ));
            Cache::write('settings', $settings);
        }

        $this->set(array(
            'title_for_layout' => Router::fullBaseUrl(),
            'description' => Router::fullBaseUrl(),
            'keyword' => Router::fullBaseUrl(),
            'google_analytics' => null
        ));
        if ($settings) {
            $this->set(array(
                'settings' => $settings,
                'title_for_layout' => $settings['Setting']['title'],
                'description' => $settings['Setting']['description'],
                'keyword' => $settings['Setting']['keyword'],
                'google_analytics' => $settings['Setting']['google_analytics'],
            ));
        };
    }

    /**
     * get news
     */
    public function getNews()
    {
        $news = Cache::read('news');
        if (!$news) {
            $news = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.active' => true
                ),
                'order' => array(
                    'Post.order' => 'asc',
                    'Post.created' => 'desc'
                ),
                'fields' => array('slug', 'name')
            ));
            Cache::write('news', $news);
        }

        $this->set('news', $news);
    }

    /**
     * init to count user online
     */
    public function initUserOnline()
    {
        $onlineSessionId = $this->Session->id();
        $this->UserOnline->init($onlineSessionId);
        $onlineNow = $this->UserOnline->countOnline();
        $totalVisit = $this->UserOnline->totalVisit();
        $this->set(array(
            'onlineNow' => $onlineNow,
            'totalVisit' => $totalVisit
        ));
    }

    /**
     * view home page
     */
    public function index()
    {
        $newsHomepage = Cache::read('newsHomePage');
        if (!$newsHomepage) {
            $newsHomepage = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.active' => true,
                    'OR' => array(
                        array(
                            'Post.feature' => true
                        ),
                        array(
                            'Post.home' => true
                        )
                    )
                ),
                'order' => array(
                    'Post.order' => 'asc',
                    'Post.created' => 'desc'
                )
            ));
            Cache::write('newsHomePage', $newsHomepage);
        }

        $this->set(compact('newsHomepage'));
    }

    /**
     * get all product in child menu
     * @param $category
     * @param int $page
     * @return array
     */
    public function getAllProductForCategory($category, $page = 0, $manufacture = null) {
        if($page) {
            $this->request->params['named']['page'] = $page;
        };
        $listId = array($category['ProductCategory']['id']);
        foreach ($category['product_categories'] as $child) {
            $listId[] = $child['id'];
        }
        $conditions = array(
            'Product.active' => true,
            'Product.product_category_id' => $listId
        );
        if ($manufacture) {
            $conditions['OR'] = array(
                array('manufactures LIKE' => $manufacture.',%',),
                array('manufactures LIKE' => '%,'.$manufacture.',%',),
                array('manufactures LIKE' => '%,'.$manufacture,),
                array('manufactures' => $manufacture)
            );
        }
        $this->set('manufactureProductCategory', $manufacture);

        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'recursive' => 1,
            'fields' => 'name, description, image, slug, price, price_sale, id',
            'order' => array(
                'Product.order' => 'asc',
                'Product.created' => 'desc'
            ),
            'limit' => Configure::read('settings.limitFrontend')
            // 'limit' => 20
        );

        $products = $this->Paginator->paginate('Product');

        return $products;
    }

    /**
     * view product in frontend
     * @param $slug
     * @return string
     * @throws NotFoundException
     */
    public function productIndex($slug)
    {
        if ($this->request->is('ajax')) {
            $item = $this->request->data;
            $cart = $this->addCart($item);
            $this->layout = 'ajax';
            $this->autoRender = false;
            $number = new NumberHelper(new View(null));
            return json_encode(array(
                'status' => 'success',
                'cartItem' => $cart['quantity'],
                'total' => $number->currency($cart['total'])
            ));
        }
        $product = Cache::read('Product-'.$slug);
        if (!$product) {
            $this->Product->recursive = 2;
            $product = $this->Product->findBySlug($slug);
            Cache::write('Product-'.$slug, $product);
        }
        if (!$product) {
            throw new NotFoundException();
        }
        $productInCat = $this->Product->find('all', array(
            'conditions' => array(
                'Product.product_category_id' => $product['ProductCategory']['id'],
                'Product.active' => true,
                'Product.slug !=' => $slug
            ),
            'order' => array(
                'Product.feature' => 'desc',
                'Product.order' => 'asc',
                'Product.created' => 'desc'
            ),
            'recursive' => 0,
            'fields' => 'slug, description, name, image, price',
            'limit' => 5
        ));
        $this->set(array(
            'title_for_layout' => $product['Product']['name'],
            'description' => $product['Product']['description'],
            'keyword' => $product['Product']['keyword'],
            'product' => $product,
            'productInCat' => $productInCat
        ));
        $this->request->data = $product;
    }

    /**
     * get feature products
     * @param null $product
     */
    public function getFeatureProducts()
    {
        $products = Cache::read('featureProducts');
        if (!$products) {
            $this->Product->recursive = -1;
            $products = $this->Product->find('all', array(
                'conditions' => array(
                    'feature' => true,
                    'active' => true,
                ),
                'order' => array(
                    'order' => 'asc',
                    'created' => 'desc'
                ),
                'fields' => array('slug', 'image', 'name')
            ));
            Cache::write('featureProducts', $products);
        }

        $this->set('featureProducts', $products);
    }

    /**
     * get supports
     */
    public function getSupport() {
        $supports = Cache::read('supports');
        if (!$supports) {
            $supports = $this->Support->find('all', array(
                'conditions' => array(
                    'active' => true,
                ),
                'order' => array(
                    'type' => 'desc'
                )
            ));
            Cache::write('supports', $supports);
        }
        $this->set('supports', $supports);
    }

    /**
     * add item to cart
     * @param $item
     * @return mixed
     */
    public function addCart($item) {
        $cart = $this->Session->read('Cart');
        if ($cart) {
            $cart['total'] += $item['Product']['quantityOrder'] * $item['Product']['price'];
            $index = 0;
            $add = false;
            foreach ($cart['items'] as $product) {
                if ($item['Product']['id'] == $product['Product']['id']) {
                    $cart['items'][$index]['Product']['quantityOrder'] = $product['Product']['quantityOrder'] + $item['Product']['quantityOrder'];
                    $add = true;
                }
                $index++;
            }
            if (!$add) {
                $cart['quantity'] += 1;
                $cart['items'][] = $item;
            }
        } else {
            $cart['quantity'] = 1;
            $cart['total'] = $item['Product']['quantityOrder'] * $item['Product']['price'];
            $cart['items'][] = $item;
        }
        $this->Session->write('Cart', $cart);

        return $cart;
    }

    /**
     * view detail post
     * @param $slug
     */
    public function postIndex($slug)
    {
        $post = Cache::read('Post-'.$slug);
        if (!$post) {
            $post = $this->Post->findBySlug($slug);
            Cache::write('Post-'.$slug, $post);
        }
        if (!$post) {
            throw new NotFoundException();
        }
        $this->Post->id = $post['Post']['id'];
        $this->Post->saveField('views', (int)$post['Post']['views'] + 1);
        if (!$post) {
            $this->Session->setFlash(__('Không tìm thấy bài viết'));
            $this->redirect('/');
        }
        $this->Post->recursive = -1;
        $postsInCat = $this->Post->find('all', array(
            'conditions' => array(
                'blog_category_id' => $post['BlogCategory']['id'],
                'id !=' => $post['Post']['id']
            ),
            'order' => array(
                'Post.order' => 'asc',
                'Post.created' => 'desc'
            ),
            'limit' => Configure::read('settings.limitFrontend'),
            'fields' => array('slug', 'name')
        ));
        $this->set(array(
            'post' => $post,
            'title_for_layout' => $post['Post']['name'],
            'description' => $post['Post']['description'],
            'keyword' => $post['Post']['keyword'],
            'postsInCat' => $postsInCat
        ));
    }

    /**
     * search products
     */
    public function search($page = 0)
    {
        if($page) {
            $this->request->params['named']['page'] = $page;
        };
        $key = $this->request->query('q');
        $key = h($key);
        if (!$key) {
            $this->redirect(array('action' => 'index'));
        }
        $this->Paginator->settings['conditions'] = array(
            'OR' => array(
                array(
                    'Product.name LIKE' => '%' . str_replace(' ', '%', $key) .'%',
                ),
                array(
                    'Product.slug LIKE' => '%' . str_replace('-', '%', seo($key)) .'%',
                )
            ),
            'Product.active' => true
        );
        $this->Paginator->settings['limit'] = 16;
        $this->Paginator->settings['order'] = array(
            'Product.order' => 'asc',
            'Product.created' => 'asc'
        );
        $products = $this->Paginator->paginate('Product');
        $this->set('products', $products);
        $this->set('key', $key);
    }

    /**
     * view category product
     * @param $slug
     * @param int $page
     * @throws NotFoundException
     */
    public function productCategory($slug, $page = 0)
    {
        unset($this->ProductCategory->belongsTo['product_categories']);
        $category = Cache::read('ProductCategory-'.$slug.'-page-'.$page);
        if (!$category) {
            $category = $this->ProductCategory->findBySlug($slug);
            Cache::write('ProductCategory-'.$slug.'-page-'.$page, $category);
        }
        if (!$category) {
            throw new NotFoundException();
        }

        $manufacture = $this->request->query('manufacture');
        $products = $this->getAllProductForCategory($category, $page, $manufacture);

 
        $result = $this->ProductCategory->find(
            'first',array(
                'fields'=>'id',
                'condition'=>array(
                    'active'=>1,
                    'slug'=>$slug
                ),
                'recursive' => 1,
                'limit' => 1,
            )
        );
        if (isset($page) && $page!=0) {
            $title_for_layout = $category['ProductCategory']['name'].' | trang '.$page;
        }else {
            $title_for_layout = $category['ProductCategory']['name'];
        }
        if ($manufacture) {
            $all_Manufacture = $this->Manufacture->findAllById($manufacture);
            $title_for_layout='';
            foreach ($all_Manufacture as $value) {
                $title_for_layout .= $value['ParentMenu']['name'];
                $title_for_layout .= ' cho xe '.$value['Manufacture']['name'];
            }
        }

         $procate = $result['ProductCategory'];
// echo '<pre>';
// print_r($result);

// echo $title_for_layout ;
        $this->set(array(
            'category' => $category,
            'products' => $products,
            'procate' => $procate,
            'title_for_layout' => $title_for_layout,
            'description' => $category['ProductCategory']['description'],
            'keyword' => $category['ProductCategory']['keyword']
        ));
    }

    /**
     * all products
     */
    public function allProducts($page = 0) {
        if($page) {
            $this->request->params['named']['page'] = $page;
        };
        $products = Cache::read('allProducts-page-'.$page);
        $paging = Cache::read('allProducts-paging-page-'.$page);
        if (!$products || !$paging) {
            $this->Paginator->settings['Product'] = array(
                'conditions' => array(
                    'Product.active' => true
                ),
                'order' => array(
                    'Product.order' => 'asc',
                    'Product.created' => 'desc'
                ),
                'recursive' => -1,
                'limit' => Configure::read('settings.limitFrontend'),
                'fields' => 'id, name, description, slug, image, price, price_sale'
            );
            $products = $this->Paginator->paginate('Product');
            $paging = $this->request->params['paging'];
            Cache::write('allProducts-paging-page-'.$page, $paging);
            Cache::write('allProducts-page-'.$page, $products);
        }
        if(isset($page) && $page!=0){
            $title_for_layout = '| trang '. $page;
        }else {
            $title_for_layout = '';
        }
        $this->request->params['paging'] = $paging;
        $this->set(array(
            'title_for_layout' => 'Tất cả phụ tùng, phụ tùng Honda, phụ tùng Yamaha, Piagio,SYM ...'.$title_for_layout,
            'products' => $products,
            'allProducts' => true
        ));
    }

    /**
     * post category
     * @param $slug
     * @param int $page
     * @throws NotFoundException
     */
    public function postCategory($slug, $page = 0)
    {
        if($page) {
            $this->request->params['named']['page'] = $page;
        };
        $category = Cache::read('BlogCategory-'.$slug);
        if (!$category) {
            $category = $this->BlogCategory->find('first', array(
                'conditions' => array(
                    'BlogCategory.slug' => $slug
                ),
                'recursive' => 0,
                'fields' => array('id', 'name','description','keyword', 'introduction', 'slug')
            ));
            Cache::write('BlogCategory-'.$slug, $category);
        }

        /*Tu Them*/
        $idSub = $this->BlogCategory->find('list', array(
            'fields' => array('id'),
            'conditions' => array(
                'BlogCategory.active' => true,
                'BlogCategory.parent_id' => $category['BlogCategory']['id']
            ),
            'order' => array('BlogCategory.created DESC'),
            'recursive' => 0
        ));
        // echo '<pre>'; print_r($idSub);print_r($category);die;
        /*END TU THEM*/
        if (!$category) {
            throw new NotFoundException();
        }
        

        if (count($idSub)==0) {
            $this->Paginator->settings['conditions'] = array(
                'Post.active' => true,
                'Post.blog_category_id' => $category['BlogCategory']['id'],
            );
        }

        if(count($idSub)==1){
             $this->Paginator->settings['conditions'] = array(
                'Post.active' => true,
                'OR'=>array(
                    'Post.blog_category_id' => $category['BlogCategory']['id'],
                    'Post.blog_category_id'=> $idSub,
                ),
            );
        } 
         if(count($idSub)>1){
            $this->Paginator->settings['conditions'] = array(
                'Post.active' => true,
                'OR'=>array(
                    'Post.blog_category_id' => $category['BlogCategory']['id'],
                    'Post.blog_category_id IN '=> $idSub,
                ),
            );
            
        }


        $this->Paginator->settings['limit'] = Configure::read('settings.limitFrontend');
        $this->Paginator->settings['order'] = array(
            'Post.created' => 'desc',
            'Post.order' => 'asc'
        );
        $posts = $this->Paginator->paginate('Post');
        $this->set('category', $category);
        $this->set('posts', $posts);

        $this->set(array(
            'title_for_layout' => $category['BlogCategory']['name'],
            'description' => $category['BlogCategory']['description'],
            'keyword' => $category['BlogCategory']['keyword']
        ));
    }

    /**
     * view page
     * @param $slug
     */
    public function pageView($slug)
    {
        if (!empty($this->request->data)) {
            $this->Contact->set($this->request->data);
            if ($this->Contact->save()) {
                $email = $this->Company->find('first', array(
                    'fields' => array('email')
                ));
				if ($email['Company']['email'] && !$contactInfo['Contact']['email'] == null) {
                    $this->sendEmail(explode(',', str_replace(' ', '', $email['Company']['email'])), __('Liên hệ từ website: '.Router::url('/', true)), 'contact', array('contact' => $this->request->data));
                }
                $this->Session->setFlash(__('Cảm ơn bạn đã gửi liên hệ cho chúng tôi<br>Bộ phận chăm sóc của chúng tôi sẽ liên hệ với anh/chị '.$contactInfo['Contact']['name'].' sớm nhất !'));
                $this->request->data = null;
                // $this->redirect(['action' => 'view', $id, 'admins' => true]);
                $this->redirect(Router::url('/trang-lien-he'));
				
				
                /*if ($email['Company']['email']) {
                    $this->sendEmail(explode(',', str_replace(' ', '', $email['Company']['email'])), __('Liên hệ từ website: '.Router::url('/', true)), 'contact', array('contact' => $this->request->data));
                }
                $this->Session->setFlash(__('Cảm ơn bạn đã gửi liên hệ cho chúng tôi'));
                $this->request->data = null;
				END CODE*/
            }
        }
        $page = Cache::read('Page-' . $slug);
        if (!$page) {
            $page = $this->Page->findBySlug($slug);
            Cache::write('Page-'.$slug, $page);
        }
        $this->set(array(
            'page' => $page,
            'title_for_layout' => $page['Page']['name'],
            'description' => $page['Page']['description'],
            'keyword' => $page['Page']['keyword']
        ));
    }

    public function getProductByManufacture($id, $page = 0) {
        unset($this->ProductCategory->belongsTo['product_categories']);
        $manufacture = Cache::read('Manufacture'.$id);
        if (!$manufacture) {
            $manufacture = $this->Manufacture->findById($id);
            Cache::write('Manufacture'.$id, $manufacture);
        }
        $products = $this->getAllProductForManufacture($id, $page);

        $this->set(array(
            'products' => $products,
            'manufactureAction' => $manufacture,
            'title_for_layout' => __('Phụ tùng cho xe '.$manufacture['Manufacture']['name']),
            'description' => $manufacture['Manufacture']['description'],
            'keyword' => $manufacture['Manufacture']['keyword']
        ));
    }

    public function getAllProductForManufacture($id, $page) {
        if($page) {
            $this->request->params['named']['page'] = $page;
        };

        $this->Paginator->settings = array(
            'conditions' => array(
                'Product.active' => true,
                'Product.manufactures LIKE' => '%'.$id.'%'
            ),
            'recursive' => -1,
            'fields' => 'name, description, image, slug, price, id',
            'order' => array(
                'Product.order' => 'asc',
                'Product.created' => 'desc'
            ),
            'limit' => Configure::read('settings.limitFrontend')
        );

        $products = $this->Paginator->paginate('Product');

        return $products;
    }

    /**
     * shopping cart, checkout, order successful
     * @param null $type
     */
    public function shoppingCart($type = null)
    {
        $cart = $this->Session->read('Cart');
        $this->set(array(
            'cart' => $cart,
            'title_for_layout' => __('Giỏ hàng của bạn')
        ));
        if ($type == 'deleteCart') {
            $this->Session->delete('Cart');
            $this->Session->setFlash(__('Đã xoá thông tin giỏ hàng của bạn, hãy tiếp tục mua hàng tại đây.'));
            $this->redirect(array('action' => 'index'));
        }

        /**
         * checkout by baokim payment
         */
        if ($type == 'baoKimPayment') {
            $url = $this->baoKim->createRequestUrl(
                Configure::read('settings.payments.baoKim.orderName'),
                Configure::read('settings.payments.baoKim.emailOwner'),
                $cart['total'],
                Configure::read('settings.payments.baoKim.taxFee'),
                Configure::read('settings.payments.baoKim.shippingFee'),
                Configure::read('settings.payments.baoKim.orderDescription'),
                Router::url(array('successful'), true),
                Router::url(array('checkout'), true),
                Router::url(array('checkout'), true)
            );
            $this->redirect($url);
        }
        if ($type == 'checkout') {
            if (!$cart) {
                $this->Session->setFlash(__('Bạn chưa có sản phẩm nào để thanh toán'));
                $this->redirect(array('action' => 'shoppingCart'));
            }
            if (!empty($this->request->data)) {
                $this->Order->set($this->request->data);
                if ($this->Order->validates()) {
                    if ($this->Order->save()) {
                        $email = $this->Company->find('first', array(
                            'fields' => array('email')
                        ));
                        $this->sendEmail(explode(',', str_replace(' ', '', $email['Company']['email'])), __('Đơn đặt hàng: '.Router::url('/', true)), 'order', array('order' => $this->request->data));
                        $this->Session->setFlash(__('Đã gửi đơn hàng thành công'));
                        $this->Session->delete('Cart');
                        $this->redirect('/cam-on-da-dat-hang');
                    }
                }
            }
            $this->render('checkout');
        }
        if ($type == 'successful') {
            $this->render('successful');
        }
    }

    /**
     * get menu for layout
     * @return mixed
     */
    public function getMenu()
    {
        $subMenu = Cache::read('subMenu');
        $menuParent = Cache::read('menuParent');
        if (!$subMenu && !$menuParent) {
            $menus = $this->Menu->getAllMenus();

            $subMenu = $menuParent = array();
            foreach ($menus as $menu) {
                $type = $menu['Menu']['type'];
                $slug = $menu[$type]['slug'];
                $parentId = $menu['Menu']['parent_id'];

                $url = '#';

                // if menu is all products
                if ($menu['Menu']['child'] == Configure::read('settings.menu.allProduct')) {
                    $type = $slug = 'allProducts';
                }
                if ($slug) {
                    $url = $this->generateUrlMenu($type, $slug);
                }
                // url for menu
                $menu['Menu']['slug'] = $url;

                if ($parentId) {
                    $subMenu[$parentId][] = $menu;
                } else {
                    $menuParent[] = $menu;
                }
            }
            Cache::write('subMenu', $subMenu);
            Cache::write('menuParent', $menuParent);
        }

        $this->set(array(
            'subMenus' => $subMenu,
            'menus' => $menuParent
        ));
    }

    /**
     * generate url for menu item
     * @param $type
     * @param $slug
     * @return array|null
     */
    public function generateUrlMenu($type, $slug) {
        $url = null;
        switch ($type) {
            case 'Page':
                $url = array('action' => 'pageView', 'slug' => $slug);
                break;
            case 'BlogCategory':
                $url = array('action' => 'postCategory', 'slug' => $slug);
                break;
            case 'ProductCategory':
                $url = array('action' => 'productCategory', 'slug' => $slug);
                break;
            case 'allProducts':
                $url = array('action' => 'allProducts');
                break;
        }
        return $url;
    }

    /**
     * generate sitemap.xml
     */
    public function siteMap()
    {
        // Set response as XML
        $this->RequestHandler->respondAs('xml');
        $this->RequestHandler->renderAs($this, 'xml');
        $sitemap = Cache::read('sitemapData');
        if (!$sitemap) {
            $sitemap = array(
                array(
                    'loc' => Router::url('/', true),
                    'changefreq' => 'daily',
                    'priority' => '1.00'
                )
            );
            $productCategory = $this->ProductCategory->find('all', array(
                'conditions' => array(
                    'ProductCategory.active' => true,
                ),
                'order' => array(
                    'ProductCategory.order' => 'asc'
                ),
                'field' => 'slug'
            ));
            foreach ($productCategory as $category) {
                $sitemapCategoryData = array(
                    array(
                        'loc' => Router::url(array('action' => 'productCategory', 'slug' => $category['ProductCategory']['slug']), true),
                        'changefreq' => 'daily',
                        'priority' => '0.8'
                    )
                );
                $sitemap = array_merge($sitemap, $sitemapCategoryData);
            }
            $products = $this->Product->find('all', array(
                'conditions' => array(
                    'Product.active' => true,
                ),
                'order' => array(
                    'Product.order' => 'asc'
                ),
                'field' => 'slug'
            ));
            foreach ($products as $product) {
                $sitemapProductData = array(
                    array(
                        'loc' => Router::url(array('action' => 'productIndex', 'slug' => $product['Product']['slug']), true),
                        'changefreq' => 'daily',
                        'priority' => '0.5'
                    )
                );
                $sitemap = array_merge($sitemap, $sitemapProductData);
            }
            $news = $this->Post->find('all', array(
                'conditions' => array(
                    'Post.active' => true,
                ),
                'order' => array(
                    'Post.created' => 'desc'
                ),
                'field' => 'slug'
            ));
            foreach ($news as $new) {
                $newsData = array(
                    array(
                        'loc' => Router::url(array('action' => 'postIndex', 'slug' => $new['Post']['slug']), true),
                        'changefreq' => 'daily',
                        'priority' => '0.5'
                    )
                );
                $sitemap = array_merge($sitemap, $newsData);
            }
            Cache::write('sitemapData', $sitemap);

        }

        $this->set('sitemap', $sitemap);
    }

    public function addSale() {
        $this->loadModel('Sale');
        $sale = $this->request->data;
        if ($this->Sale->save($sale)) {
            $this->Session->write('register', true);
            $this->Session->setFlash(__('Chúc mừng bạn đã đăng ký thành công! Hẹn gặp lại bạn tại cửa hàng ngày '.$sale['Sale']['date']));
            $this->redirect(array('action' => 'index'));
        }
        return false;
    }
}