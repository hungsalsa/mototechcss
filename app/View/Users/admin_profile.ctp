<?php
if (AuthComponent::user('role') == Configure::read('settings.level.UserManagement')) {
    $this->Html->addCrumb(__('User Management'), array('action' => 'index'));
}
$this->Html->addCrumb(__('Profile'), '#');
echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->input('id');
?>
    <table width="100%" id="id-form">
        <tr>
            <th valign="top"><?php echo __('User name') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('username', array(
                    'disabled' => 'disabled',
                    'class' => 'inp-form'
                ));
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

        <tr>
            <td></td>
            <td>
                <?php echo $this->Form->submit(__('Save'), array(
                    'class' => 'form-submit'
                )); ?>
            </td>
        </tr>
    </table>
<?php

echo $this->Form->end();
