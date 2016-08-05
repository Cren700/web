<?php
/**
 * common.php
 * Author   : cren
 * Date     : 16/7/30
 * Time     : 下午8:53
 */

$base_filename = basename(__FILE__);

$config_filename = ROOT_PATH . '/system/config/' . ENVIRONMENT . "/{$base_filename}" ;

if(is_file($config_filename)) {
    include $config_filename;
} else {
    echo "Include common.php wrong!"; die;
}
