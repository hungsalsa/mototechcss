<div class="row">
    <?php foreach ($products as $item): ?>
        <?php 
// echo '<pre>';print_r($item);die;    
         ?>
        <div class="col-md-3 col-sm-6">
            <div class="item-product" title="<?= $item['Product']['name'] ?>">
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
                    <a href="<?= $this->Html->url(array('action' => 'productIndex', 'slug' => $item['Product']['slug'])); ?>">
                        <?= $this->Html->image(Configure::read('settings.imageDir').'220/'.$item['Product']['image']); ?>
                        <br>
                        <?= $this->Number->currency($item['Product']['price']) ?>
                        <br>
                        <?= h($item['Product']['name']) ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
if (!isset($paginator) || $paginator) { 
?>
    <div class="clearfix"></div>
    <div class="text-center" style="margin: 20px auto 10px">
        <ul class="pagination pagination-sm" style="margin: auto">
            <?php
            if (isset($category)) { 
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'productCategory', 'slug' => $category['ProductCategory']['slug']);
            }
            if (@$allProducts) {
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'allProducts');
            }
            if ($this->request->action == 'search') {
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'search', '?' => array('q' => $key));
            }
            if ($this->request->action == 'getProductByManufacture') { 
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'getProductByManufacture', 'id' => $manufactureAction['Manufacture']['id'], 'slug' => seo($manufactureAction['Manufacture']['name'])); 
            }
            if($manufacture = $this->request->query('manufacture')){ 
                $this->Paginator->options['url'] = array('controller' => 'frontend', 'action' => 'productCategory', '?' =>array('manufacture'=>$manufacture),'slug' => $category['ProductCategory']['slug']);
            }
            echo $this->Paginator->numbers(Configure::read('settings.paginationOptions'));

            ?>
        </ul>

    </div>
    <br>
<?php
}