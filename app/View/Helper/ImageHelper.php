<?php
class ImageHelper extends AppHelper {

    var $helpers = array('Html');

    var $cacheImageFolder = 'cache'; // relative to IMAGES_URL path

    function resize($path, $dst_w, $dst_h, $htmlAttributes = array(), $pathImage = false) {

        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type

        $fullPath = Configure::read('settings.uploadDir');

        $url = $fullPath.$path;

        list($w, $h, $type) = getimagesize($url);
        $r = $w / $h;
        $dst_r = $dst_w / $dst_h;

        if ($r > $dst_r) {
            $src_w = $h * $dst_r;
            $src_h = $h;
            $src_x = ($w - $src_w) / 2;
            $src_y = 0;
        } else {
            $src_w = $w;
            $src_h = $w / $dst_r;
            $src_x = 0;
            $src_y = ($h - $src_h) / 2;
        }

        $relFile = Configure::read('settings.cacheImageDir').'/'.$dst_w.'-'.$dst_h.'-'.basename($path); // relative file
        $cacheFile = Configure::read('settings.cacheImagePath').'/'.$dst_w.'-'.$dst_h.'-'.basename($path);

        if (file_exists($cacheFile)) {
            if (@filemtime($cacheFile) >= @filemtime($url)) {
                $cached = true;
            } else {
                $cached = false;
            }
        } else {
            $cached = false;
        }

        if (!$cached) {
            $image = call_user_func('imagecreatefrom'.$types[$type], $url);
            if (function_exists("imagecreatetruecolor")) {
                $temp = imagecreatetruecolor($dst_w, $dst_h);
                imagecopyresampled($temp, $image, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
            } else {
                $temp = imagecreate ($dst_w, $dst_h);
                imagecopyresized($temp, $image, 0, 0, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
            }
            call_user_func("image".$types[$type], $temp, $cacheFile);
            imagedestroy($image);
            imagedestroy($temp);
        }
        if ($pathImage) {
            return $relFile;
        }

        return $this->Html->image($relFile, $htmlAttributes);
    }
}
?>