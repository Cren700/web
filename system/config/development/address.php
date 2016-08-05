<?php
/**
 * address.php
 * 地图API使用高德地图: API手册地址http://lbs.amap.com/api/webservice/reference/georegeo
 * Author   : cren
 * Date     : 16/7/31
 * Time     : 下午3:37
 */

$config = array(
    // 高德lbs配置
    'lbs_conf' => array(
        array(
            'name'  => 'demo1',
            'key'   => '65c3683a80e283932367724beaaaad6c'
        ),
        array(
            'name'  => 'demo2',
            'key'   => 'd28d15ef021c43fd230e9128a4199a87'
        ),
    ),
    // 地理/逆地理编码API
    'addr_encode_url' => 'http://restapi.amap.com/v3/geocode/geo',
    'addr_decode_url' => 'http://restapi.amap.com/v3/geocode/regeo',

);