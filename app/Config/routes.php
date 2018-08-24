<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'frontend', 'action' => 'index'));
	Router::connect('/sitemap.xml', array('controller' => 'frontend', 'action' => 'siteMap'));

    Router::connect('/p/:slug', array('controller' => 'frontend', 'action' => 'postIndex'), array('pass' => array('slug')));
    Router::connect('/c/:slug', array('controller' => 'frontend', 'action' => 'postCategory'), array('pass' => array('slug')));
    Router::connect('/c/:slug/trang-:page', array('controller' => 'frontend', 'action' => 'postCategory'), array('pass' => array('slug', 'page')));
    Router::connect('/trang-:slug', array('controller' => 'frontend', 'action' => 'pageView'), array('pass' => array('slug')));
    Router::connect('/phu-kien-cho-xe-:slug-:id.html', array('controller' => 'frontend', 'action' => 'getProductByManufacture'), array('pass' => array('id')));
    Router::connect('/phu-kien-cho-xe-:slug-:id/:page.html', array('controller' => 'frontend', 'action' => 'getProductByManufacture'), array('pass' => array('id', 'page')));
    Router::connect('/gio-hang', array('controller' => 'frontend', 'action' => 'shoppingCart'));
    Router::connect('/thanh-toan', array('controller' => 'frontend', 'action' => 'shoppingCart', 'checkout'));
    Router::connect('/cam-on-da-dat-hang', array('controller' => 'frontend', 'action' => 'shoppingCart', 'successful'));
    Router::connect('/xoa-gio-hang', array('controller' => 'frontend', 'action' => 'shoppingCart', 'deleteCart'));
    Router::connect('/search', array('controller' => 'frontend', 'action' => 'search'));
    Router::connect('/search/:page', array('controller' => 'frontend', 'action' => 'search'), array('pass' => array('page')));
    Router::connect('/tat-ca-san-pham', array('controller' => 'frontend', 'action' => 'allProducts'));
    Router::connect('/tat-ca-san-pham/trang-:page', array('controller' => 'frontend','action' => 'allProducts'), array('pass' => array('page')));
    Router::connect('/:slug.html', array('controller' => 'frontend', 'action' => 'productIndex'), array('pass' => array('slug')));
    Router::connect('/:slug', array('controller' => 'frontend', 'action' => 'productCategory'), array('pass' => array('slug')));
    Router::connect('/:slug/trang-:page', array('controller' => 'frontend','action' => 'productCategory'), array('pass' => array('slug', 'page')));

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
