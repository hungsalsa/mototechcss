<?php
echo $this->Html->script('../admin_files/js/product_index');
echo $this->element('search_product', array(
    'search' => true
));

$this->Html->addCrumb(__('Product'), array('action' => 'index'));

if (isset($searchForm) && $searchForm) {
    $this->Html->addCrumb(__('Search products'), '#');
}

echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Number'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('image').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('price').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('product_category_id').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('Add images'), '#').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
$active = Configure::read('settings.active');
foreach ($products as $item) {
    $index++;

    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Product']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $this->Html->image(Configure::read('settings.imageDir') . '50/' .$item['Product']['image'],  array('plugin' => false)); ?></td>
        <td><?php echo '<strong>' . $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'add', $item['Product']['id'])) . '</strong>' ?></td>
        <td>
            <?php echo $this->Html->link($this->Number->currency($item['Product']['price']), '#', array(
                'class' => 'changePrice changePrice_'.$item['Product']['id'],
                'data-id' => $item['Product']['id'],
                'data-url' => $this->Html->url(array('action' => 'changePrice',$item['Product']['id']))
            )) ?>
            <div data-url="<?php echo $this->Html->url(array('action' => 'changePrice',$item['Product']['id'])) ?>" class="boxInput inputPriceList_<?php echo $item['Product']['id'] ?>" style="display: none">
                <input type="text" class="inputValue" name="price" value="<?php echo $item['Product']['price'] ?>">
                <input type="button" class="savePriceBtn save_<?php echo $item['Product']['id'] ?>" value="Save">
            </div>
        </td>
        <td><?php echo $this->Html->link($item['ProductCategory']['name'], '/admin/products/?type=parent_id&key=' . $item['ProductCategory']['id'], array('title' => __('Search by category: ' . $item['ProductCategory']['name']))) ?></td>
        <td><?php echo $active[$item['Product']['active']] ?></td>
        <td><?php echo $this->Html->link(__('Add images (%s)', count($item['Image'])), array('controller' => 'images', 'action' => 'add', $item['Product']['id'])) ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Product']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['Product']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');