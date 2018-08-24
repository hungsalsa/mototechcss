<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    /**
     * before upload images
     * @param $options
     * @return mixed
     */
    public function beforeUpload($options) {
        $options['finalPath'] = '';
        $options['uploadDir'] = Configure::read('settings.uploadDir');

        return $options;
    }

    /**
     * name of image upload
     * @param $name
     * @param $file
     * @return mixed
     */
    public function transformNameCallback($name, $file) {
        return $this->getUploadedFile()->name();
    }

    /**
     * rename upload file
     * @param $name
     * @param $file
     * @return string
     */
    public function renameUploadFile($name, $file) {
        return uniqid().'-'.seo($name);
    }

    /**
     * config upload thumb
     * @param $options
     * @return mixed
     */
    public function beforeTransform($options) {
        $options['finalPath'] = '';
        $options['uploadDir'] =Configure::read('settings.uploadDir') . $options['width'] . '/';

        return $options;
    }

    public function beforeDelete($cascade = true)
    {
        parent::beforeDelete($cascade);
        $model = $this->name;
        if (isset($this->actsAs['Uploader.Attachment']['image']['transforms'])) {
            $transforms = $this->actsAs['Uploader.Attachment']['image']['transforms'];
            foreach ($transforms as $size) {
                $file = new File(Configure::read('settings.uploadDir').$size['width'].'/'.$this->data[$model]['image']);
                $file->delete();
            }
        }
    }

    /**
     * validate captcha
     * @return bool
     */
    public function checkCaptcha()
    {
        return ($this->data[$this->alias]['captcha'] === $this->captcha);
    }

//    public function find($type = 'first', $params = array()) {
//        $key = md5(serialize(func_get_args()));
//        $return = Cache::read($key);
//        if (!$return) {
//            $return = parent::find($type, $params);
//            Cache::write($key, $return);
//        }
//        return $return;
//    }
}
