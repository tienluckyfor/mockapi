<?php
function curl(&$arr, $url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
    curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $arr[$httpcode] = isset($arr[$httpcode]) ? $arr[$httpcode] : [];
    $arr[$httpcode][] = $url;
    curl_close($ch);
}

$arr = [];
$fp = fopen(__DIR__ . "/check-web.csv", "r");
while (!feof($fp)) {
    $fget = fgets($fp);
    $url = trim($fget);
    curl($arr, $url);
}
fclose($fp);

//unset($arr[200]);
foreach ($arr as $key => $item) {
    foreach ($item as $item1) {
        if($key!=200)
        echo "<a href='{$item1}' target='_blank' style='color:red'>{$item1}</a> - {$key}<br/>";
    }
}
echo '<hr/>';
foreach ($arr as $key => $item) {
    foreach ($item as $item1) {
        if($key==200)
        echo "<a href='{$item1}' target='_blank'>{$item1}</a> - {$key}<br/>";
    }
}
//echo '<pre>';
//var_dump($arr);
//echo '</pre>';
//die();
