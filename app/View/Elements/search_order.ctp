<?php
echo $this->Form->create('Search', array(
    'inputDefaults' => array(
        'class' => 'width250',
        'label' => false
    )
));
?>
<table width="100%" class="tblForm">
    <tbody>
        <tr>
            <th width="30%"><?php echo __('Customer name') ?> </th>
            <td><?php echo $this->Form->input('name'); ?></td>
        </tr>
        <tr>
            <th width="30%"><?php echo __('Customer name (kana)') ?></th>
            <td><?php echo $this->Form->input('name_kana'); ?></td>
        </tr>
        <tr>
            <th width="30%"><?php echo __('Status') ?> </th>
            <td>
                <?php
                echo $this->Form->input('status', array(
                    'options' => Configure::read('settings.order.status'),
                    'class' => ''
                ));
                ?>
            </td>
        </tr>
    </tbody>
</table>
<div class="height10"></div>
<div align="center"><input type="submit" class="btn_small_black" value="Search"></div>
<div class="height10"></div>