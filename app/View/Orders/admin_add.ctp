<?php
    echo $this->Form->create('Order', array(
        'inputDefaults' => array(
            'label' => false,
            'class' => 'width250',
            'div' => false,
            'required' => true
        )
    ));
    echo $this->Form->hidden('id');
?>
<table width="100%" class="tblForm">
    <tr>
        <th width="30%"><?php echo __('Buy brand name') ?> <span class="redtext"> （※）</span></th>
        <td><?php echo $this->Form->input('brand_name'); ?></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Buy date time') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->year('buy_time', date('Y')-10, date('Y')+10, array(
                'default' => date('Y')
            )); ?>
            年 &nbsp;&nbsp;&nbsp;
            <?php echo $this->Form->month('buy_time', array(
                'monthNames' => false,
                'default' => date('m')
            )); ?>
            月&nbsp;&nbsp;&nbsp;
            <?php echo $this->Form->day('buy_time', array(
                'default' => date('d')
            )); ?>
            日
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Customer name') ?> <span class="redtext"> （※）</span></th>
        <td><?php echo $this->Form->input('name'); ?> <span class="greytext">Input Name</span>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Customer name (kana)') ?> <span class="redtext"> （※）</span></th>
        <td><?php echo $this->Form->input('name_kana'); ?> <span class="greytext">Input Name katakana</span>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Novelty want') ?> <span class="redtext"> （※）</span></th>
        <td><?php echo $this->Form->input('novelty'); ?> <span class="greytext">Input Novelty want</span>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Nhận sản phẩm') ?> <span class="redtext"> （※）</span></th>
        <td>
            <?php echo $this->Form->input('received', array(
                'legend' => false,
                'type' => 'radio',
                'options' => Configure::read('settings.order.received'),
                'default' => true,
                'class' => '',
            )); ?>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Thời gian dự kiến đến shop') ?></th>
        <td>
            <?php echo $this->Form->year('receive_time', date('Y')-10, date('Y')+10, array(
                'default' => date('Y')
            )); ?>
            年 &nbsp;&nbsp;&nbsp;
            <?php echo $this->Form->month('receive_time', array(
                'monthNames' => false,
                'default' => date('m')
            )); ?>
            月&nbsp;&nbsp;&nbsp;
            <?php echo $this->Form->day('receive_time', array(
                'default' => date('d')
            )); ?>
            日
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Phone number') ?> </th>
        <td><?php echo $this->Form->input('phone', array('required' => false)); ?> <span class="greytext">090-xxxx-xxxx</span>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Postcode') ?> </th>
        <td><?php echo $this->Form->input('post_code', array('required' => false)); ?> <span class="greytext">100-0000</span>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Prefecture') ?> </th>
        <td>
            <?php
            echo $this->Form->input('prefecture', array(
                'options' => $areas,
                'class' => '',
            ));
            ?>
        </td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('City') ?></th>
        <td><?php
            echo $this->Form->input('city', array(
                'options' => $areas,
                'class' => ''
            ));
            ?>
            <span class="greytext">新宿区</span></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Town / building') ?> </th>
        <td><?php echo $this->Form->input('town', array('required' => false)); ?> <span class="greytext">西新宿xxx</span></td>
    </tr>
    <tr>
        <th width="30%"><?php echo __('Note') ?> </th>
        <td> <?php echo $this->Form->input('note', array(
                'rows' => '3',
                'required' => false
            )); ?>
        </td>
    </tr>
</table>
<div class="height10"></div>
<div align="center">
    <?php echo $this->Form->submit(__('Next'), array(
        'class' => 'btn_small_black'
    )); ?>
</div>
<?php

echo $this->Form->end();

