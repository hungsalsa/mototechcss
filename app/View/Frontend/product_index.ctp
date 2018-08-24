<?php
echo $this->AssetCompress->script('fancybox');
echo $this->AssetCompress->css('fancybox');
?>
<style>
    .ui-effects-transfer {
        z-index: 999;
        background-image: url("<?php echo $this->Html->url('/img/', true).Configure::read('settings.imageDir').'400/'.$product['Product']['image'] ?>");
        background-size: 100% 100%;
    }
</style>
<?php
echo $this->Form->create('Product', array(
    'inputDefaults' => array(
        'type' => 'hidden'
    )
));
echo $this->Form->input('name');
echo $this->Form->input('id');
echo $this->Form->input('slug');
echo $this->Form->input('image');
echo $this->Form->input('quantityOrder', array('value' => 1));

?>

<div class="content-page">
    <ol class="breadcrumb list_danhmuc" style="background-color: #ffffff">
      <li><a href="<?= $this->webroot;?>">Home</a></li>
      <li><?php
        if (isset($product['ProductCategory']['product_category'])) {
            echo $this->Html->link($product['ProductCategory']['product_category']['name'], array(
                'action' => 'productCategory',
                'slug' => $product['ProductCategory']['product_category']['slug']
            )). ' / ';
        }
        echo $this->Html->link($product['ProductCategory']['name'], array('action' => 'productCategory', 'slug' => $product['ProductCategory']['slug'])) ?> </li>
    </ol>

    <div class="row">
        <div class="col-md-5">
            <div class="imageLarge"  style="position: relative">
                <?php
                echo $this->Html->image(Configure::read('settings.imageDir').'400/'.$product['Product']['image'], array(
                    'class' => 'big-image zoomImage fancybox',
                    'width' => '100%',
                    'data-zoom-image' => $this->Html->url('/', true) . 'img/'.Configure::read('settings.imageDir').'837/'.$product['Product']['image'],
                    'data-image' => $this->Html->url('/', true) . 'img/'.Configure::read('settings.imageDir').'837/'.$product['Product']['image'],
                ))
                ?>
            </div>
        </div>
        <div class="col-md-7">
            <div class="name">
                <h1 class="tieude" style="color: #1b6eff"><?= $product['Product']['name'];?></h1>
            </div>
            <?php if($product['Product']['size']!=""): ?>
            <div class="code">
                <strong>Bảo hành: </strong>
                <?= $product['Product']['size'];?>
            </div>
            <?php endif; ?>
            <?php
            if ($product['Product']['introduction']) {
                echo '<strong>Chính sách hỗ trợ</strong><br>'.$product['Product']['introduction'];
            }
            $price = $product['Product']['price'];
            if ($product['Product']['price_sale']) {
                $price = $product['Product']['price_sale'];
            }
            echo $this->Form->hidden('price', array('value' => $price));
            echo '<div class="price">' . __('Giá bán: %s', $this->Number->currency($price)) . '</div>';
            if ($product['Product']['price_sale']) {
                echo '<div class="old-price">' . __('Giá cũ: %s', $this->Number->currency($product['Product']['price'])) . '</div>';
            }
            echo $this->Form->input('price', array('value' => $price));
            echo $this->Form->end();
            ?>
            <div class="information">
                <div class="share">
                    <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo Router::url($this->request->here(), true) ?>">
                        <span class="facebook"></span>
                    </a>
                    <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=vi&url=<?php echo Router::url($this->request->here(), true) ?>">
                        <span class="google"></span>
                    </a>
                    <a target="_blank" href="http://www.twitter.com/share?url=<?php echo Router::url($this->request->here(), true) ?>">
                        <span class="twitter"></span>
                    </a>
                </div>
            </div>

            <br>
            <div id="gallery">
                <?php
                echo $this->Html->link($this->Html->image(Configure::read('settings.imageDir').'50/'.$product['Product']['image'], array('class' => 'fancybox')), '#', array(
                    'data-zoom-image' =>  $this->Html->url('/', true) . 'img/'.Configure::read('settings.imageDir').'837/'.$product['Product']['image'],
                    'data-image' => $this->Html->url('/', true) . 'img/'.Configure::read('settings.imageDir').'400/'.$product['Product']['image'],
                    'escape' => false,
                ));
                foreach ($product['Image'] as $image) {
                    echo $this->Html->link($this->Html->image(Configure::read('settings.imageDir').'50/'.$image['image'], array('class' => 'fancybox')), '#', array(
                        'data-zoom-image' =>  $this->Html->url('/', true) . 'img/'.Configure::read('settings.imageDir').'837/'.$image['image'],
                        'data-image' => $this->Html->url('/', true) . 'img/'.Configure::read('settings.imageDir').'400/'.$image['image'],
                        'escape' => false,
                    ));
                }
                ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 detailProduct">
            <!-- <a class="btn btn-sm btn-default showDetail">Thông tin chi tiết</a> -->
            <!-- <a class="btn btn-sm btn-default showComment">Bình luận</a> -->

            <div class="detail-product">
            <?php
            if ($product['Product']['content']) { echo $product['Product']['content'];} else {
                echo __('Nội dung đang được cập nhât...');
            }
            ?>
            </div>
                <div style="float: right" class="fb-like" data-href="<?php echo $this->Html->url($this->request->here(false), true); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>

                
            <?= $this->element('frontend/comment_facebook') ?>
        </div>
    </div>
        <?php if ($productInCat): ?>
            <h5 class="content-title">Sản phẩm cùng loại</h5>
            <div class="row">
                <?php
                foreach ($productInCat as $item) {
                ?>
                <div class="col-md-3 block-sidebar productincat">
                    <div class="same-product">
                        <div class="den">
                            <div class="description" style="overflow: hidden;">
                                <?= $item['Product']['description']; ?>
                                <span style="color: black;">
                                        <?= $this->Html->link('Chi tiết ...', array(
                                    'action' => 'productIndex',
                                    'slug' => $item['Product']['slug']
                                ), array(
                                    'class' => 'caption'
                                ));
                                ?>
                                </span>
                            </div>
                        </div>
                        <div class="xanh">
                            <div class="description">
                                <?php
                                    echo '<a title="'.$item['Product']['name'].'" class="productCat" href="'.$this->Html->url(array('action' => 'productIndex', 'slug' =>$item['Product']['slug'])).'">';
                                    echo $this->Html->image(Configure::read('settings.imageDir').'220/'.$item['Product']['image']);
                                    echo '<br>';
                                    echo '<strong>'.$this->Number->currency($item['Product']['price']).'</strong>';

                                    echo '<br>';
                                    echo $this->Text->truncate($item['Product']['name'], 45);
                                    echo '</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <?php
                }
                ?>
            </div>
        <?php endif; ?>
</div>