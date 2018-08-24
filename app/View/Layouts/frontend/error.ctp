<div align="center">
<?php
$image = '500.png';
if ($code != '500') {
    $code = '404';
    $image = '404.jpg';
}
echo $this->Html->image($image, array(
    'url' => '/',
    'alt' => $code .' error',
));
?>
</div>