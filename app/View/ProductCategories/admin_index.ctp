<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Product categories'), '#');
echo $this->element('search_product');
?>
<?php echo $this->Form->create('ProductCategory', array(
    'type' => 'GET',
    'id' => 'SearchAdminIndexForm',
    'url' => array(
        'controller' => 'productCategories',
        'action' => 'index'
    )
)); ?>
    <div class="formSearch" style="display: block;">
        <table>
            <tbody>
            <tr>
                <td>
                    <?php echo $this->Form->input('name', array(
                        'class' => 'inp-form',
                        'placeholder' => 'Từ khoá tìm kiếm',
                        'div' => false,
                        'label' => false
                    )); ?>
                </td>
                <td>
                    <div class="submit"><input class="form-submit" type="submit" value="Search"></div>
                </td>

                <td>
                    <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>" class="form-reset">Search</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php echo $this->Form->end(); ?>
<?php
echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Number'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('parent_id').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');
$active = Configure::read('settings.active');
$currentParentId = null;
foreach ($categories as $item) {
    $index++;
    $spacing = null;
    if ($currentParentId && $item['ProductCategory']['parent_id'] == $currentParentId) {
        $spacing = '&lfloor;_ ';
    }
    if (!$item['ProductCategory']['parent_id']) {
        $currentParentId = $item['ProductCategory']['id'];
    }
    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['ProductCategory']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $spacing.$this->Html->link($item['ProductCategory']['name'], array('action' => 'add', $item['ProductCategory']['id'])); ?></td>
        <td><?php echo $this->Html->link($item['product_category']['name'], '/admin/ProductCategories/?type=parent_id&key=' . $item['product_category']['id'], array('title' => __('Search by category: ' . $item['product_category']['name']))) ?></td>
        <td><?php echo $active[$item['ProductCategory']['active']] ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['ProductCategory']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['ProductCategory']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');