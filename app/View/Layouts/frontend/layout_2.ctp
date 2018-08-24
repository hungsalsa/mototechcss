<!DOCTYPE html>
<html>
<head>
    <?php
    echo $this->Element('frontend/head', array(), array('cache' => true));

    echo $this->Html->meta('description', $description);
    echo $this->Html->meta('keywords', $keyword);
    ?>
    <title><?php echo $title_for_layout; ?></title>

</head>
<body>
<div class="header">
    <div class="container">
        <ul class="list-inline">
            <li><a href="#">Địa chỉ Moto</a> </li>
            <li><a href="#">Quy trình bảo dưỡng</a> </li>
            <li><a href="#">Hỗ trợ trực tuyến: skype yahoo</a> </li>
            <li><a href="#">Giải đáp kỹ thuật: 0912312312</a> </li>
            <li><a href="#">Cứu hộ khẩn cấp: 09123123123</a> </li>
        </ul>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="logo">
                    <img src="img/logo.png">
                </a>
            </div>
            <div class="col-md-6">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" required="required" class="form-control" placeholder="Search..." aria-describedby="sizing-addon2">
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
<div class="menu">
    <div class="container">
        <nav class="navbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand visible-xs" href="#">Mototech</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Trang chủ</a></li>
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Kỹ thuật</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Lựa chọn phụ tùng</a></li>
                    <li><a href="#">Phụ kiện trang trí</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div><!-- end menu-->
<div class="main">
<div class="container">
<div class="row">
    <div class="col-md-3">
        <div class="block-white">
            <h2 class="title">Phụ tùng xe máy</h2>
            <ul class="list-group categories">
                <li class="list-group-item">
                    <a href="#">Cras justo odio</a>
                    <ul class="sub-categories list-unstyled">
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <a href="#">Cras justo odio</a>
                    <ul class="sub-categories list-unstyled">
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                        <li><a href="#">Cras justo odio - sub</a></li>
                    </ul>
                </li>
                <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                <li class="list-group-item"><a href="#">Cras justo odio</a></li>
                <li class="list-group-item"><a href="#">Cras justo odio</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        123
    </div>
    <div class="col-md-3">
        <div class="block-white">
            <h2 class="title">Dịch vụ miễn phí</h2>
            <ul class="list-group list-unstyled categories">
                <li class=""><a href="#">Cras justo odio</a></li>
                <li class=""><a href="#">Cras justo odio</a></li>
                <li class=""><a href="#">Cras justo odio</a></li>
                <li class=""><a href="#">Cras justo odio</a></li>
                <li class=""><a href="#">Cras justo odio</a></li>
                <li class=""><a href="#">Cras justo odio</a></li>
            </ul>
        </div>
    </div>
</div><!-- end row slider-->
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-sm-6">
                <div class="new-feature">
                    <div class="block">
                        <a href="#"><img src="http://placehold.it/500x200"></a>
                        <a href="#" class="caption">Tên bài viết</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="new-feature">
                    <div class="block">
                        <a href="#"><img src="http://placehold.it/500x200"></a>
                        <a href="#" class="caption">Tên bài viết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="new-feature">
                    <div class="block">
                        <a href="#"><img src="http://placehold.it/300x200"></a>
                        <a href="#" class="caption">Tên bài viết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="new-feature">
                    <div class="block">
                        <a href="#"><img src="http://placehold.it/300x200"></a>
                        <a href="#" class="caption">Tên bài viết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="new-feature">
                    <div class="block">
                        <a href="#"><img src="http://placehold.it/300x200"></a>
                        <a href="#" class="caption">Tên bài viết</a>
                    </div>
                </div>
            </div>
        </div><!-- end new feature-->
        <div class="row">
            <div class="col-md-12">
                <div class="news-home">
                    <h3 class="title red">Bài viết trang chủ</h3>
                    <div class="media news">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/150x150">
                        </a>
                        <div class="media-body">
                            <a class="media-heading">There are many variations of</a>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="media news">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/150x150">
                        </a>
                        <div class="media-body">
                            <a class="media-heading">There are many variations of</a>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="media news">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/150x150">
                        </a>
                        <div class="media-body">
                            <a class="media-heading">There are many variations of</a>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div><!-- end news home-->
            </div>
        </div>
        <div class="row ad-row">
            <div class="col-md-12">
                <img src="http://placehold.it/1200x150">
            </div>
        </div>
    </div><!-- end main sidebar-->
    <div class="col-md-3" id="sidebar">
        <div class="block-sidebar">
            <h3 class="title red">Thông tin xe của bạn</h3>
            <div class="description">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> </span>
                            <input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span> </span>
                            <input type="text" class="form-control" placeholder="Phone number" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                </form>
                <form>
                    <p>Quý khách đánh giá thế nào về dịch vụ của chúng tôi</p>
                    <div class="radio"><label><input type="radio" name="vote"> Rất tốt</label></div>
                    <div class="radio"><label><input type="radio" name="vote"> Tốt</label></div>
                    <div class="radio"><label><input type="radio" name="vote"> Trung Bình</label></div>
                    <div class="radio"><label><input type="radio" name="vote"> Kém</label></div>
                    <button type="submit" class="btn btn-sm btn-danger">Gửi thông tin</button>
                    <a class="btn btn-sm btn-info">Kết quả điều tra</a>
                </form>
            </div>
        </div>
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
                            <li class=""><a href="#">Cras justo odio</a></li>
                            <li class=""><a href="#">Cras justo odio</a></li>
                            <li class=""><a href="#">Cras justo odio</a></li>
                            <li class=""><a href="#">Cras justo odio</a></li>
                            <li class=""><a href="#">Cras justo odio</a></li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">Noi dung doc nhieu</div>
                </div>
            </div>
        </div>
        <div class="ad block-sidebar">
            <h3 class="title red">Quảng cáo</h3>
            <div class="description">
                <img src="http://placehold.it/400x300">
            </div>
        </div>
    </div><!-- end sidebar -->
</div><!--end row main_content-->

</div><!-- end container -->
</div><!-- end main-->
<div class="list-service">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="list-news-footer">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/60x60">
                        </a>
                        <div class="media-body">
                            <a href="#" class="media-heading">There are many variations</a>
                            <div class="description">
                                majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="list-news-footer">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/60x60">
                        </a>
                        <div class="media-body">
                            <a href="#" class="media-heading">There are many variations</a>
                            <div class="description">
                                majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="list-news-footer">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/60x60">
                        </a>
                        <div class="media-body">
                            <a href="#" class="media-heading">There are many variations</a>
                            <div class="description">
                                majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="list-news-footer">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/60x60">
                        </a>
                        <div class="media-body">
                            <a href="#" class="media-heading">There are many variations</a>
                            <div class="description">
                                majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="list-news-footer">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/60x60">
                        </a>
                        <div class="media-body">
                            <a href="#" class="media-heading">There are many variations</a>
                            <div class="description">
                                majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="list-news-footer">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="http://placehold.it/60x60">
                        </a>
                        <div class="media-body">
                            <a href="#" class="media-heading">There are many variations</a>
                            <div class="description">
                                majority have suffered alteration in some form.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div><!-- end row list news footer-->
    </div>
</div>
<div class="social-list">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="#"><span class="social icon-facebook"></span></a>
                <a href="#"><span class="social icon-google"></span></a>
                <a href="#"><span class="social icon-youtube"></span></a>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-8">
                <a href="#" class="label label-danger">Vuhaik3@gmail.com</a>
                <a href="#" class="label label-danger email">09186775423</a>
            </div>
        </div><!-- social -->
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3 class="title">Thông tin về Motech</h3>
                <div class="description">
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="title">Những điều cần biết</h3>
                <ul class="list-group list-unstyled categories">
                    <li class=""><a href="#">Cras justo odio</a></li>
                    <li class=""><a href="#">Cras justo odio</a></li>
                    <li class=""><a href="#">Cras justo odio</a></li>
                    <li class=""><a href="#">Cras justo odio</a></li>
                    <li class=""><a href="#">Cras justo odio</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 class="title">Motech Kim Ngưu</h3>
                <div class="description">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                </div>

                <h3 class="title">Motech Kim Ngưu</h3>
                <div class="description">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                </div>
            </div>
        </div>
    </div>
</div>
<a class="back-to-top">
    <img src="img/back-to-top.png">
</a>
</body>
</html>