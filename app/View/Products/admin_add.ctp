<?php
$this->Html->addCrumb(__('Product'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Product', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->input('id');
echo $this->Form->hidden('user_id', array(
    'type' => 'hidden'
));
?>
<table width="100%" id="id-form">
    <tr>
        <th valign="top"><?php echo __('Product category') ?></th>
        <td>
            <?php echo $this->Form->input('product_category_id', array(
                'class' => 'selectbox_styled',
                'empty' => __('--- Select product category ---'),
				//'style' => 'font-size:15px;width:auto',
            ));
            echo $this->Html->link(__('Add new %s', __('ProductCategory')), array(
                'controller' => 'productCategories',
                'action' => 'add',
                '?' => array(
                    'add' => 'products'
                )
                ),
                array(
                'class' => 'linkForm'
            ))
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('name', array('required' => true));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Mã sản phẩm') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('code', array('required' => true));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Image') ?></th>
        <td>
            <?php
            if (isset($this->request->data['Product']['id']) && $this->request->data['Product']['id']) {
                echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['Product']['image'], array(
                        'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                    )) . '<br>';
            }
            echo $this->Form->input('image', array('type' => 'file', 'class' => 'file_1'));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Active') ?></th>
        <td>
            <?php echo $this->Form->input('active', array('default' => true, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Sản phẩm nổi bật') ?></th>
        <td>
            <?php echo $this->Form->input('feature', array('default' => true, 'class' => ''));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Giá') ?></th>
        <td>
            <?php echo $this->Form->input('price', array(
                'required' => true,
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Bảo hành') ?></th>
        <td>
            <?php echo $this->Form->input('size', array(
                'required' => false,
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Chọn hãng xe') ?></th>
        <td>
            <?php echo $this->Form->input('manufactures', array(
                'options' => $manufactures,
                'multiple' => true,
                'class' => '',
                'style' => 'width: 197px;height: 140px;',
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Chính sách hỗ trợ') ?></th>
        <td>
            <?php echo $this->Form->input('introduction', array('class' => 'ckeditor'));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Content') ?></th>
        <td>
            <?php echo $this->Form->input('content', array('class' => 'ckeditor'));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Url') ?></th>
        <td>
            <?php echo $this->Form->input('slug', array(
                'required' => false,
                'placeholder' => __('auto generate when empty')
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Description') ?></th>
        <td>
            <?php echo $this->Form->input('description', array(
                'class' => 'form-textarea'
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Key word') ?></th>
        <td>
            <?php echo $this->Form->input('keyword', array(
                'class' => 'form-textarea'
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Order') ?></th>
        <td>
            <?php echo $this->Form->input('order', array(
                'default' => 0
            ));
            ?>
        </td>
    </tr>
    <?php
    echo $this->Element('admin/btn-submit');
    ?>

</table>


<?php
echo $this->Form->end();
