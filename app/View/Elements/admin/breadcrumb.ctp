<?php

if ($this->request->action == 'admin_add') {
    if (isset($this->request->data[$model]['id']) && $this->request->data[$model]['id']) {
        $this->Html->addCrumb(__('Edit %s', __($model)), '#');
    } else {
        $this->Html->addCrumb(__('Add new %s', __($model)), '#');
    }
}