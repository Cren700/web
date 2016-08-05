<?php
/**
 * address.php
 * Author   : cren
 * Date     : 16/7/31
 * Time     : 下午3:59
 */

$base_filename = basename(__FILE__);
$config_filename = ROOT_PATH . "/system/config/" . ENVIRONMENT . "/{$base_filename}";

if(is_file($config_filename)) {
    include $config_filename;
} else {
    echo "Include config/address.php wrong!";
}