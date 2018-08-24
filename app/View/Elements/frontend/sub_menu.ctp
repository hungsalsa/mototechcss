<ul class="dropdown-menu">
    <?php
    foreach ($subMenuItems as $item) {
        $class = null;
        if ($this->Html->url($item['Menu']['slug']) == $this->request->here) {
            $class .= 'active';
        }

        echo '<li class="'.$class.'">';
        echo $this->Html->link($this->Html->image(Configure::read('settings.imageDir').'50/'.$item['Menu']['image'], array('width' => '20')).' '.$item['Menu']['name'], $item['Menu']['slug'], array('escape' => false));
        echo '<div class="clearfix visible-lg visible-md">'.$item['Menu']['introduction'].'</div>';
        echo '</li>';
    }

    ?>
</ul>