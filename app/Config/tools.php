<?php
/**
 * Remove last slash.
 * @param $sStr
 * @return string
 */
function rmvLastSlash($sStr)
{
    return rtrim($sStr, '/');
}
function sqle($str) {
    return mysql_real_escape_string($str);
}
function seo($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return str_replace('_', '-', strtolower( Inflector::slug($str) ));
}
function toolEncode($data) {
    return base64_encode(json_encode($data));
}
function toolDecode($data) {
    return json_decode(base64_decode($data), true);
}
function findIp() {
    if(getenv("HTTP_CLIENT_IP")) {
        return getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        return getenv("HTTP_X_FORWARDED_FOR");
    } else {
        return getenv("REMOTE_ADDR");
    }
}

if (!function_exists('vd')) {
    function vd($var = false, $trace = 1, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            for ($i = 0; $i < $trace; $i++) {
                if (!isset($calledFrom[$i]['file'])) {
                    break;
                }
                echo substr($calledFrom[$i]['file'], 1);
                echo ' (line <strong>' . $calledFrom[$i]['line'] . '</strong>)';
                echo "<br />";
            }
        }
        echo "<pre class=\"cake-debug\">\n";

        $var = var_dump($var);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
    }
    function vdd($var = false, $trace = 1, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            for ($i = 0; $i < $trace; $i++) {
                if (!isset($calledFrom[$i]['file'])) {
                    break;
                }
                echo substr($calledFrom[$i]['file'], 1);
                echo ' (line <strong>' . $calledFrom[$i]['line'] . '</strong>)';
                echo "<br />";
            }
        }
        echo "<pre class=\"cake-debug\">\n";

        $var = var_dump($var);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
        die;
    }

    function getData($sUrl, $aData = null) {
        $mCurlHandle = curl_init($sUrl);
        $sCookiePath = '/tmp/cookies.txt';
        if (empty($aData)) {
            curl_setopt($mCurlHandle, CURLOPT_CUSTOMREQUEST, "GET");
        } else {
            $sData = json_encode($aData);
            curl_setopt($mCurlHandle, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($mCurlHandle, CURLOPT_POSTFIELDS, $sData);
            curl_setopt($mCurlHandle, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($sData)));
        }
        curl_setopt($mCurlHandle, CURLOPT_COOKIEJAR, $sCookiePath);
        curl_setopt($mCurlHandle, CURLOPT_COOKIEFILE, $sCookiePath);
        curl_setopt($mCurlHandle, CURLOPT_RETURNTRANSFER, true);
        $sResult = curl_exec($mCurlHandle);

        return $sResult;
    }
}