<?php
$this->Html->addCrumb(__('Blog'), '#');
?>
<?php echo $this->Form->create('Post', array(
    'type' => 'GET',
    'id' => 'SearchAdminIndexForm',
    'url' => array(
        'controller' => 'posts',
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
echo $this->element('search_product');
echo '<table width="100%" id="product-table">';
echo '<tr class="heading">';
echo '<th class="table-header-check">'.$this->Form->checkbox('checkAll').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Html->link(__('STT'), '#').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('image').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('name').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('blog_category_id').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('active').'</th>';
echo '<th class="table-header-repeat line-left">'.$this->Paginator->sort('user_id').'</th>';
echo '<th class="table-header-repeat line-left"></th>';
echo '</tr>';

$index = ($this->Paginator->current() - 1) * Configure::read('settings.limitDefault');;
$active = Configure::read('settings.active');
foreach ($posts as $item) {
    $index++;

    ?>
    <tr class="tr">
        <td><?php echo $this->Form->checkbox('checkRow', array('value' => $item['Post']['id'],'class' => 'checkRows'))  ?></td>
        <td><?php echo $index ?></td>
        <td><?php echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $item['Post']['image'],  array('plugin' => false)); ?></td>
        <td><?php echo '<strong>' . $this->Html->link($item['Post']['name'], array('controller' => 'posts', 'action' => 'add', $item['Post']['id'])) . '</strong>' ?></td>
        <td><?php echo $this->Html->link($item['BlogCategory']['name'], '/admin/posts/?type=parent_id&key=' . $item['BlogCategory']['id'], array('title' => __('Search by category: ' . $item['BlogCategory']['name']))) ?></td>
        <td><?php echo $active[$item['Post']['active']] ?></td>
        <td><?php echo $item['User']['name'] ?></td>
        <td>
            <?php
            echo $this->Html->link(null, array('action' => 'delete', $item['Post']['id']), array('class' => 'icon-2 info-tooltip', 'title' => __('Delete')), __('Are you sure?'));
            echo $this->Html->link(null, array('action' => 'add', $item['Post']['id']), array('class' => 'icon-1 info-tooltip', 'title' => __('Edit')));
            ?>
        </td>
    </tr>
    <?php
}
echo '</table>';
echo $this->element('admin/paginator');