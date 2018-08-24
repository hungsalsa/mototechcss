<!--  start nav -->
<div class="nav">
    <div class="table">
        <?php
        foreach (Configure::read('settings.menus') as $name => $menu) {
            $class = 'select';
            if (isset($menu['codeActive'])) {
                if ($menu['codeActive'] == $codeActive) {
                    $class = 'current';
                }
            }
            if (isset($menu['role'])) {
                if (AuthComponent::user('role') != $menu['role']) {
                    continue;
                }
            }
            $url = '#';
            if (isset($menu['url'])) {
                $url = $menu['url'];
            }
            echo '<ul class="'.$class.'">';
            echo '<li>'.$this->Html->link('<b>'.__($name).'</b>', $url, array('escape' => false, 'class' => 'linkParent'));
            if (isset($menu['children'])) {
                echo '<div class="select_sub show"><ul class="sub">';
                foreach ($menu['children'] as $nameChild => $menuChild) {
                    $active = null;
                    if ($menuChild['controller'] == $this->request->params['controller']) {
                        $active = 'sub_show';
                    }
                    echo '<li class="'.$active.'">';
                    echo $this->Html->link(__($nameChild), $menuChild);
                    echo '</li>';
                }
                echo '</ul></div>';
            }
            echo '</li>';
            echo '</ul>';
            echo '<div class="nav-divider">&nbsp;</div>';
        }
        ?>


        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<!--  start nav -->