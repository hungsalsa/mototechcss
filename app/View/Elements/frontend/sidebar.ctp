<div class="col-md-3 sidebar">
    <?php
    if ($supports)://if have support
    ?>
    <div class="sidebar-block">
        <div class="block-heading">
            <span class="support"></span> <?php echo __('HỖ TRỢ TRỰC TUYẾN') ?>
        </div>
        <div class="block-content">
            <?php
            foreach ($supports as $support) {
                $showName = true;
                $image = false;
                $name = $support['Support']['name'];

                if ($support['Support']['type'] == 3) {
                    echo '<div class="phone">'.$support['Support']['phone'].'</div>';
                    continue;
                }
                switch ($support['Support']['type']) {
                    case 2:
                        $class = 'yahoo';
                        $url = 'ymsgr:sendim?'.$support['Support']['nick_name'];
                        $image = '<img src="http://opi.yahoo.com/online?u='.$support['Support']['nick_name'].'&amp;m=g&amp;t=1&amp;l=us">';
                        break;
                    case 1:
                        $class = 'skype';
                        $url = 'skype:'.$support['Support']['nick_name'].'?chat';
                        break;
                }
                echo '<div class="'.$class.'">';
                echo '<a href="'.$url.'">';
                if ($image) {
                    echo $image;
                } else {
                    echo '<span class="icon-'.$class.'"></span>';
                }
                echo '</a>';
                if ($showName) {
                    echo '<span>' . __('Hotline (24/24)') . '</span>';
                    echo '<p>Điện thoại: '.$support['Support']['phone'].'</p>';
                }
                echo '</div>';

            }
            ?>

        </div>
    </div>
    <?php
    endif; // if have supports

    if ($products): // if have feature products
        ?>
        <div class="sidebar-block">
            <div class="block-heading">
                <span class=""></span> <?php echo $titleFeature ?>
            </div>
            <div class="block-content">
                <?php
                foreach ($products as $product) {
                    echo '<div class="product">';
                    echo $this->Html->link($this->Html->image(Configure::read('settings.imageDir').'279/'.$product['Product']['image'], array(
                            'alt' => $product['Product']['name'],
                        )).'<br>'.$product['Product']['name'], array(
                            'action' => 'productIndex',
                            'slug' => $product['Product']['slug'],
                        ), array(
                            'escape' => false,
                            'title' => $product['Product']['name'],
                        ));
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    <?php
    endif; //if not have products
    ?>
</div>