<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
        if (isset($event['update'])) {
            switch ($event['update']) {
                case 'users':
                    App::uses('ClassRegistry', 'Utility');
                    $user = ClassRegistry::init('User');
                    $firstUser = $user->find('first');
                    if ($firstUser) {
                        break;
                    }
                    $user->create();
                    $user->saveMany(
                        array('User' =>
                            array(
                                'username' => 'admin',
                                'email' => 'admin@hw.com.vn',
                                'password' => Security::hash('admin', null, true),
                                'name' => 'Admin',
                                'role' => 3
                            ),
                            array(
                                'username' => 'vuhaik3',
                                'email' => 'vuhaik3@gmail.com',
                                'password' => Security::hash('0918577122', 'sha1', true),
                                'name' => 'Vũ Hải',
                                'role' => 3
                            )
                        )
                    );
                    break;
                default:
                    break;
            }
        }
	}

    public $users = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'username' => array('type' => 'string', 'null' => false),
        'email' => array('type' => 'string', 'null' => false),
        'password' => array('type' => 'string', 'null' => false),
        'name' => array('type' => 'string'),
        'role' => array('type' => 'integer', 'length' => '1', 'comments' => '1. admin'),
        'token' => array('type' => 'string'),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $pages = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'slug' => array('type' => 'string', 'null' => false),
        'name' => array('type' => 'string', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'introduction' => array('type' => 'text', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'active' => array('type' => 'boolean'),
        'main_menu' => array('type' => 'boolean'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'order' => array('type' => 'integer', 'length' => 1),
        'type' => array('type' => 'integer', 'length' => 1),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $supports = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'nick_name' => array('type' => 'string', 'null' => false),
        'name' => array('type' => 'string', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'phone' => array('type' => 'text'),
        'active' => array('type' => 'boolean'),
        'type' => array('type' => 'integer', 'length' => 1),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $company = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'address' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'phone' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'phone_sos' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'facebook' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'google' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'youtube' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'logo' => array('type' => 'string'),
        'map' => array('type' => 'text'),
        'introduction' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $sales = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'address' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'work' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'work_for' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'motor' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'number' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'phone' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'birthday' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'date' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
    );

    public $setting = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'ad' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'footer' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'google_analytics' => array('type' => 'string', 'null' => true, 'default' => NULL),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
    );

    public $posts = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'content' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'feature' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'free' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'help' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'home' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'hot' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'views' => array('type' => 'integer', 'null' => true, 'default' => 0),
        'order' => array('type' => 'integer', 'null' => true, 'default' => 0),
        'image' => array('type' => 'string', 'null' => true, 'default' => 0),
        'blog_category_id' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'user_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
        'created' => array('type' => 'datetime'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $contacts = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'phone' => array('type' => 'string'),
        'name' => array('type' => 'string'),
        'address' => array('type' => 'text'),
        'message' => array('type' => 'text'),
        'created' => array('type' => 'datetime'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $introductions = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'image' => array('type' => 'string', 'null' => false),
        'name' => array('type' => 'string', 'null' => false),
        'description' => array('type' => 'text', 'null' => false),
        'active' => array('type' => 'boolean'),
        'position' => array('type' => 'integer'),
        'order' => array('type' => 'integer'),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $manufactures = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => false),
        'active' => array('type' => 'boolean'),
        'order' => array('type' => 'integer'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
        'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4,),
        'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4,),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $products = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'content' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'introduction' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'order' => array('type' => 'integer', 'null' => true, 'default' => 0),
        'quantity' => array('type' => 'integer', 'null' => true, 'default' => 10),
        'price' => array('type' => 'float', 'null' => true, 'default' => 0),
        'price_sale' => array('type' => 'float', 'null' => true, 'default' => 0),
        'sale' => array('type' => 'boolean', 'null' => true, 'default' => 1),
        'feature' => array('type' => 'boolean', 'null' => true, 'default' => 1),
        'size' => array('type' => 'string'),
        'manufactures' => array('type' => 'string'),
        'color' => array('type' => 'string'),
        'code' => array('type' => 'string'),
        'image' => array('type' => 'string', 'null' => true, 'default' => 0),
        'product_category_id' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'user_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36),
        'created' => array('type' => 'datetime'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $images = array(
        'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'collate' => 'utf8_general_ci'),
        'image' => array('type' => 'string', 'null' => true, 'default' => 0),
        'product_id' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'created' => array('type' => 'datetime'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $blog_categories = array(
        'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'introduction' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'order' => array('type' => 'integer', 'null' => true, 'default' => 0),
        'type' => array('type' => 'integer', 'null' => true, 'default' => 3),
        'parent_id' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'rght' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'lft' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'created' => array('type' => 'datetime'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $product_categories = array(
        'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'keyword' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'introduction' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
        'home_page' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
        'order' => array('type' => 'integer', 'null' => true, 'default' => 0),
        'image' => array('type' => 'string', 'null' => true, 'default' => 0),
        'parent_id' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'manufacture_id' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'rght' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'lft' => array('type' => 'integer', 'null' => true, 'length' => 4,),
        'created' => array('type' => 'datetime'),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $order_images = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'type' => array('type' => 'boolean', 'null' => false, 'default' => false, 'comments' => '1. product, 0. image related'),
        'user_id' => array('type' => 'integer', 'length' => 4, 'null' => false),
        'order_id' => array('type' => 'integer', 'length' => 4, 'null' => false),
        'path' => array('type' => 'string', 'null' => false),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $banners = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'image' => array('type' => 'string', 'null' => false),
        'url' => array('type' => 'string', 'null' => true),
        'order' => array('type' => 'integer', 'null' => true, 'default' => 0),
        'active' => array('type' => 'boolean'),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $orders = array(
        'id' => array('type' => 'integer', 'null' => false, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'null' => false),
        'phone' => array('type' => 'string'),
        'email' => array('type' => 'string'),
        'sex' => array('type' => 'string', 'length' => 2),
        'note' => array('type' => 'text'),
        'status' => array('type' => 'boolean'),
        'address' => array('type' => 'string'),
        'cart' => array('type' => 'text', 'comments' => 'json_encode array cart'),
        'created' => array('type' => 'datetime'),
        'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    );

    public $menus = array(
        'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
        'name' => array('type' => 'string', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'active' => array('type' => 'boolean'),
        'order' => array('type' => 'integer', 'default' => 0),
        'type' => array('type' => 'string'),
        'introduction' => array('type' => 'text'),
        'child' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
        'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
        'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4,),
        'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4,),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

    public $user_onlines = array(
        'id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
        'ip_client' => array('type' => 'string', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'time_in' => array('type' => 'datetime', 'default' => 0),
        'time_out' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 11),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        )
    );

}
