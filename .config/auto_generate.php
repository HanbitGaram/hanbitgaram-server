<?php
define("_BASE", realpath(__DIR__ . '/../'));
include_once(__DIR__.'/functions.php');

##################################################################################
# Cloudflare
# List : https://www.cloudflare.com/ko-kr/ips/
##################################################################################
$CF = <<<CF
deny all;
CF;

for($i=0, $content=explode(PHP_EOL, GET('https://www.cloudflare.com/ips-v4')), $cnt=count($content); $i<$cnt; $i++){
    $CF = "allow {$content[$i]};".PHP_EOL.$CF;
    $CF = "set_real_ip_from {$content[$i]};".PHP_EOL.$CF;
}
for($i=0, $content=explode(PHP_EOL, GET('https://www.cloudflare.com/ips-v6')), $cnt=count($content); $i<$cnt; $i++){
    $CF = "allow {$content[$i]};".PHP_EOL.$CF;
    $CF = "set_real_ip_from {$content[$i]};".PHP_EOL.$CF;
}

// 캐리지 리턴 제거, 개행만 남김
$CF = str_replace("\r", "","# Last Update : ".date('Y-m-d H:i:s').'+09:00'.PHP_EOL.$CF);
$CF .= PHP_EOL."real_ip_header CF-Connecting-IP;";
file_put_contents(_BASE.'/nginx/cloudflare.conf', $CF);
##################################################################################

