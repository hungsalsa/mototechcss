<div class="content-page">
    <h1 class="title"><?php echo $category['BlogCategory']['name'] ?></h1>
    <div class="row">
        <div class="col-md-12 list-posts">
             <div class="news-home">
                <?php foreach ($posts as $item) { ?>

                    <div class="media news">
                        <div class="media-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php if ($item['Post']['image']): ?>
                                        <a class="img_new" href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>">
                                            <?php echo $this->Html->image(Configure::read('settings.imageDir').'500/'.$item['Post']['image'],array('alt' => $item['Post']['name'])); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="main_news">
                                        <h2><a href="<?php echo $this->Html->url(array('action' => 'postIndex', 'slug' => $item['Post']['slug'])); ?>"><?php echo $item['Post']['name'] ?></a></h2>
                                        <div class="desription_news"><?php echo $this->Text->truncate(strip_tags($item['Post']['content']), 360) ?></div>
                                    </div>
                                </div>
                            </div>
                                
                            
                        </div>
                    <div class="clearfix"></div>
                </div>
                
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination pagination-sm" style="margin: 5px auto">
                <?php
                if (@$category) {
                    $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'postCategory', 'slug' => $category['BlogCategory']['slug']);
                }
                echo $this->Paginator->numbers(Configure::read('settings.paginationOptions'));
                ?>
            </ul>
        </div>
    </div>
</div>