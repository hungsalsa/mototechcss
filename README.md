CakePHP
=======
**Install ckeditor:**

 1. copy folder: `ckeditor, ckfinder` to `webroot/js`
 2. include js file: ckeditor/ckeditor.js
 3. edit config: ckeditor/config.js
 4. add class ckeditor to textarea
 5. get content ckeditor for ajax:
    beforeSerialize:
    `$(#id_of_textarea).val(CKEDITOR.instances['id_of_textarea'].getData())`

 6. Config kcfinder cakephp: in `js/kcfinder/config.php` set `'uploadURL' => "/app/webroot/upload",`. Create folder `upload` chmod 777 in `webroot`


----------


**Install asset compress:**

 1. Copy plugin: AssetCompress
 2. Copy vendor: `lessphp, csmin, jsmin` set debug = 1 to view jsmin, cssmin
 3. copy file asset_compress.ini to app/config folder
 4. in controller:
    var $helpers = array('AssetCompress.AssetCompress');
 5.  in view:

    `echo $this->AssetCompress->script('name_script');`

    `echo $this->AssetCompress->css('name_css');`



----------


**Install MJohnSon Uploader:**

 1. Download: `http://milesj.me/code/cakephp/uploader` copy to `Plugin`.
 2. Download Vendor `mjohnson/decoda` and `mjohnson/transit (1.4 up)`.
 3. In model :
     ```

        public $actsAs = array(
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
                         )
                     )
                 )
             )
         )

         public function renameUploadFile($name, $file) {
             return time().rand(0, 1000);
         }

         public function beforeUpload($options) {
             $options['finalPath'] = '';
             $options['uploadDir'] = Configure::read('settings.uploadDir');

             return $options;
         }

         public function transformNameCallback($name, $file) {
             return $this->getUploadedFile()->name();
         }

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

     ```

    
    with `image` is fields in db.

 4. Need `Composer`.

 5. Update composer.

 6. php.ini: `extension=php_fileinfo.so` or `extension=php_fileinfo.dll` or delete fileinfo function in File.php

----------

**Use Composer cakephp**

`http://bakery.cakephp.org/articles/uzyn/2012/06/20/composer_plugin_for_cakephp`

----------

**Use ImageHelper**

To crop image

 1. Copy ImageHelper to App/View/Helper

 2. In Controller use Helper `Image`

 3. In View: `$this->Image->resize(name-image.jpg, width, height, attributes, onlyPath(default: false))`

 4. Setting required: `settings.cacheImageDir(to show url image in view), settings.cacheImagePath(to move crop image), settings.uploadDir(image need crop)`

----------

**User onlines**

Used model UserOnline
schema update table user_onlines

beforeFilter: run function: init
count users online: run function: countOnline
get total vistied: run function: total

----------

**Facebook php sdk**

1. Download vendor: `https://github.com/facebook/facebook-php-sdk`
2. In AppController: `App::import('Vendor','facebook/src/facebook');`
3. In beforeFilter appController:
    ```
    $this->facebookLib = new Facebook(array(
      'appId'  => 'YOUR_APP_ID',
      'secret' => 'YOUR_APP_SECRET',
    ));
    ```
4. Facebook api demo: `$this->facebookLib->api('/me')`

----------

**Dompdf**

1. Download plugin Dompdf: `https://code.google.com/p/dompdf/wiki/ReleaseNotes#DOMPDF_0.6.0_beta_3` copy to App/Vendor
2. In Controller: $components = array('RequestHandler');
3. Layout for pdf:
   <pre>
   $this->response->type('application/pdf');
   require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
   spl_autoload_register('DOMPDF_autoload');
   $dompdf = new DOMPDF();
   $dompdf->set_paper = 'A4';
   $dompdf->load_html(utf8_decode($this->fetch('content')), Configure::read('App.encoding'));
   $dompdf->render();
   echo $dompdf->output();
   </pre>
4. Set layout ($this->layout='pdf') in controller.
5. Use `<style></style>` to write css for page
6. Download pdf file: $dompdf->stream('file_name.pdf');
7. In App/config/routers.php add `Router::parseExtensions('pdf');`

----------

**Event Cakephp**

1. Create file `App/Event/<Name>` has class `<Name> implements CakeEventListener`
2. in file dispatch event `App::uses(<Name>, 'Event');`
3. Dispatch event:

        $this->getEventManager()->attach(<Name>);
        $event = new CakeEvent(<NameEvent>, $this, array(
                'order' => $order
            ));
        $this->getEventManager()->dispatch($event);

