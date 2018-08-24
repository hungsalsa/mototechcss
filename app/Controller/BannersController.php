<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/10/14
 * Time: 10:52 PM
 */

class BannersController extends AppController{

    public $codeActive = 'Site';

    /**
     * list banners
     * @return string|void
     */
    public function admin_index()
    {
        $banners = $this->Paginator->paginate('Banner');
        $this->set('banners', $banners);

        if (!empty($this->request->data)) {
            $this->Banner->set($this->request->data);
            if ($this->Banner->save()) {
                $this->layout = 'ajax';
                $this->autoRender = false;
                return json_encode(array(
                    'status' => 'success'
                ));
            }
        }
    }
} 