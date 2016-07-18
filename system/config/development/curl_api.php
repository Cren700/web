<?php
/**
 * curl_api.php
 * Author   : cren
 * Date     : 16/7/15
 * Time     : 下午11:08
 */

$config = array(
    'account' => array(
        'host'  => 'http://account.dev.web.com',
        'api'   => array(
            'adminAccountLogin'     => '/login/adminAccountLogin',      // 管理员后台登录
            'addAccount'            => '/account/addAccount',           // 添加管理员账号
        ),
    ),
    'product' => array(
        'host'  => 'http://product.dev.web.com',
        'api'   => array(
            'addProduct'            => '/product/add',                  // 添加产品
        )
    ),
);