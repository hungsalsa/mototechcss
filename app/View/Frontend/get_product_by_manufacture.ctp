<div class="content-page">
    <h1 class="title"><?php echo $title_for_layout ?></h1>
    <?php
    if (!$products) {
        echo __('Sản phẩm đang được cập nhật. Vui lòng quay lại sau!');
    }
    ?>
    <div class="listProducts">
        <?php echo $this->element('frontend/list_products', array(
            'products' => $products
        )); ?>
    </div>
</div>