<?php
//开发者后台生成的appid
$key = 'IpDon7webrayXkAS0GEIhh0zhP';

//需要解析的url
$url = 'https://v.douyin.com/UBFXqYe/';

$param = [
    'key'        => $key,
    'url'        => $url,
];

$apiUrl = 'https://www.52api.cn/api/video_parse?' . http_build_query($param);
$videoInfo = file_get_contents($apiUrl);
print_r($videoInfo);
