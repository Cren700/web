<?php
/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 上午1:49
 */

/**
 * 生成验证码接口
 */
function bornValidateCode()
{

}

/**
 * 初始化盐值
 * @return string
 */
function saltCode()
{
    $salt = '';
    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $len = mt_rand(4, 8);
    for ($i = 0; $i < $len; $i++) {
        $salt .= $str[mt_rand(0, strlen($str) - 1)];
    }
    return $salt;
}

/**
 * 登录密码加密
 * @param string $salt 盐值
 * @param string $pwd 密码
 * @return string
 */
function encodePwd($salt, $pwd)
{
    $str = '1234';
    return md5(md5($pwd . $str . $salt));
}

/**
 * 操作数据库时转义数据
 * @param $data
 * @return array|string
 */
function dbEscape($data)
{
    $tmp = '';
    if (is_array($data)) {
        $tmp = array();
        foreach ($data as $k => $v) {
            $tmp[$k] = dbEscape($v);
        }
    }
    if (is_string($data)) {
        $tmp = addslashes($data);
    } else {
        $tmp = $data;
    }
    return $tmp;
}

/**
 * 通过错误信息字段,获取错误码和错误信息
 * @param array $data          // $data['code']] 错误信息码 如:validation_error_0 , $data['field'] 添加在错误信息字段 如:用户名
 * @return array
 */
function errorCode($data)
{
    $ci = &get_instance();
    $ci->config->load('error_code', TRUE);
    $error_code = $ci->config->item('error_code');
    isset($error_code[$data['code']]) && isset($data['field']) ? $error_code[$data['code']]['msg'] = $data['field'] . $error_code[$data['code']]['msg'] : '';
    return isset($error_code[$data['code']]) ? $error_code[$data['code']] : array('code' => 999999, 'msg' => '未知错误');
}

/**
 * 输出的json信息
 * @param $data
 * @return string
 */
function outPutJsonData($data)
{
    if ($data['code'] !== 0) {
        $data = errorCode($data);
    }
    isset($data['data']) ? filterOutData($data['data']) : '';
    return json_encode($data);
}

/**
 * 去除\',入库前处理的数据
 * @param $data
 * @return $data
 */
function filterOutData(&$data)
{
    if(is_array($data)){
        foreach ($data as &$d){
            filterOutData($d);
        }
    }
    if(is_string($data)){
        $data = stripslashes($data);
    }
    return $data;
}

/**
 * 验证数据
 * @param $data
 * @param $rules
 * @param $field // 添加在错误信息字段 如:用户名
 * @return array
 */
function validationData($data, $rules, $field)
{
    $rulesData = explode('|', $rules);
    foreach ($rulesData as $rule) {
        $res = array();
        $filter = preg_replace('/\[[0-9]*\]/', '', $rule);
        switch ($filter) {
            case 'required':
                if(strlen($data) === 0) {
                    $res['code'] = 'validation_error_5'; // 不能为空
                    $res['field'] = $field;
                }
                break;
            case 'numeric':
                if (!is_numeric($data)) {
                    $res['code'] = 'validation_error_4'; // 必须位数字
                    $res['field'] = $field;
                }
                break;
            case 'min_length':
                preg_match('/[0-9]+/', $rule, $match);
                if (strlen($data) < $match[0]) {
                    $res['field'] = $field;
                    $res['code'] = 'validation_error_1'; // 字符数不足
                }
                break;
            case 'max_length':
                preg_match('/[0-9]+/', $rule, $match);
                if (strlen($data) > $match[0]) {
                    $res['code'] = 'validation_error_2'; // 字符数过多
                    $res['field'] = $field;
                }
                break;
            case 'email':
                if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $data, $match)) {
                    $res['field'] = '';
                    $res['code'] = 'validation_error_3'; // 邮箱不正确
                }
                break;
            default:
                echo "No find validation ";die;
                break;
        }
        if (!empty($res)) return $res;
    }
    return $res;
}

function baseCssUrl($uri){
    return '/assets/css/' . $uri;
}

function baseJsUrl($uri){
    return '/assets/js/' . $uri;
}