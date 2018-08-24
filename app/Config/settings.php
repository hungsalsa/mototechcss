<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 3/4/14
 * Time: 3:16 PM
 */
if (!defined('INTRODUCTION_SIDEBAR')) {define('INTRODUCTION_SIDEBAR', 1);}
if (!defined('INTRODUCTION_CONTENT')) {define('INTRODUCTION_CONTENT', 2);}
if (!defined('INTRODUCTION_NAV_FOOTER')) {define('INTRODUCTION_NAV_FOOTER', 3);}
if (!defined('INTRODUCTION_FOOTER')) {define('INTRODUCTION_FOOTER', 4);}

$config['settings'] = array(
    'languages' => array(
        'vie', 'eng'
    ),
    'numberImages' => 2,
    'limitDefault' => 25,
    'limitFrontend' => 16,
    'roles' => array(
        2 => __('Staff'),
        3 => __('Admin'),
    ),
    'emailVuhai' => 'vuhaik3@gmail.com',
    'sendEmail' => true,
    'configEmail' => 'smtp',
    'level' => array(
        'UserManagement' => 3
    ),
    'active' => array(
        0 => __('Inactive'),
        1 => __('Active')
    ),
    'loginRedirect' => array(
        'controller' => 'products',
        'action' => 'index',
        'admin' => true
    ),
    'uploadDir' => WWW_ROOT . 'img/uploads/',
    'imageDir' => 'uploads/', /* => img/uploads/name.jpg */
    //use resize function()
    'cacheImageDir' => '/img/cache',
    'cacheImagePath' => WWW_ROOT . 'img/cache/',
    'payments' => array(
        'baoKim' => array(
            'emailOwner' => 'vuhaik3@gmail.com',
            'url' => 'https://www.baokim.vn/payment/order/version11',
            'merchant_id' => '12799',
            'secure_pass' => '4dd9c532b01cfe94',
            'taxFee' => 0,
            'shippingFee' => 0,
            'orderDescription' => __('Thanh toán đơn hàng từ Coscre.vn'),
            'orderName' => __('Coscre.vn')
        )
    ),
    'paginationOptions' => array(
        'separator' => '',
        'tag' => 'li',
        'currentClass' => 'active',
        'currentTag' => 'span'
    ),
    'formBootstrap' => array(
        'class' => 'form-horizontal',
        'inputDefaults' => array(
            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
            'div' => array('class' => 'form-group'),
            'label' => array('class' => 'col-sm-3 control-label'),
            'between' => '<div class="col-sm-8">',
            'after' => '</div>',
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
            'class' => 'form-control'
        )
    ),
    'user' => array(
        'character' => array(
            '!', '@', '#', '$', '%', '^', '&', '*', '~', '>', '<', '?', '{', '}', '(', ')'
        )
    ),
    'page' => array(
        'type' => array(
            1 => __('About'),
            2 => __('Contact'),
        )
    ),
    'introduction' => array(
        'position' => array(
            INTRODUCTION_SIDEBAR => __('Cột bên phải'),
            INTRODUCTION_CONTENT => __('Nội dung ở giữa'),
            INTRODUCTION_NAV_FOOTER => __('Bên trên chân trang'),
            INTRODUCTION_FOOTER => __('Dưới chân trang')
        )
    ),
    'BlogCategory' => array(
        'types' => array(
            3 => __('Tin tức'),
            1 => __('Bài viết trợ giúp'),
            2 => __('Bài viết hợp tác'),
        ),
        'typeOfHelp' => 1,
        'typeOfPartner' => 2,
        'typeOfNews' => 3,
    ),
    'menu' => array(
        'type' => array(
            'ProductCategory' => __('Product Category'),
            'BlogCategory' => __('Blog Category'),
            'Page' => __('Page')
        ),
        'allProduct' => 0
    ),
    'support' => array(
        'type' => array(
            1 => __('Skype'),
            2 => __('Yahoo'),
        )
    ),
    'product' => array(
        'size' => array(
            'S' => 'S',
            'M' => 'M',
            'L' => 'L',
            'XL' => 'XL',
            'XXL' => 'XXL',
            '26' => '26',
            '27' => '27',
            '28' => '28',
            '29' => '29',
            '30' => '30',
            '31' => '31',
            '32' => '32',
            '33' => '33'
        ),
        'color' => array(
            'green' => __('Green'),
            'white' => __('White'),
            'blue' => __('Blue'),
            'black' => __('Black'),
            'brown' => __('Brown'),
            'grey' => __('Grey'),
            'pink' => __('Pink'),
            'yellow' => __('Yellow'),
            'red' => __('Red')
        )
    ),
    'menus' => array(
        'Company information' => array(
            'codeActive' => 'Setting',
            'url' => array(
                'controller' => 'company',
                'action' => 'index'
            ),
            'children' => array(
                'Các bài giới thiệu ngắn' => array(
                    'controller' => 'introductions',
                    'action' => 'index',
                    'admin' => true
                ),
            )
        ),
        'Site' => array(
            'codeActive' => 'Site',
            'url' => array(
                'controller' => 'settings',
                'action' => 'index'
            ),
            'children' => array(
                'Contact Manager' => array(
                    'controller' => 'contacts',
                    'action' => 'index',
                    'admin' => true
                ),
                'Menu Manager' => array(
                    'controller' => 'menus',
                    'action' => 'index',
                    'admin' => true
                ),
                'Banners Manager' => array(
                    'controller' => 'banners',
                    'action' => 'index',
                    'admin' => true
                ),
                'Page Manager' => array(
                    'controller' => 'pages',
                    'action' => 'index',
                    'admin' => true
                ),
                'Support Manager' => array(
                    'controller' => 'supports',
                    'action' => 'index',
                    'admin' => true
                )
            )
        ),
        'Shop' => array(
            'codeActive' => 'Shop',
            'url' => array(
                'controller' => 'products',
                'action' => 'index',
                'admin' => true
            ),
            'children' => array(
                'Product categories' => array(
                    'controller' => 'productCategories',
                    'action' => 'index',
                    'admin' => true
                ),
                'Product' => array(
                    'controller' => 'products',
                    'action' => 'index',
                    'admin' => true
                ),
                'Hãng xe' => array(
                    'controller' => 'manufactures',
                    'action' => 'index',
                    'admin' => true
                ),
                'Orders' => array(
                    'controller' => 'orders',
                    'action' => 'index',
                    'admin' => true
                ),
                'Đăng ký bảo trì' => array(
                    'controller' => 'sales',
                    'action' => 'index',
                    'admin' => true
                )
            )
        ),
        'Blog' => array(
            'codeActive' => 'Blog',
            'url' => array(
                'controller' => 'posts',
                'action' => 'index',
                'admin' => true
            ),
            'children' => array(
                'Blog categories' => array(
                    'controller' => 'blogCategories',
                    'action' => 'index',
                    'admin' => true
                ),
                'Blog' => array(
                    'controller' => 'posts',
                    'action' => 'index',
                    'admin' => true
                ),

            )
        ),
        'User Management' => array(
            'codeActive' => 'User',
            'url' => array(
                'controller' => 'users',
                'action' => 'index',
                'admin' => true,
            ),
            'role' => 3,
        ),

    )
);