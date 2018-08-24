<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 9:43 PM
 */

class Product extends AppModel{

    public $belongsTo = array(
        'ProductCategory' => array(
            'fields' => 'id, slug, name, parent_id'
        ),
//        'User' => array(
//            'fields' => 'id, name, username, email'
//        )
    );

    public $hasMany = array(
        'Image'
    );

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
                    'thumb_220' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 220,
                        'height' => 180,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                    'thumb_400' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 400,
                        'height' => 400,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                    'thumb_837' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 837,
                        'height' => 729,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    )
                )
            )
        )
    );

    public $validate = array(
        'slug' => array(
            'rule' => 'isUnique',
            'message' => 'Slug is used'
        ),
        'product_category_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Product category is required'
        )
    );

    public function beforeValidate($options = array())
    {
        if (!$this->data['Product']['slug']) {
            $this->data['Product']['slug'] = seo($this->data['Product']['name']);
        } else {
            $this->data['Product']['slug'] = seo($this->data['Product']['slug']);
        }
        parent::beforeValidate($options);
    }

    /**
     * Save value default product
     * @param array $options
     * @return bool|void
     */
    public function beforeSave($options = array())
    {
        parent::beforeSave($options);
        if (!isset($this->data['Product']['user_id']) || !$this->data['Product']['user_id']) {
            $this->data['Product']['user_id'] = AuthComponent::user('id');
        }
        if (isset($this->data['Product']['manufactures']) && $this->data['Product']['manufactures']) {
            $this->data['Product']['manufactures'] = implode(',', $this->data['Product']['manufactures']);
        }
        if (isset($this->data['Product']['color'])) {
            $this->data['Product']['color'] = json_encode($this->data['Product']['color']);
        }
        if (isset($this->data['Product']['price']) && !$this->data['Product']['price']) {
            $this->data['Product']['price'] = 0;
        }
        if (isset($this->data['Product']['price_sale']) && !$this->data['Product']['price_sale']) {
            $this->data['Product']['price_sale'] = 0;
        }
    }

    /**
     * call back delete image when delete product
     * @param bool $cascade
     * @return bool|void
     */
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        $id = $this->data['Product']['id'];

        $images = ClassRegistry::init('Image');
        $images->deleteAll(array('product_id' => $id), true, true);
    }
} 