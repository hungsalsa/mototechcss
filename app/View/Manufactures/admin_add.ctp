<?php
$this->Html->addCrumb(__('Shop'), array('controller' => 'products', 'action' => 'index'));
$this->Html->addCrumb(__('Quản lý hãng xe'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('Manufacture', array(
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
            <th valign="top"><?php echo __('Parent') ?> </th>
            <td><?php echo $this->Form->input('parent_id', array(
                    'empty' => '-- Root --',
                    'class' => 'selectbox_styled'
                )); ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Active') ?></th>
            <td><?php echo $this->Form->input('active', array(
                    'class' => '',
                    'default' => true
                )); ?> <span class="greytext"><?php echo __('Status of menu') ?></span>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Order') ?> </th>
            <td><?php echo $this->Form->input('order', array('default' => 0)); ?>
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
        <?php
        echo $this->Element('admin/btn-submit');
        ?>

    </table>
<?php

echo $this->Form->end();