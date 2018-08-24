<div class="row">
    <div class="col-md-12 hidden-lg">
<!--        <img class="img-responsive" width="100%" src="http://placehold.it/711x348"/>-->
        <hr>
    </div>
    <div class="col-md-12 visible-lg" id="slider">
        <div class="carousel"> <!-- BEGIN CONTAINER -->
            <div class="slides"> <!-- BEGIN CAROUSEL -->
                <?php
                foreach ($banners as $banner => $url) {
                    if (!$url) {
                        $url = '#';
                    } else {
                        $url = 'http://' . str_replace('http://', '', $url);
                    }
                    echo '<div>';
                    echo $this->Html->image(Configure::read('settings.imageDir') . '711/' . $banner, array(
                        'url' => $url,
                    ));
                    echo '</div>';
                }
                ?>

            </div>
        </div>
        <!-- END CAROUSEL -->
    </div>
</div>