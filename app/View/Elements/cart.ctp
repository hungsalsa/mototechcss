<div class="shoppingCartNav">
    <?php
    $quantity = 0;
    $title = null;
    if ($shoppingCart) {
        $quantity = $shoppingCart['quantity'];
        $title = __('Tổng: %s', $this->Number->currency($shoppingCart['total']));
    }
    ?>
    <a data-placement="bottom" class="linkToCart" href="/shopping-cart"  title="<?php echo $title ?>">
        <span class="cart"><?php echo __('Giỏ hàng') ?></span>
        <span class="numberItems"><?php echo $quantity ?></span>
    </a>
</div>