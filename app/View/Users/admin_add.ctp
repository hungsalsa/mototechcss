<?php
$this->Html->addCrumb(__('User Management'), array('action' => 'index'));
echo $this->Element('admin/breadcrumb');
    echo $this->Form->create('User', array(
        'inputDefaults' => array(
            'label' => false,
            'class' => 'inp-form',
            'required' => true
        )
    ));
    echo $this->Form->input('id');
?>
<table width="100%" id="id-form">
    <tr>
        <th valign="top"><?php echo __('User name') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('username');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Name') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('name');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Email') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('email');
            ?>
        </td>
    </tr>
    <?php
    if (!isset($this->request->data['User']['id']) || !$this->request->data['User']['id']){
    ?>
        <tr>
            <th valign="top"><?php echo __('Password') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('password');
                ?>
            </td>
        </tr>
    <?php
        }
    ?>
    <tr>
        <th valign="top"><?php echo __('Role') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('role', array(
                'options' => Configure::read('settings.roles'),
                'class' => 'selectbox_styled'
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
