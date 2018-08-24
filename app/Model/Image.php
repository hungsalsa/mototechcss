<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/9/14
 * Time: 2:29 PM
 */

class Image extends AppModel{

    var $belongsTo = array(
        'Product'
    );

    public $actsAs = array(
        'Uploader.FileValidation' => array(
            'image' => array(
                'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                'required' => true
            )
        ),
        'Uploader.Attachment' => array(
            'image' => array(
                'tempDir' => TMP,
                'nameCallback' => 'renameUploadFile',
                'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                'type' => 'image',
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
                    'thumb_279' => array(
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
} 