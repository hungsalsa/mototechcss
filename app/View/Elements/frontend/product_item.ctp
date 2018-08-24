<div class="product-item">
    <?php
    if ($product['price_sale']) {
        echo '<div class="sale"></div>';
    }
    ?>
    <h4 class="name"><?php echo $product['name'] ?></h4>
    <?php
    echo $this->Html->image(Configure::read('settings.imageDir').'279/'.$product['image'], array(
        'url' => array('action' => 'productIndex', 'slug' => $product['slug']),
        'alt' => $product['name'],
        'title' => $product['name']
    ));
    ?>
    <div class="price"><?php echo __('Giá: %s', $this->Number->currency($product['price_sale'])) ?></div>
    <div class="old-price"><?php echo __('Giá cũ: %s', $this->Number->currency($product['price'])) ?></div>
    <div class="row">
        <div class="col-xs-6 text-left">
            <?php
            echo $this->Html->link(__('Mua hàng'), array('action' => 'productIndex', 'slug' => $product['slug']), array(
                'class' => 'btn AddCart'
            ));
            ?>
        </div>
        <div class="col-xs-6 text-right">
            <?php
            echo $this->Html->link(__('Chi tiết'), array('action' => 'productIndex', 'slug' => $product['slug']), array(
                'class' => 'btn viewDetail'
            ));
            ?>
        </div>
    </div>
</div>