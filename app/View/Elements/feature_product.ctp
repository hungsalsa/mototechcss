<div class="feature">

    <h2 class="text-center"><?php echo $title ?></h2>
    <div class="products">
        <?php
        if (isset($category)) {
            echo '<div class="row">';
            echo '<div class="col-md-6"><div class="introduction-category">';
            echo $category['ProductCategory']['introduction'];
            echo '</div></div>';
            echo '<div class="col-md-6 image">';
            echo $this->Html->image(Configure::read('settings.imageDir').'624/'.$category['ProductCategory']['image'], array('class' => 'img-responsive'));
            echo '</div>';
            echo '</div>';
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class=" slide-product">
                    <ul class="bxslider">
                        <?php
                        foreach ($products as $product) {
                            $price = $product['Product']['price'];
                            if (isset($product['Product']['product_sale']) && $product['Product']['product_sale']) {
                                $price = $product['Product']['price_sale'];
                            }
                            echo '<li>' . $this->Html->image(Configure::read('settings.imageDir').'152/'.$product['Product']['image'], array(
                                    'title' => '<a href="/san-pham/'.$product['Product']['slug'].'"><span class="name" title="'.$product['Product']['name'].'">' . $this->Text->truncate($product['Product']['name'], 27) . '</span></a>  <span class="price-slider">' . $this->Number->currency($price) .'</span>',
                                    'url' => '/san-pham/'.$product['Product']['slug']
                                )) . '</li>';
                        }
                        ?>
                    </ul>
                    <?php
                    if (isset($category)) {
                        echo $this->Html->link(__('Xem tất cả'), '/danh-muc/'.$category['ProductCategory']['slug'], array(
                            'class' => 'view_all'
                        ));
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>