<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 1/22/14
 * Time: 11:49 PM
 */
class Company extends AppModel{

    var $useTable = 'company';

    public $actsAs = array(
        'Uploader.Attachment' => array(
            'logo' => array(
                'tempDir' => TMP,
                'nameCallback' => 'renameUploadFile',
                'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                'type' => 'image',
                'mimeType' => array('image/gif'),
                'quality' => 100,
            )
        )
    );
} 