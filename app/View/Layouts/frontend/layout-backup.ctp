<!DOCTYPE html>
<html>
<head>
    <?php
    echo $this->Element('frontend/head', array(), array('cache' => true));

    echo $this->Html->meta('description', $description);
    echo $this->Html->meta('keywords', $keyword);
    ?>
    <title><?php echo $title_for_layout; ?></title>

    <?php
    if(isset($product['Product'])) {
        echo '<meta property="og:image" content="'.$this->Html->url('/img/uploads/200/'.$product['Product']['image'], true).'"/>';
        echo '<meta property="og:title" content="'.$product['Product']['name'].'"/>';
        echo '<meta property="og:description" content="'.$description.'"/>';
        echo '<meta property="og:url" content="'.$this->Html->url($this->request->here(), true).'"/>';
    }
    ?>
</head>
<body>
<div class="container">
    <div class="row header">
        <div class="col-md-4">
            <?php
            $logo = '../frontend/img/logo.png';
            echo $this->Html->image($logo, array(
                'url' => array('action' => 'index'),
                'alt' => $settings['Company']['name'],
                'class' => 'logoImage'
            ));
            ?>
        </div>
        <div class="col-md-8">
            <?php echo $this->element('frontend/menu'); ?>
        </div>
    </div><!-- header -->
    <div class="row">
        <div class="col-md-3 sidebar">
            <div class="categories">
                <?php foreach($categories as $item): ?>
                    <div class="block-sidebar">
                        <div class="block-title"><?php echo $this->Html->link($item['ProductCategory']['name'], array('action' => 'productCategory', 'slug' => $item['ProductCategory']['slug'])) ?></div>
                        <div class="block-content">
                            <ul class="list-group">
                                <?php
                                foreach ($item['product_categories'] as $sub) {
                                    echo '<li class="list-group-item">'.$this->Html->link($sub['name'], array('action' => 'productCategory', 'slug' => $sub['slug'])).'</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div><!-- end categories -->
            <div class="block-red">
                <div class="block-title">
                    Hỗ trợ trực tuyến
                </div>
                <div class="block-content">
                    <div class="row">
                        <?php
                        foreach ($supports as $support) {
                            $name = $support['Support']['name'];
                            switch ($support['Support']['type']) {
                                case 2:
                                    $class = 'yahoo';
                                    $url = 'ymsgr:sendim?'.$support['Support']['nick_name'];
                                    break;
                                case 1:
                                    $class = 'skype';
                                    $url = 'skype:'.$support['Support']['nick_name'].'?chat';
                                    break;
                                case 3:
                                    $class = 'phone';
                                    $url = '#';
                                    break;
                            }
                            echo '<div class="col-xs-12">';
                            echo '<a class="support-link" href="'.$url.'">';
                            echo '<span class="icon-support icon-'.$class.'"></span> '.$name.'<br><p>'.$support['Support']['phone'].'<p>';
                            echo '</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>

                </div>
            </div><!-- end block support-->

            <?php if(isset($productInCat)): ?>
                <div class="categories">
                    <div class="block-sidebar">
                        <div class="block-title"><?php echo __('Sản phẩm cùng loại') ?></div>
                        <div class="block-content">
                            <ul class="list-group">
                                <?php
                                foreach ($productInCat as $item) {
                                    echo '<li class="list-group-item">'.$this->Html->link($item['Product']['name'], array('action' => 'productIndex', 'slug' => $item['Product']['slug'])).'</li>';
                                }
                                ?>
                            </ul>
                            <a class="viewMore" href="<?php echo $this->Html->url(array('action' => 'productCategory', 'slug' => $product['ProductCategory']['slug'])); ?>">Xem tất cả</a>
                        </div>
                    </div>
                </div><!-- end categories -->
            <?php endif; ?>

            <?php if(isset($postsInCat)): ?>
                <div class="categories">
                    <div class="block-sidebar">
                        <div class="block-title"><?php echo __('Tin tức liên quan') ?></div>
                        <div class="block-content">
                            <ul class="list-group">
                                <?php
                                foreach ($postsInCat as $item) {
                                    echo '<li class="list-group-item">'.$this->Html->link($item['Post']['name'], array('action' => 'postIndex', 'slug' => $item['Post']['slug'])).'</li>';
                                }
                                ?>
                            </ul>
                            <a class="viewMore" href="<?php echo $this->Html->url(array('action' => 'postCategory', 'slug' => $post['BlogCategory']['slug'])); ?>">Xem tất cả</a>
                        </div>
                    </div>
                </div><!-- end categories -->
            <?php endif; ?>
        </div><!-- end sidebar -->
        <div class="col-md-9">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $index = 0;
                    $class = 'active';
                    foreach ($banners as $banner) {
                        echo '<li data-target="#carousel-example-generic" data-slide-to="'.$index.'" class="'.$class.'"></li>';
                        $class = null;
                        $index++;
                    }
                    ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    $class = 'active';
                    foreach ($banners as $banner) {
                        echo '<div class="item '.$class.'">';
                        echo $this->Html->image(Configure::read('settings.imageDir').'745/'.$banner['Banner']['image'], array(
                            'url' => $banner['Banner']['url']
                        ));
                        echo '</div>';
                        $class = null;
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="content-main">
                <?php
                echo $this->Session->flash();
                echo $this->fetch('content');
                ?>
            </div>

        </div><!--end content-->
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $settings['Setting']['footer'] ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>