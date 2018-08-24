
<?php
$this->Html->addCrumb(__('Company information'), '#');
echo $this->Form->create('Company', array(
    'type' => 'file',
    'inputDefaults' => array(
        'label' => false,
        'class' => 'inp-form'
    )
));
echo $this->Form->hidden('id');
?>
<table width="100%" id="id-form">
    <tr>
        <th valign="top"><?php echo __('Ảnh giới thiệu') ?></th>
        <td>
            <?php
            if ($this->request->data) {
                echo $this->Html->image(Configure::read('settings.imageDir') . $this->request->data['Company']['logo'], array(
                        'height' => 50,
                        'style' => 'border: solid 1px #c2c2c2; margin-bottom: 5px'
                    )) . '<br>';
            }
            ?>
            <?php echo $this->Form->file('logo', array(
                'class' => 'file_1',
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Name') ?></th>
        <td>
            <?php echo $this->Form->input('name');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Số kỹ thuật') ?></th>
        <td>
            <?php echo $this->Form->input('phone');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Số cứu hộ khẩn cấp') ?></th>
        <td>
            <?php echo $this->Form->input('phone_sos');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Email') ?></th>
        <td>
            <?php echo $this->Form->input('email', array(
                'type' => 'text',
                'placeholder' => __('Cách nhau bằng dấu phẩy (,)')
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Address') ?></th>
        <td>
            <?php echo $this->Form->input('address');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Facebook') ?></th>
        <td>
            <?php echo $this->Form->input('facebook');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Google+') ?></th>
        <td>
            <?php echo $this->Form->input('google');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Youtube') ?></th>
        <td>
            <?php echo $this->Form->input('youtube');
            ?>
        </td>
    </tr>
    <tr>
        <th valign="top"><?php echo __('Introduction') ?></th>
        <td>
            <?php echo $this->Form->input('introduction', array('class' => 'ckeditor'));
            ?>
        </td>
    </tr>
    <?php
    echo $this->Element('admin/btn-submit');
    ?>

</table>


<?php
echo $this->Form->end();
