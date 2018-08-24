<div class="breadcrumbs">
    <?php
    echo $this->Html->tag('h1', $title);
    if (isset($links)) {
        foreach ($links as $link) {
            echo $this->Html->link($link['name'], array('action' => 'productCategory', 'slug' => $link['slug']));
        }
    }
    ?>
</div>