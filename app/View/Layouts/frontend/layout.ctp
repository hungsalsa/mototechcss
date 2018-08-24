<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
    echo $this->Element('frontend/head');

    echo $this->Html->meta('description', $description);
    $requestUrl = $this->params['url']; 
    ?>
    
    <meta property="og:url"           content="<?= $this->Html->url($this->request->here(false), true); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:description"   content="<?= $description;?>" />
    <meta property="og:title" content="<?= $title_for_layout; ?>">
    <meta property="og:image" content="https://mototech.com.vn/img/sua-chua-xe-may-phan-phoi-phu-tung-chinh-hang.jpg">
    <meta property="fb:app_id" content="208382249845915" />
    <meta property="fb:admins" content="100005696051369"/>
    <title><?= $title_for_layout; ?></title>
    <?php if(isset($requestUrl['manufacture'])):  ?>
    <link rel="canonical" href="<?= $this->Html->url($this->request->here(false), true); ?>" />
    <?php endif;?>
</head>
<body>
    <?php //echo Router::fullbaseUrl();die;?>
<div class="menu-top">
    <div class="container">
        <div class="row list-inline">
            <div class="col-md-3 col-sm-3 col-sm-3 col-xs-12 hidden-xs hidden-sm text-center"><a href="<?= Router::url('/p/cac-dia-chi-he-thong-mototech'); ?>">Địa chỉ Mototech</a></div>
            <div class="col-md-3 col-sm-3 col-sm-3 col-xs-12 hidden-xs hidden-sm"><a href="<?= Router::url('/p/quy-trinh-dich-vu-bao-duong-va-sua-chua-xe-may'); ?>">Quy trình bảo dưỡng</a> </div>
            <div class="col-md-3 col-sm-6 col-sm-6 col-xs-6 text-center">Giải đáp <span class="hidden-xs">kỹ thuật</span> : 
                <strong><?= $this->Html->link($settings['Company']['phone'], 'tel:'.substr_replace($settings['Company']['phone'],"+84",0,1), array('class' => 'align-middle')); ?></strong>
            </div>
            <div class="col-md-3 col-sm-6 col-sm-6 col-xs-6 text-center">Cứu hộ <span class="hidden-xs">khẩn cấp</span> : <strong><?= $this->Html->link($settings['Company']['phone_sos'], 'tel:'.substr_replace($settings['Company']['phone_sos'],"+84",0,1), array('class' => '')); ?></strong></div>
        </div>
        
    </div>

</div>

<div class="header">
    <div class="container">
        <div class="row search_mobile">
            <div class="col-sm-12">
                <form action="<?php echo $this->Html->url(array('action' => 'search')) ?>" method="get" class="navbar-form" role="search">
                    <div class="form-group row">
                        <div class="input-group ">
                            <input type="text" required="required" name="q" class="form-control" placeholder="Search..." aria-describedby="sizing-addon2">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a class="logo" href="<?php echo $this->Html->url(array('action' => 'index')) ?>">
                    <?php
                    $logo = '../frontend/img/logo.png';
                    if ($settings['Company']['logo']) {
                        $logo = Configure::read('settings.imageDir').$settings['Company']['logo'];
                    }
                    echo $this->Html->image($logo, array(
                        'alt' => $settings['Setting']['description'],
                        'class' => 'logoImage'
                    ));
                    ?>
                </a>
            </div>
            <div class="col-md-6 form_search">
                <form action="<?php echo $this->Html->url(array('action' => 'search')) ?>" method="get" role="search">
                    <div class="form-group row">
                        <div class="input-group">
                            <input type="text" required="required" name="q" class="form-control" placeholder="Search..." aria-describedby="sizing-addon2">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="menu">
    <div class="container">
        <?php echo $this->element('frontend/menu'); ?>
    </div>
</div><!-- end menu-->
<div class="clearfix"></div>
<div class="main">
<div class="container">
<div class="row" style="position: relative; z-index: 9">
    <div class="col-md-3" style="z-index: 100;position: relative;">
        <div class="block-white left">
            <h2 class="title">Phụ tùng xe máy</h2>
            <ul class="list-group categories">
                <?php
                foreach ($productCategoriesFixed as $categoriesLeftList):
                    $item = $categoriesLeftList['ProductCategory']
                ?>
                <li class="list-group-item list-category-image">
                    <?php echo $this->Html->image(Configure::read('settings.imageDir').'50/'.$item['image']).$this->Html->link($item['name'], array('action' => 'productCategory', 'slug' => $item['slug'])); ?>
                    <?php
                    if ($categoriesLeftList['product_categories']) {
                        echo '<div class="sub-categories" style="background-image: url('.$this->Html->url('/').'img/'.Configure::read('settings.imageDir').$item['background'].')">';
                        echo '<ul class=" list-unstyled">';
                        $count = 0;
                        foreach ($categoriesLeftList['product_categories'] as $sub) {
                            $count++;
                            if ($count >= 16) {
                                echo '</ul><ul class="list-unstyled">';
                            }
                            echo '<li>'.$this->Html->link($sub['name'], array('action' => 'productCategory', 'slug' => $sub['slug']), array('escape' => false)).'</li>';
                        }
                        echo '</ul>';
                        // echo '<div class="introduction">'.$item['introduction'].'</div>';
                        echo '</div>';
                    }
                    ?>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
    <div class="col-md-6 hidden-xs" id="slider">
        <div class="sliderBox">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $index = 0;
                    foreach ($banners as $item) {
                        $active = null;
                        if (!$index) {
                            $active = 'active';
                        }
                        echo '<li data-target="#carousel-example-generic" data-slide-to="'.$index.'" class="'.$active.'"></li>';
                        $index++;
                    }
                    ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    $index = 0;
                    foreach ($banners as $item) {
                        $url = false;
                        $active = null;
                        if (!$index) {
                            $active = 'active';
                        }
                        if ($item['Banner']['url']) {
                            $url = $item['Banner']['url'];
                        }
                        echo '<div class="item '.$active.'">';
                        echo $this->Html->image(Configure::read('settings.imageDir').'600/'.$item['Banner']['image'], array(
                            'url' => $url
                        ));
                        echo '</div>';
                        $index++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="block-white hidden-xs">
            <h2 class="title">Dịch vụ miễn phí</h2>
            <ul class="list-group list-unstyled categories">
                <?php
                foreach ($newsFixed as $item) {
                    if ($item['Post']['free']) {
                        echo '<li class="">'.$this->Html->link($this->Text->truncate($item['Post']['name'], 30), array('action' => 'postIndex', 'slug' => $item['Post']['slug']), array('title' => $item['Post']['name'])).'</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div><!-- end row slider-->
<div class="row">
    <div class="col-md-9">
        <?php
        echo $this->Session->flash();
        echo $this->fetch('content');
        ?>
        <?php
        foreach ($introductions as $item):
            if ($item['Introduction']['position'] != INTRODUCTION_CONTENT) {
                continue;
            }
            ?>
            <div class="row ad-row">
                <div class="col-md-12">
                    <?php echo $item['Introduction']['description'] ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div><!-- end main sidebar-->
    <div class="col-md-3" id="sidebar">
        <!-- danh sach phu tung theo xe -->
        <div class="block-sidebar manufactures">
            <h3 class="title red">Phụ tùng theo xe</h3>
            <div class="description">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    $idActive = null;
                    $productCategoryAction = false;
                    if ($this->request->action == 'productCategory') {
                        $productCategoryAction = true;
                        $idActive = $category['ProductCategory']['manufacture_id'];
                        if(!$idActive && isset($category['product_category']['manufacture_id'])) {
                            $idActive = $category['product_category']['manufacture_id'];
                        };
                    }
                    $index = 0;
                    foreach ($manufactures as $manufacture):
                    $index++;

                    $item = $manufacture['Manufacture'];
                    $id = 'heading'.$index;
                        $collapse = 'collapse'.$index;
                        $class = null;
                        if ($productCategoryAction) {
                            if ($item['id'] == $idActive) {
                                $class = 'in';
                            }
                        } else {
                            if (isset($manufactureAction)) {
                                if ($item['id'] == $manufactureAction['ParentMenu']['id']) {
                                    $class = 'in';
                                }
                            }
                        }
                     if(!empty($manufacture['Child']) && $idActive == 0): ?>
                     
                     
                    
                    <!-- danh sach phu tung theo hang -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="<?php echo $id ?>">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $collapse ?>" aria-expanded="true" aria-controls="<?php echo $collapse ?>">
                                    <?php echo $item['name'] ?> 
                                </a>
                            </h4>
                        </div>
                        <div id="<?php echo $collapse ?>" class="panel-collapse collapse <?php echo $class ?>" role="tabpanel" aria-labelledby="<?php echo $id ?>">
                            <?php if ($manufacture['Child']): ?>
                            <div class="panel-body">
                                <ul class="list-group list-unstyled categories">
                                    <?php
                                    foreach ($manufacture['Child'] as $child) { 
                                        $active = null;
                                        if ((isset($manufactureProductCategory) && $child['id'] == $manufactureProductCategory)) {
                                            $active = 'active';
                                        }
                                        if (isset($manufactureAction)) {
                                            if ($child['id'] == $manufactureAction['Manufacture']['id']) {
                                                $active = 'active';
                                            }
                                        }
                                        $url = array('action' => 'getProductByManufacture', 'id' => $child['id'], 'slug' => seo($child['name']));
                                        if ($productCategoryAction) {
                                            $url = $this->Html->url(array('action' => 'productCategory', 'slug' => $this->request->slug), true).'?manufacture='.$child['id'];
                                        }
                                        echo '<li class="col-sm-6 '.$active.'">'.$this->Html->link($child['name'], $url).'</li>';
                                    }
                                    ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <?php endif; ?>
                    <?php if(isset($idActive)): ?>

                        <?php if($item['id'] == $idActive && isset($idActive)): ?>
                        <!-- danh sach phu tung theo hang khi click danh muc -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="<?php echo $id ?>">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $collapse ?>" aria-expanded="true" aria-controls="<?php echo $collapse ?>">
                                        <?php echo $item['name'] ?> 
                                    </a>
                                </h4>
                            </div>
                            <div id="<?php echo $collapse ?>" class="panel-collapse collapse <?php echo $class ?>" role="tabpanel" aria-labelledby="<?php echo $id ?>">
                                <?php if ($manufacture['Child']): ?>
                                <div class="panel-body">
                                    <ul class="list-group list-unstyled categories">
                                        <?php
                                        foreach ($manufacture['Child'] as $child) { 
                                            $active = null;
                                            if ((isset($manufactureProductCategory) && $child['id'] == $manufactureProductCategory)) {
                                                $active = 'active';
                                            }
                                            if (isset($manufactureAction)) {
                                                if ($child['id'] == $manufactureAction['Manufacture']['id']) {
                                                    $active = 'active';
                                                }
                                            }
                                            $url = array('action' => 'getProductByManufacture', 'id' => $child['id'], 'slug' => seo($child['name']));
                                            if ($productCategoryAction) {
                                                $url = $this->Html->url(array('action' => 'productCategory', 'slug' => $this->request->slug), true).'?manufacture='.$child['id'];
                                            }
                                            echo '<li class="col-sm-6 '.$active.'">'.$this->Html->link($child['name'], $url).'</li>';
                                        }
                                        ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
    

                    <?php endif; ?>
                    <?php endforeach; ?>
                    <!-- /END danh sach phu tung theo xe -->

                </div>
            </div>
        </div>
        <?php
        echo $this->fetch('sidebar');
        ?>
        <div class="block-sidebar block-tab-news">
            <div class="tab-news" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tin hot</a>
                    </li>
                    <li role="presentation">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Xem nhiều</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <ul class="list-group list-unstyled categories">
                            <?php
                            foreach ($hotNews as $item) {
                                echo '<li class="">'.$this->Html->link(h($item['Post']['name']), array('action' => 'postIndex', 'slug' => $item['Post']['slug']), array('title' => $item['Post']['name'])).'</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <ul class="list-group list-unstyled categories">
                            <?php
                            foreach ($topViews as $item) {
                                echo '<li class="">'.$this->Html->link(h($item['Post']['name']), array('action' => 'postIndex', 'slug' => $item['Post']['slug']), array('title' => $item['Post']['name'])).'</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="fb-page" data-href="https://www.facebook.com/suachuaxemaymototech/" data-tabs="timeline" data-small-header="false" data-height="370" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/suachuaxemaymototech/" class="fb-xfbml-parse-ignore"><a rel="nofollow" href="https://www.facebook.com/suachuaxemaymototech/">Sửa chữa bảo dưỡng xe máy MotoTech</a></blockquote></div>

        <?php
        foreach ($introductions as $item):
        if ($item['Introduction']['position'] != INTRODUCTION_SIDEBAR) {
            continue;
        }
        ?>
            <div class="ad block-sidebar hidden-xs">
                <h3 class="title red"><?php echo $item['Introduction']['name'] ?></h3>
                <div class="description">
                    <?php echo $item['Introduction']['description'] ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div><!-- end sidebar -->
</div><!--end row main_content-->

</div><!-- end container -->
</div><!-- end main-->
<div class="list-service hidden-xs">
    <div class="container">
        <div class="row">
            <?php
                foreach ($introductions as $item):
                if ($item['Introduction']['position'] != INTRODUCTION_NAV_FOOTER) {
                    continue;
                }
            ?>
                <div class="col-md-4 col-sm-6">
                    <div class="list-news-footer">
                        <div class="media">
                            <a href="#" class="pull-left icon_service">
                                <?php echo $this->Html->image(Configure::read('settings.imageDir').'100/'.$item['Introduction']['image'], array(
                                    'height' => '60',
                                    'width' => '60'
                                )); ?>
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-heading"><?php echo $item['Introduction']['name'] ?></a>
                                <div class="description">
                                    <?php echo $this->Text->truncate(strip_tags($item['Introduction']['description']), 110) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
        </div><!-- end row list news footer-->
    </div>
</div>
<div class="social-list">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12 text-center">
                <div class="chanel-youtube">
                    <script src="https://apis.google.com/js/platform.js"></script>
                    <div class="g-ytsubscribe" data-channelid="UC1hcbecLNhDVrYcolghMdDw" data-layout="full" data-count="default"></div>
                </div>
                <?php
                /* if ($settings['Company']['facebook']) {
                  echo '<a href="'.$settings['Company']['facebook'].'"><span class="icon icon-facebook"></span></a>';
                }
                if ($settings['Company']['google']) {
                    echo '<a href="'.$settings['Company']['google'].'"><span class="social icon-google"></span></a>';
                }
                if ($settings['Company']['youtube']) {
                    echo '<a href="'.$settings['Company']['youtube'].'"><span class="social icon-youtube"></span></a>';
                } */
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-xs-12 email">
                <?php
                $emails = explode(',', $settings['Company']['email']);
                foreach ($emails as $email) {
                    $email = trim($email); 
                    //echo $this->Html->link($email, 'mailto:'.$email, array('class' => 'label label-danger'));
                echo $this->Html->link('<i class="fas fa-envelope" style="margin-right: 4px"></i>'.$email, 'mailto:'.$email, array('escape' => false,'style'=>'width:100%')).'<br>';
                }
                ?>
                <!-- $this->Html->tag('i', '', array('class' => 'fas fa-envelope')). -->
                <?php ?>
                
            </div>
            <!-- <div class="col-md-3">
                <a href="#" class="label label-danger email"> -->
                    <?php //echo $settings['Company']['phone_sos'] ?>
                        
                <!--     </a>
                
                            </div> -->
        </div><!-- social -->
    </div>
</div>


<?php
echo $this->element('frontend/footer');
echo $this->element('frontend/web_chat');
?>
</body>
</html>
