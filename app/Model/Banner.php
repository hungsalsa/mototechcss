<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 2/28/14
 * Time: 9:43 PM
 */

class Banner extends AppModel{

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
                    'thumb_600' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 600,
                        'height' => 310,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    )
                )
            )
        )
    );
} 