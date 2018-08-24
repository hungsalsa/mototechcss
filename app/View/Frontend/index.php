<h1 style="font-size: 20px;color: #000;"><?= isset($title_for_layout)? $title_for_layout:'' ?></h1>
<div class="row listNewsHomePage">
 <?php
         if(isset($_COOKIE['sw'])) { echo "Screen width: ".$_COOKIE['sw']."<br/>";}
         if(isset($_COOKIE['sh'])) { echo "Screen height: ".$_COOKIE['sh']."<br/>"; die;}
    ?>
    <?php
    $index = 1;
    foreach ($newsHomepage as $item) {
        
        if (!$item['Post']['feature']) {
            continue;
        }
        $class = 'col-md-4 col-sm-6 col-xs-12';
        $sizeImage = '500';
        if ($index <= 2) {
            $class = 'col-sm-6 col-md-6 col-xs-12';
        }
        ?>
        <div class="<?= $class;?>">
            <div class="new-feature">
                <div class="block">
                    <div class="den">
                        <div class="description">
                            <?= $item['Post']['description']; ?>
                            <span style="float: right;"><?= $this->Html->link('Xem tiếp ...', array(
                            'action' => 'postIndex',
                            'slug' => $item['Post']['slug']
                        ), array(
                            'class' => 'caption'
                        ));
                        ?></span>
                        </div>
                    </div>
                    <div class="xanh">
                        <?= $this->Html->image(Configure::read('settings.imageDir').$sizeImage.'/'.$item['Post']['image'],array('alt' => $item['Post']['name']), array(
                        'url' => array(
                            'action' => 'postIndex',
                            'slug' => $item['Post']['slug']
                        )
                        )
                        );?>
                        <?= $this->Html->link($item['Post']['name'], array(
                            'action' => 'postIndex',
                            'slug' => $item['Post']['slug']
                        ), array(
                            'class' => 'caption'
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
       
    <?php $index++; } ?>
</div><!-- end new feature-->

<div class="row">
    <div class="col-md-12">
        <div class="news-home">
            <h3 class="title red">Nội dung nổi bật</h3>
            <?php
            foreach ($newsHomepage as $item) :
            if (!$item['Post']['home']) {
                continue;
            }
            ?>
            <div class="media news">
                <div class="media-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($item['Post']['image']): ?>
                                <a class="img_new" href="<?= $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>">
                                    <?= $this->Html->image(Configure::read('settings.imageDir').'500/'.$item['Post']['image'],array('alt' => $item['Post']['name'])); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="main_news">
                                <h2><a href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>" class=""><?php echo $item['Post']['name'] ?></a></h2>
                                <div class="desription_news"><?php echo $this->Text->truncate(strip_tags($item['Post']['content']), 360) ?></div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="clearfix"></div>
            </div>
            <?php endforeach; ?>
        </div><!-- end news home-->
    </div>
</div>