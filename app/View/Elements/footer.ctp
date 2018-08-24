<div class="clearfix"></div>
<div class="footer">
    <div class="social">
        <div class="container">
            <div class="bg">
                <a href="<?php echo $company['Company']['facebook'] ?>"><span class="icon-facebook"></span> </a>
                <a href="<?php echo $company['Company']['google'] ?>"><span class="icon-google"></span> </a>
                <a href="#"><span class="icon-twitter"></span> </a>
            </div>
        </div>
    </div>
    <div class="information">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="media">
                        <div class="pull-left">
                            <img src="/frontend/images/footer.png" class="footer-image">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                Giới thiệu về <?php echo $company['Company']['name'] ?>
                            </h4>
                            <div class="intro">
                                <?php echo $company['Company']['introduction'] ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-2">
                    <h4>Tư vấn, hỗ trợ</h4>
                    <ul class="list-unstyled">
                        <?php
                        foreach ($news as $new) {
                            echo '<li>';
                            echo $this->Html->link($new['Post']['name'], '/bai-viet/'.$new['Post']['slug']);
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Liên hệ</h4>
                    <div class="intro">
                        Địa chỉ liên hệ: <?php echo $company['Company']['address'] ?> <br>
                        SĐT: <?php echo $company['Company']['phone'] ?><br>
                        Email: <?php echo $company['Company']['email'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
