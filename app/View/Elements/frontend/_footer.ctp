<div class="footer">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php
                        foreach ($newsFixed as $news) {
                            if ($news['BlogCategory']['type'] != Configure::read('settings.BlogCategory.typeOfHelp')) {
                                continue;
                            }
                            echo '<h5>'.$news['BlogCategory']['name'].'</h5>';
                            echo '<ul class="nav nav-stacked">';
                            foreach ($news['posts'] as $post) {
                                echo '<li>'.$this->Html->link($post['name'], array('action' => 'postIndex', 'slug' => $post['slug'])).'</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                        <div class="space"></div>
                    </div>
                    <div class=" col-md-6 col-sm-6 col-xs-12">
                        <?php
                        foreach ($newsFixed as $news) {
                            if ($news['BlogCategory']['type'] != Configure::read('settings.BlogCategory.typeOfPartner')) {
                                continue;
                            }
                            echo '<h5>'.$news['BlogCategory']['name'].'</h5>';
                            echo '<ul class="nav nav-stacked">';
                            foreach ($news['posts'] as $post) {
                                echo '<li>'.$this->Html->link($post['name'], array('action' => 'postIndex', 'slug' => $post['slug'])).'</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                        <div class="space"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="space"></div>
                        <div class="footer-detail">
                            <?php
                            echo $settings['Company']['introduction']
                            ?>
                        </div>
                    </div> <?php die; ?>
                    <div class="col-md-4">
                        <embed src="http://s10.histats.com/428.swf"  flashvars="jver=1&acsid=2781342&domi=4"  quality="high"  width="100%" height="100" name="428.swf"  align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" />
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <?php
                if ($settings['Company']['facebook']):
                    ?>
                    <div class="facebook-like-box">
                        <h5><?php echo __('Chúng tôi trên Facebook') ?></h5>
                        <div class="fb-like-box" data-href="<?php echo $settings['Company']['facebook']?>" data-header="false" data-colorscheme="light" data-width="235" data-height="215" data-show-faces="true" data-stream="false" data-show-border="true"></div>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                </div>

                <?php
            endif;
            ?>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h5><?php echo __('Đăng ký nhận tin khuyến mại') ?></h5>
            <form action="#" method="post">
                <input type="text" class="form-control" placeholder="Nhập địa chỉ mail">
                <div class="submit">
                    <button type="button" class="btn">Gửi</button>
                </div>
            </form>
        </div>
    </div>

    </div>
    <div id="back-top" style="display: none">
        <a href="#">To top</a>
    </div>
</div>