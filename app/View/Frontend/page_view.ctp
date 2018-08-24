<div class="content-page">
    <h1 class="title" style="text-align:center;color:#0014ff">Chúng tôi có thể giúp được gì cho quí khách ?</h1>

    <div class="content">
        <?php echo $page['Page']['introduction']; ?>
        <?php
        if ($page['Page']['type'] == 2): // contact page
            ?>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px">
                    <?php
                    echo $this->Form->create('Contact', array(
                        'class' => 'form-horizontal formContact',
                        'inputDefaults' => array(
                            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'div' => array('class' => 'form-group'),
                            'label' => array('class' => 'col-sm-3 control-label'),
                            'between' => '<div class="col-sm-8">',
                            'after' => '</div>',
                            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                            'class' => 'form-control',
                            'required' => true,
                        )
                    ));
                    echo $this->Form->input('name', array(
                        'placeholder' => __('Tên của bạn')
                    ));
                    echo $this->Form->input('email', array(
                        'placeholder' => __('Email của bạn'),
						 'required' => false
                    ));
                    echo $this->Form->input('phone', array(
                        'placeholder' => __('Số điện thoại')
                    ));
                    echo $this->Form->input('address', array(
                        'placeholder' => __('Địa chỉ'),
                        'type' => 'text'
                    ));
                    echo $this->Form->input('message', array(
                        'type' => 'textarea',
                        'rows' => 3,
                        'placeholder' => __('Nội dung liên hệ')
                    ));
                    echo $this->Form->submit(__('Gửi liên hệ'), array(
                        'div' => array('class' => 'col-sm-8 col-sm-offset-3'),
                        'class' => 'btn btn-info'
                    ));
                    echo $this->Form->end();
                    ?>
                </div>
                <div class="col-md-12">
                    <div class="mapBox">
                        <?php echo $settings['Company']['map'] ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
