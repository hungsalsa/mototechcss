<?php
$this->Html->addCrumb(__('Company information'), array('controller' => 'company', 'action' => 'index'));
$this->Html->addCrumb(__('Các bài giới thiệu'), '#');

echo $this->element('search_product');
echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('STT'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('image').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('order').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('position').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
$positions = Configure::read('settings.introduction.position');
$active = Configure::read('settings.active');
foreach ($list as $item) {
    $index++;

    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Introduction']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $item['Introduction']['image'],  array('plugin' => false)); ?></td>
        <td><?php echo '<strong>' . $this->Html->link($item['Introduction']['name'], array('controller' => 'Introductions', 'action' => 'add', $item['Introduction']['id'])) . '</strong>' ?></td>
        <td><?php echo $active[$item['Introduction']['active']] ?></td>
        <td><?php echo $item['Introduction']['order'] ?></td>
        <td><?php echo $positions[$item['Introduction']['position']] ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Introduction']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['Introduction']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
<?php
}
echo '</table>';
echo $this->element('admin/paginator');