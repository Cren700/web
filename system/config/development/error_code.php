<?php
/**
 * error_code.php
 * Author   : cren
 * Date     : 16/7/10
 * Time     : 上午12:23
 */

$config = array(
    // validation 00001 ~ 99999
    'validation_error_1' => array('code' => 00001, 'msg'=> '至少为6位字符' ),               // 至少为6位字符
    'validation_error_2' => array('code' => 00002, 'msg'=> '至多为16位字符' ),              // 至多为16位字符
    'validation_error_3' => array('code' => 00003, 'msg'=> '邮箱不正确' ),                  // 邮箱不正确
    'validation_error_4' => array('code' => 00004, 'msg'=> '必须为数字' ),                  // 必须为数字
    'validation_error_5' => array('code' => 00005, 'msg'=> '不能为空' ),                    // 不能为空

    // account 100000 ~ 199999
    'account_error_0' => array( 'code' => 100000, 'msg'=> '用户账号不存在'),                //用户账号不存
    'account_error_1' => array( 'code' => 100001, 'msg'=> '用户账号密码不一致'),            //用户账号密码不一致
    'account_error_2' => array( 'code' => 100002, 'msg'=> '用户名已存在'),                 //用户名已存在
    'account_error_3' => array( 'code' => 100003, 'msg'=> '添加数据错误'),                 //添加数据错误
);