<nav class="navbar" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand visible-xs"><?php echo $settings['Company']['name'] ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="<?php if ($this->request->action == 'index') echo "active"; ?>"><a href="<?php echo $this->Html->url(array('action' => 'index')) ?>"><span class="home"></span> <?php echo __('Trang chủ') ?></a></li>
            <?php
            foreach ($menus as $menu) {
                $params = array(
                    'escape' => false
                );
                $class = $caret = null; // class for tag <li>
                $hasSubMenus = $subMenuItems = false; // check has sub menus
                $url = $menu['Menu']['slug']; //url for link menu

                // if has sub menus
                if (isset($subMenus[$menu['Menu']['id']])) {
                    $class="dropdown";
                    $caret = '<b class="caret"></b>';
                    $params = array(
                        'class' => 'dropdown-toggle disabled',
                        'data-toggle' => 'dropdown',
                        'escape' => false
                    );
                    $hasSubMenus = true;
                    $subMenuItems = $subMenus[$menu['Menu']['id']];

                }

                //set active for current menu
                if ($this->Html->url($url) == $this->request->here) {
                    $class .= ' active';
                }
                // link to menu
                $list = '<li class="'.$class.'">';
                $list .= $this->Html->link($menu['Menu']['name'] . $caret, $url, $params);

                // sub menu
                if ($hasSubMenus) {
                    $list .= $this->element('frontend/sub_menu', array(
                        'subMenuItems' => $subMenuItems
                    ));
                }
                // end link menu
                $list .= '</li>';

                echo $list;
            }
            ?>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>