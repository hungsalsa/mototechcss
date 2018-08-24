<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Product categories'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('ProductCategory', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form',
        'div' => false,
    )
));
echo $this->Form->hidden('id');
?>
    <table width="100%" id="id-form">
        <tr>
            <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
            <td><?php echo $this->Form->input('name', array('required' => true)); ?></td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Image') ?></th>
            <td>
                <?php
                if (isset($this->request->data['ProductCategory']['id']) && $this->request->data['ProductCategory']['id']) {
                    echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['ProductCategory']['image'], array(
                            'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                        )) . '<br>';
                }
                echo $this->Form->input('image', array('type' => 'file', 'class' => 'file_1'));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Ảnh nền') ?></th>
            <td>
                <?php
                if (isset($this->request->data['ProductCategory']['id']) && $this->request->data['ProductCategory']['id']) {
                    echo $this->Html->image(Configure::read('settings.imageDir') . '50/' . $this->request->data['ProductCategory']['background'], array(
                            'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px; padding: 2px'
                        )) . '<br>';
                }
                echo $this->Form->input('background', array('type' => 'file', 'class' => 'file_1'));
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Introduction') ?> </th>
            <td><?php echo $this->Form->input('introduction', array(
                    'class' => 'ckeditor'
                )); ?>
            </td>
        </tr>

        <tr>
            <th valign="top"><?php echo __('Url') ?> </th>
            <td><?php echo $this->Form->input('slug', array('required' => false, 'placeholder' => __('auto generate when empty'))); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Active') ?></th>
            <td><?php echo $this->Form->input('active', array(
                    'class' => '',
                    'default' => true
                )); ?> <span class="greytext"><?php echo __('Status of category') ?></span>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Category parent') ?></th>
            <td><?php echo $this->Form->input('parent_id', array(
                    'empty' => '-- Root --',
                    'class' => 'selectbox_styled'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Hãng xe tương ứng') ?></th>
            <td><?php echo $this->Form->input('manufacture_id', array(
                    'empty' => '-- Chọn hãng xe --',
                    'required' => true,
                    'class' => 'selectbox_styled'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Description') ?> </th>
            <td><?php echo $this->Form->input('description', array(
                    'class' => 'form-textarea'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Keyword') ?> </th>
            <td><?php echo $this->Form->input('keyword', array(
                    'class' => 'form-textarea'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Sắp xếp') ?> </th>
            <td><?php echo $this->Form->input('order', array('required' => false)); ?>
            </td>
        </tr>
        <?php
        echo $this->Element('admin/btn-submit');
        ?>

    </table>
<?php

echo $this->Form->end();