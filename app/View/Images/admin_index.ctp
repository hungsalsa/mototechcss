<?php
echo '<table class="tblList" width="100%">';
echo $this->Html->tableHeaders(array('Number', 'Image', $this->Paginator->sort('product_id'), ''));
$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
foreach ($images as $item) {
    $index++;
    echo $this->Html->tableCells(array(
            $index,
            $this->Html->image($item['Image']['thumb_50'],  array('plugin' => false)),
            $this->Html->link($item['Product']['name'], '/admin/images/?type=parent_id&key=' . $item['Image']['product_id'], array('title' => __('Search by product: ' . $item['Product']['name']))),
            $this->Html->link(__('Delete'), array('action' => 'delete', $item['Image']['id']), array('class' => 'DeleteItem'))
        )
    );
}
echo '</table>';
echo '<div class="paging" align="right">';
echo $this->Paginator->numbers(array(
    'separator' => '',
));
echo '</div>';
echo $this->Html->link(__('Add new'), array(
    'action' => 'add',
), array(
    'class' => 'btn_small_grey'
));