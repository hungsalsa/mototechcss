<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Quản lý hãng xe'), '#');

echo $this->element('search_product');

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('parent_id').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Order'), '#').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');
$active = Configure::read('settings.active');

foreach ($manufactures as $item) {
    $index++;
    $spacing = null;
    $order = $item['Manufacture']['order'];
    if ($item['Manufacture']['parent_id']) {
        $spacing = '&lfloor;_ ';
    }
    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Manufacture']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $spacing . $this->Html->link($item['Manufacture']['name'], array('action' => 'add', $item['Manufacture']['id'])) ?></td>
        <td><?php echo $this->Html->link($item['ParentMenu']['name'], '/admin/menus/?type=parent_id&key=' . $item['ParentMenu']['id'], array('title' => __('Search by parent: ' . $item['ParentMenu']['name']))); ?></td>
        <td><?php echo $active[$item['Manufacture']['active']] ?></td>
        <td><?php echo $order ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Manufacture']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['Manufacture']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');