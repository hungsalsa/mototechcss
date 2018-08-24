<?php
if (AuthComponent::user('role') == Configure::read('settings.level.UserManagement')) {
    $this->Html->addCrumb(__('User Management'), array('action' => 'index'));
}
$this->Html->addCrumb(__('Change password'), '#');
echo $this->Form->create('User', array(
    'inputDefaults' => array(
        'type' => 'password',
        'required' => true,
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->hidden('id', array(
    'default' => AuthComponent::user('id')
));
?>
    <table width="100%" id="id-form">
        <tr>
            <th valign="top"><?php echo __('Old password') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php
                echo $this->Form->input('old_password');
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Password') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('new_password');
                ?>
            </td>
        </tr>
        <tr>
            <th valign="top"><?php echo __('Confirm password') ?> <span class="redtext"> （※）</span></th>
            <td>
                <?php echo $this->Form->input('password_confirm');
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