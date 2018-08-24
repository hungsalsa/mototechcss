<div class="row products">
    <?php
    foreach ($products as $product) {
        $price = $product['Product']['price'];
        if ($product['Product']['price_sale']) {
            $price = $product['Product']['price_sale'];
        }
        echo '<div class="col-md-3 text-center">';
        echo $this->Html->image(Configure::read('settings.imageDir').'152/'.$product['Product']['image'], array('url' => '/san-pham/'.$product['Product']['slug']));
        echo '<div class="name-product"><div class="name">'.$product['Product']['name'].'</div> <div class="pull-right">'.$this->Number->currency($price).'</div></div>';
        echo '<div class="detail_product">'.$this->Html->link(__('Xem chi tiết'), '/san-pham/'.$product['Product']['slug']).'</div>';
        echo '</div>';
    }
    ?>
</div>
<br/>
<div class="text-center">
    <ul class="pagination pagination-sm" style="margin: auto">
        <?php
        echo $this->Paginator->numbers(Configure::read('settings.paginationOptions'));
        ?>
    </ul>
</div>
<br>