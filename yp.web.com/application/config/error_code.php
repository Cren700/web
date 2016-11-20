<?php
/**
 * error_code.php
 * Author   : cren
 * Date     : 16/7/10
 * Time     : 上午12:23
 */

$config = array(
    // validation 00001 ~ 99999
    'validation_error_1' => array('code' => 00001, 'msg' => '至少为6位字符' ),               // 至少为6位字符
    'validation_error_2' => array('code' => 00002, 'msg' => '至多为16位字符' ),              // 至多为16位字符
    'validation_error_3' => array('code' => 00003, 'msg' => '邮箱不正确' ),                  // 邮箱不正确
    'validation_error_4' => array('code' => 00004, 'msg' => '必须为数字' ),                  // 必须为数字
    'validation_error_5' => array('code' => 00005, 'msg' => '不能为空' ),                    // 不能为空
    'validation_error_6' => array('code' => 00006, 'msg' => '请输入正确的手机号码' ),         // 手机号码

    // account 100000 ~ 199999
    'account_error_0' => array( 'code' => 100000, 'msg' => '用户账号不存在'),                //用户账号不存
    'account_error_1' => array( 'code' => 100001, 'msg' => '用户账号密码不一致'),            //用户账号密码不一致
    'account_error_2' => array( 'code' => 100002, 'msg' => '用户名已存在'),                 //用户名已存在
    'account_error_3' => array( 'code' => 100003, 'msg' => '添加数据错误'),                 //添加数据错误
    'account_error_99' => array( 'code' => 100099, 'msg' => '用户未登录'),                  //用户未登录



    // product 200000 ~ 299999
    'product_error_1' => array( 'code' => 200001, 'msg' => '添加产品错误'),                 //添加产品数据错误
    'product_error_2' => array( 'code' => 200002, 'msg' => '获取数据出错'),                 // 获取产品数据出错
    'product_error_3' => array( 'code' => 200003, 'msg' => '数据出错'),                     // 获取产品数据出错

);