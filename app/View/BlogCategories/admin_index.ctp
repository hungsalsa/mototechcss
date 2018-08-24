<?php
$this->Html->addCrumb(__('Blog'), array('controller' => 'posts', 'action' => 'index'));
$this->Html->addCrumb(__('Blog categories'), '#');

echo $this->element('search_product');

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('STT'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('type').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');
$active = Configure::read('settings.active');
foreach ($categories as $item) {
    $index++;
    $spacing = null;
    if ($item['BlogCategory']['parent_id']) {
        $spacing = '&lfloor;_ ';
    }
    $types = Configure::read('settings.BlogCategory.types');

    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['BlogCategory']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $spacing.$this->Html->link($item['BlogCategory']['name'], array('controller' => 'blogCategories', 'action' => 'add', $item['BlogCategory']['id'])); ?></td>
        <td><?php echo $this->Html->link($types[$item['BlogCategory']['type']], '/admin/blogCategories/?type=type&key=' . $item['BlogCategory']['type'], array('title' => __('Tìm kiếm theo: ' . $types[$item['BlogCategory']['type']]))) ?></td>
        <td><?php echo $active[$item['BlogCategory']['active']] ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['BlogCategory']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['BlogCategory']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');