<div class="content-page">
    <h2 class="title"><?php echo __('Tìm kiếm với: %s', $key) ?></h2>
    <div class="listProducts">
        <?php echo $this->element('frontend/list_products', array(
            'products' => $products
        )); ?>
    </div>
</div>

