<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php
                echo $this->Html->image(Configure::read('settings.imageDir').$settings['Company']['logo'], array(
                    'url' => array('action' => 'index'),
                    'alt' => $settings['Company']['name'],
                    'title' => $settings['Company']['name'],
                ))
                ?>
                <p>
                    <?php
                    echo __('Địa chỉ: %s', $settings['Company']['address']);
                    ?>
                </p>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-sm-7 col-xs-6">
                        <?php
                        echo $this->Form->create('Search', array(
                            'url' => array('controller' => 'frontend', 'action' => 'search'),
                            'type' => 'get',
                            'class' => 'form-inline'
                        ));
                        ?>
                        <div class="input-group">
                            <input type="text" required="required" name="q" class="form-control" placeholder="<?php echo __('Gõ từ khoá tìm kiếm') ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                        </span>
                        </div><!-- /input-group -->
                        <?php
                        echo $this->Form->end();
                        ?>
                    </div>
                    <div class="col-sm-5 text-right col-xs-6">

                        <!--nocache-->
                        <?php
                        echo $this->element('frontend/cart');
                        ?>
                        <!--/nocache-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="hotline">
                    <?php echo __('Hotline: %s', $settings['Company']['phone']) ?>
                </div>
            </div>
        </div>


    </div>
</div>