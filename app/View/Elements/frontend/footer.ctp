
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3 class="title">Thông tin về <?php echo $settings['Company']['name'] ?></h3>
                <div class="description">
                    <?php echo $settings['Company']['introduction'] ?>
                </div>
            </div>
            <div class="col-md-3">
                <h3 class="title">Những điều cần biết</h3>
                <ul class="list-group list-unstyled categories">
                    <?php
                    foreach ($newsFixed as $item) {
                        if ($item['Post']['help']) {
                            echo '<li class="">'.$this->Html->link($this->Text->truncate($item['Post']['name'], 30), array('action' => 'postIndex', 'slug' => $item['Post']['slug']), array('title' => $item['Post']['name'])).'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-4">
                <?php
                foreach ($introductions as $item):
                    if ($item['Introduction']['position'] != INTRODUCTION_FOOTER) {
                        continue;
                    }
                    ?>
                    <h3 class="title"><?php echo $item['Introduction']['name'] ?></h3>
                    <div class="description">
                        <?php echo $item['Introduction']['description'] ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<a class="back-to-top">
    <i class="glyphicon glyphicon-arrow-up"></i>
</a>