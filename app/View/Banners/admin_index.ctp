<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
$this->Html->addCrumb(__('Banners Manager'), '#');

echo $this->element('search_product');

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('STT'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Image'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('url'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Active'), '#').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';
$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
foreach ($banners as $item) {
    $index++;
    $active =  Configure::read('settings.active');
    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Banner']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $this->Html->image(Configure::read('settings.imageDir') . '50/' .$item['Banner']['image'],  array('plugin' => false)); ?></td>
        <td><?php
            echo $this->Html->link($item['Banner']['url'], $item['Banner']['url'], array('target' => '_blank'));
            ?>
        </td>
        <td><?php echo $active[$item['Banner']['active']] ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Banner']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['Banner']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');