<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Contact Manager'), '#');
echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left 1">'.$this->Html->link(__('Number'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('email').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('address').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('phone').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('message').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('created').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';
$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
foreach ($list as $item) {
    $index++;
    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Contact']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $item['Contact']['name'] ?></td>
        <td><?php echo $item['Contact']['email'] ?></td>
        <td><?php echo $item['Contact']['address'] ?></td>
        <td><?php echo $item['Contact']['phone'] ?></td>
        <td><?php echo $item['Contact']['message'] ?></td>
        <td><?php echo $this->Time->format($item['Contact']['created'], '%d-%m-%Y') ?></td>
        <td><?php echo $this->Html->link(null, array('action' => 'delete', $item['Contact']['id']), array('class' => 'icon-2 info-tooltip'), __('Are you sure?')) ?></td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator', array(
    'add' => false
));