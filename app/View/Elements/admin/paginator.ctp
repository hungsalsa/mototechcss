<?php
if (!isset($add) || $add) {
    echo $this->Html->link($this->Html->image('../admin_files/images/forms/icon_plus.gif', array('width' => '21', 'height' => '21')).__('Add new'), array(
        'action' => 'add',
    ), array(
        'class' => 'btn_small_green addNewOne',
        'escape' => false
    ));
}

if (!isset($delete) || $delete) {
    echo $this->Html->link(__('Delete selected'), array(
        'action' => 'deleteSelected',
    ), array(
        'class' => 'action-delete disableLink deleteSelectedLink',
    ));
    echo $this->Html->image('loading.gif', array('class' => 'imgLoading imgLoadingPaginator'));
}

echo '<div class="paging">';
echo $this->Paginator->prev(
    null,
    array('class' => 'page-left'),
    null,
    array('class' => 'page-left disabled')
);
echo '<div id="page-info">';
echo $this->Paginator->counter(
    'Trang <strong>{:page}</strong> / {:pages}'
);
echo '</div>';
echo $this->Paginator->next(
    null,
    array('class' => 'page-right'),
    null,
    array('class' => 'page-right disabled')
);
echo '</div>';
