<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 1/22/14
 * Time: 11:49 PM
 */
class Introduction extends AppModel{

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
                    'thumb_100' => array(
                        'nameCallback' => 'transformNameCallback',
                        'class' => 'crop',
                        'width' => 100,
                        'height' => 100,
                        'quality' => 100,
                        'overwrite' => true,
                        'aspect' => true,
                    )
                )
            )
        )
    );
} 