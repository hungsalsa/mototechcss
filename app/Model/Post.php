<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 9:43 PM
 */

class Post extends AppModel{

    public $belongsTo = array(
        'BlogCategory',
        'User'
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
                    'thumb_500' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 500,
                        'height' => 200,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                    'thumb_300' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 300,
                        'height' => 200,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                    'thumb_150' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 150,
                        'height' => 150,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    ),
                )
            )
        )
    );

    public $validate = array(
        'slug' => array(
            'rule' => 'isUnique',
            'message' => 'Slug is used'
        ),
        'blog_category_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Blog category is required'
        )
    );

    public function beforeValidate($options = array())
    {
        parent::beforeValidate($options);
        if (!$this->data['Post']['slug']) {
            $this->data['Post']['slug'] = seo($this->data['Post']['name']);
        } else {
            $this->data['Post']['slug'] = seo($this->data['Post']['slug']);
        }
    }
} 