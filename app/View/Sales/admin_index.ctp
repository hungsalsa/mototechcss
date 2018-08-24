<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Sales Manager'), '#');
echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left 1">'.$this->Html->link(__('Number'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('email', 'Email').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('address').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('phone').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('birthday', 'Ngày sinh').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('work', 'Công việc').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('work_for').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('motor', 'Xe').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('number', 'Biển số').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('date').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('created').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';
$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
foreach ($list as $item) {
    $index++;
    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Sale']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $item['Sale']['name'] ?></td>
        <td><?php echo $item['Sale']['email'] ?></td>
        <td><?php echo $item['Sale']['address'] ?></td>
        <td><?php echo $item['Sale']['phone'] ?></td>
        <td><?php echo $item['Sale']['birthday'] ?></td>
        <td><?php echo $item['Sale']['work'] ?></td>
        <td><?php echo $item['Sale']['work_for'] ?></td>
        <td><?php echo $item['Sale']['motor'] ?></td>
        <td><?php echo $item['Sale']['number'] ?></td>
        <td><?php echo $item['Sale']['date'] ?></td>
        <td><?php echo $this->Time->format($item['Sale']['created'], '%d-%m-%Y') ?></td>
        <td><?php echo $this->Html->link(null, array('action' => 'delete', $item['Sale']['id']), array('class' => 'icon-2 info-tooltip'), __('Are you sure?')) ?></td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator', array(
    'add' => false
));