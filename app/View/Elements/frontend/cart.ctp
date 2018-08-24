<div class="shoppingCart">
    <?php
    $quantity = 0;
    $title = __('Xem giỏ hàng của bạn');
    ?>
    <a data-placement="left" class="linkToCart" href="<?php echo $this->Html->url(array('action' => 'shoppingCart')) ?>"  title="<?php echo $title ?>">
        <span class="cart"><?php echo __('<span class="numberItems"></span>') ?></span>
    </a>
</div>

