<div class="content-page">
    <div class="row">
        <div class="col-md-7">
            <h1 class="title"><?php echo __('Thông tin của bạn'); ?></h1>
            <?php
            echo $this->Form->create('Order', Configure::read('settings.formBootstrap'));
            echo $this->Form->input('sex', array(
                'options' => array(
                    'mr' => __('Anh'),
                    'ms' => __('Chị')
                ),
            ));
            echo $this->Form->input('name', array(
                'required' => true
            ));
            echo $this->Form->input('email', array(
                'required' => true
            ));
            echo $this->Form->input('phone', array(
                'required' => true
            ));
            echo $this->Form->input('address', array(
                'required' => true
            ));
            echo $this->Form->hidden('cart', array(
                'value' => json_encode($cart)
            ));
            echo $this->Form->input('note', array(
                'type' => 'textarea',
                'rows' => 3
            ));
            echo $this->Form->submit(__('Gửi cửa hàng'), array(
                'class' => 'btn btn-success',
                'div' => array('class' => 'col-sm-8 col-sm-offset-3')
            ));
            echo $this->Form->end();

            ?>
        </div>
        <div class="col-md-5">
            <h1 class="title"><?php echo __('Thông tin giỏ hàng'); ?></h1>
            <ul class="list-unstyled list-product-checkout">
                <?php
                foreach ($cart['items'] as $item) {
                    echo '<li>';
                    echo $this->html->link($item['Product']['name'] . ' ('.$item['Product']['quantityOrder'].' x '.$this->Number->currency($item['Product']['price']).')', array(
                        'action' => 'productIndex',
                        'slug' => $item['Product']['slug']
                    ));
                    echo '</li>';
                }
                ?>
            </ul>
            <div class="row">
                <div class="col-md-12 total">
                    <p><?php echo __('<strong>Tổng thanh toán:</strong> %s', $this->Number->currency($cart['total'])) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
