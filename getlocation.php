<?php
define('QQMAP_API_URL', http://apis.map.qq.com/ws/geocoder/v1/?location=);
define('QQMAP_API_KEY', VS6BZ-5YDCK-ECLJ7-AWH3V-V3BC3-BDB7M);

function getAddressQQ($longitude, $latitude, $get_poi = 0)
{
    $url     = QQMAP_API_URL.$latitude.','.$longitude.'&key='.QQMAP_API_KEY.'&get_poi='.$get_poi;
    $content = file_get_contents($url);
    $json    = json_decode($content);

    $result  = $json->{'result'}->{'address_component'};
    return array(
        'province'  => $result->province,
        'city'      => $result->city,
        'district'  => $result->district
    );
}