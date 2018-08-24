<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 3/9/14
 * Time: 2:28 PM
 */

class ImagesController extends AppController{

    public function admin_index() {

        $images = $this->Paginator->paginate('Image');
        $this->set('images', $images);
    }

    public function admin_add($id = null)
    {
        $this->set('model', 'Image');
        if (!$id) {
            $this->Session->setFlash(__('Not isset product'),'default', array('class' => 'message-error'));
            $this->redirect(array('controller' => 'products', 'action' => 'index'));
        }

        if ($this->request->is('post')) {
            if ($this->Image->saveMany($this->request->data['Image'])) {
                $this->Session->setFlash(__('Save successful'));
            };
        }

        $productImages = $this->Image->find('all', array(
            'conditions' => array(
                'product_id' => $id
            ),
            'fields' => array(
                'id', 'image'
            )
        ));
        $this->set('productImages', $productImages);
        $this->set('product_id', $id);
    }

    public function admin_delete($id) {
        if ($this->Image->delete($id)) {
            $this->autoRender = false;
            return json_encode(array(
                'status' => 'success',
            ));
        };
    }
} 