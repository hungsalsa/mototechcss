<div class="content-page">
    <h1 class="title"><?php echo __('Giỏ hàng của bạn') ?></h1>
    <?php
    if (!$cart) {
        echo '<div class="height15"></div>';
        echo '<div align="center">';
        echo __('Bạn chưa có sản phẩm nào trong giỏ hàng! ');
        echo $this->Html->link(__('Mua hàng tại đây'), '/');
        echo '</div>';
    } else {

        echo $this->Form->create('ShoppingCart', array(
            'inputDefaults' => array(
                'label' => false,
                'div' => false
            )
        ));
        ?>
        <table class="table table-responsive table-bordered tableShoppingCart">
            <thead>
            <tr>
                <th><?php echo __('Sản phẩm') ?></th>
                <th><?php echo __('Tên') ?></th>
                <th><?php echo __('Số lượng') ?></th>
                <th><?php echo __('Đơn giá') ?></th>
                <th><?php echo __('Tổng') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($cart['items'] as $item) {
                echo '<tr>';
                echo '<td>' . $this->Html->image(Configure::read('settings.imageDir').'50/'.$item['Product']['image'], array(
                        'url' => array(
                            'action' => 'productIndex',
                            'slug' => $item['Product']['slug']
                        ),
                        'alt' => $item['Product']['name']
                    )) .'</td>';
                echo '<td>'. $item['Product']['name'].'</td>';
                echo '<td>'. $item['Product']['quantityOrder'].'</td>';
                echo '<td>' . $this->Number->currency($item['Product']['price']). '</td>';
                echo '<td>' . $this->Number->currency($item['Product']['price'] * $item['Product']['quantityOrder']). '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
        <?php
        echo $this->Form->end();
        echo $this->Html->link(__('Mua thêm'), array('action' => 'index'), array('class' => 'btn btn-success more'));
        echo $this->Html->link(__('Gửi đơn hàng'), array('action' => 'shoppingCart', 'checkout'), array('class' => 'btn btn-warning checkoutBtn'));
        //echo $this->Html->link(__('Cập nhật giỏ hàng'), '#', array('class' => 'btn btn-default updateCartBtn'));
        echo $this->Html->link(__('Xoá giỏ hàng'), array('action' => 'shoppingCart', 'deleteCart'), array('class' => 'btn btn-danger more'));
    }
    ?>
</div>