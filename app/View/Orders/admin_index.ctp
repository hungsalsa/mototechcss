<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Orders'), '#');

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Number'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('email').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('phone').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('address').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('note').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('created').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
foreach ($list as $item) {
    $index++;

    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Order']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo '<strong>' . $this->Html->link($item['Order']['sex'] . ' ' .$item['Order']['name'], array('action' => 'view', $item['Order']['id'])) . '</strong>'; ?></td>
        <td><?php echo $item['Order']['email'] ?></td>
        <td><?php echo $item['Order']['phone'] ?></td>
        <td><?php echo $item['Order']['address'] ?></td>
        <td><?php echo $item['Order']['note'] ?></td>
        <td><?php echo $this->Time->format($item['Order']['created'], '%d-%m-%Y') ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Order']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'view', $item['Order']['id']), array('class' => 'icon-4 info-tooltip', 'title' => __('View')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator', array(
    'add' => false
));