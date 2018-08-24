
<?php
$this->Html->addCrumb(__('Site'), array('controller' => 'settings', 'action' => 'index'));
echo $this->Form->create('Setting', array(
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->hidden('id');
?>
<table width="100%" id="id-form">

    <tr>
        <th valign="top"><?php echo __('Title website') ?></th>
        <td>
            <?php echo $this->Form->input('title');
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
        <th valign="top"><?php echo __('Keyword') ?></th>
        <td>
            <?php echo $this->Form->input('keyword', array(
                'class' => 'form-textarea'
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Nội dung đăng ký bảo trì') ?></th>
        <td>
            <?php echo $this->Form->input('ad', array('class' => 'ckeditor'));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Google analytics') ?></th>
        <td>
            <?php echo $this->Form->input('google_analytics');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Bật chat Tawk') ?></th>
        <td>
            <?php echo $this->Form->checkbox('setting_chat');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Bật chat Facebook Messenger') ?></th>
        <td>
            <?php echo $this->Form->checkbox('setting_messenger');
            ?>
        </td>
    </tr>
    <?php
    echo $this->Element('admin/btn-submit');
    ?>

</table>


<?php
echo $this->Form->end();