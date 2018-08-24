<?php
$this->Html->addCrumb(__('Blog'), array('controller' => 'posts', 'action' => 'index'));
$this->Html->addCrumb(__('Blog categories'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
echo $this->Form->create('BlogCategory', array(
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form',
        'div' => false,
    )
));
echo $this->Form->hidden('id');
// echo '<pre>'; print_r($parents);die;
?>
    <table width="100%" id="id-form">
        <tr>
            <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
            <td><?php echo $this->Form->input('name', array('required' => true)); ?></td>
        </tr>
        <tr>
        <th valign="top"><?php echo __('Danh mục cha') ?></th>
            <td>
                <?php echo $this->Form->input('parent_id', array(
                    'class' => 'selectbox_styled',
                    'empty' => __('--- Select blog category ---'),
                ));
                echo $this->Html->link(__('Add new %s', __('BlogCategory')), array(
                    'controller' => 'blogCategories',
                    'action' => 'add',
                    '?' => array(
                        'add' => 'posts'
                    )
                ), array(
                    'class' => 'linkForm'
                ))
                ?>
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
            <th valign="top"><?php echo __('Type') ?></th>
            <td><?php echo $this->Form->input('type', array(
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
            <th valign="top"><?php echo __('Keyword', array(
                    'class' => 'form-textarea'
                )) ?> </th>
            <td><?php echo $this->Form->input('keyword'); ?>
            </td>
        </tr>
        <?php
        echo $this->Element('admin/btn-submit');
        ?>

    </table>
<?php

echo $this->Form->end();