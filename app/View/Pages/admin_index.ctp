<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Page Manager'), '#');

echo $this->element('search_product');

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('STT'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('slug').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');
$active = Configure::read('settings.active');
$type = Configure::read('settings.page.type');
foreach ($list as $item) {
    $index++;
    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Page']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo '<strong>' . $this->Html->link($item['Page']['name'] . ' (' . __('Type') . ': ' . $type[$item['Page']['type']] . ')', array('action' => 'add', $item['Page']['id'])) . '</strong>'; ?></td>
        <td><?php echo $item['Page']['slug'] ?></td>
        <td><?php echo $active[$item['Page']['active']] ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Page']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['Page']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');