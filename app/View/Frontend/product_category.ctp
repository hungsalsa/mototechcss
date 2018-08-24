<div class="content-page">
    <h1 class="title"><?= $title_for_layout; ?> <!-- echo $category['ProductCategory']['name'] --> </h1>
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

    <ul class="list-inline list-sub-category">
        <?php
        $randsClass = array('label-success', 'label-info', 'label-warning', 'label-danger');
        foreach ($category['product_categories'] as $item) {
            echo '<li>'.$this->Html->link($item['name'], array(
                    'action' => 'productCategory',
                    'slug' => $item['slug']),
                    array(
                        'class' => 'label '.$randsClass[array_rand($randsClass)]
                    )
                ).'</li>';
        }
        ?>
    </ul>
</div>

