<?php
function is_url($subject)
{
	if(substr($subject, 0, 7) == 'http://' || substr($subject, 0, 8) == 'https://')
	{
		return true;
	}
	return false;
}

function convertToString(&$char)
{
	if(!is_object($char))
	{
		$char = strval($char);
	}
}

function baseUrl($url, $height = 0, $width = 0)
{
	if(empty($url))
	{
		return '';
	}

	$ci =& get_instance();
	$ci->config->load('qiniu');
	$host = $ci->config->item('url');

	$ext = '';
	if($height)
	{
		$ext .= '?imageView2/0/h/' . $height;
	}
	if($width)
	{
		$ext = $ext ? $ext . '/w/'.$width : '?imageView2/0/w/'.$width;
	}

	return is_url($url) ? $url : $host . '/' . $url . $ext;
}

function p($data, $stat = true)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	if ($stat)
	{
		die;
	}
}

function _microtime($type = 1)
{
	$time = explode(' ', microtime());
	return $type == 1 ? $time[1] . sprintf('%03d', $time[0] * 1000) : $time[1] . sprintf('%06d', $time[0] * 1000000);
}



function get_client_ip($type = 0)
{
	$type = $type ? 1 : 0;
	static $ip = NULL;
	if ($ip !== NULL)
	{
		return $ip[$type];
	}

	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$pos = array_search('unknown', $arr);
		if (false !== $pos)
			unset($arr[$pos]);
		$ip = trim($arr[0]);
	}
	else if (isset($_SERVER['REMOTE_ADDR']))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	else if (isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}

	// IP地址合法验证
	$long = sprintf("%u", ip2long($ip));
	$ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
	return $ip[$type];
}

function getUploadKey()
{
	return dechex(_microtime(2)).dechex(mt_rand(1000000000, 9999999999));
}



function getImageFullPath($image)
{
	$tmp = array();
	$image = is_array($image) ? $image : json_decode($image, true);
	foreach($image as $img)
	{
		$tmp[] = baseUrl($img);
	}
	return $tmp;
}



function _node_merge($node, $pid = 0,$child = 'pid', $_sub = 'id')
{
	$arr = array();//print_r($node);exit();
	foreach($node as $v)
	{
		if($v[$child] == $pid)
		{
			$v['child'] = _node_merge($node, $v[$_sub], $child, $_sub);
			// if(empty($v['child']))
			// {
			//     unset($v['child']);
			// }
			$arr[] = $v;
		}
	}
	return $arr;
}

/**
 * 二维数组分组
 * @param  array  $arr 二维数组
 * @param  string $key 分组key
 * @return array       分组后的数组
 */
function _array_group($arr, $key)
{
	$tmp = array();
	foreach($arr as $inp)
	{
		$tmp[$inp[$key]][] = $inp;
	}
	return $tmp;
}

function _getItem($data,$k,$v)
{
	$tmp = false;
	foreach ($data as $key => $value) {
		if($value[$k] == $v)
		{
			$tmp = $value;
			break;
		}
	}
	return $tmp;
}

if(!function_exists('array_columns'))
{
	function array_columns($input, $columnKey, $indexKey = null)
	{
		$columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
		$indexKeyIsNull = (is_null($indexKey)) ? true : false;
		$indexKeyIsNumber = (is_numeric($indexKey)) ? true : false;
		$result = array();
		foreach ($input as $key => $row)
		{
			if ($columnKeyIsNumber)
			{
				$tmp = array_slice($row, $columnKey, 1);
				$tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : null;
			}
			else
			{
				$tmp = isset($row[$columnKey]) ? $row[$columnKey] : null;
			}
			if (!$indexKeyIsNull)
			{
				if ($indexKeyIsNumber)
				{
					$key = array_slice($row, $indexKey, 1);
					$key = (is_array($key) && !empty($key)) ? current($key) : null;
					$key = is_null($key) ? 0 : $key;
				}
				else
				{
					$key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
				}
			}
			$result[$key] = $tmp;
		}
		return $result;
	}
}

function _array_columns($input, $columnKey, $indexKey = null, $function = '')
{
	$columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
	$indexKeyIsNull = (is_null($indexKey)) ? true : false;
	$indexKeyIsNumber = (is_numeric($indexKey)) ? true : false;
	$result = array();
	foreach ($input as $key => $row)
	{
		if ($columnKeyIsNumber){
			$tmp = array_slice($row, $columnKey, 1);
			$tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : null;
		}else{
			$tmp = isset($row[$columnKey]) ? $row[$columnKey] : null;
		}
		if (!$indexKeyIsNull)
		{
			if ($indexKeyIsNumber)
			{
				$key = array_slice($row, $indexKey, 1);
				$key = (is_array($key) && !empty($key)) ? current($key) : null;
				$key = is_null($key) ? 0 : $key;
			}else{
				$key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
			}
		}
		$result[$key] = $function != '' ? $function($tmp) : $tmp;
	}
	return $result;
}

/**
 * [将二维数组的某个键值作为key的数组]
 * @param  array  $arr [description]
 * @param  string $key [description]
 * @return [type]      [description]
 */
function _array_keyst($arr, $key)
{
	$tmp = array();
	foreach($arr as $data)
	{
		$tmp[$data[$key]] = $data;
	}
	return $tmp;
}




function generalToken($uid = 'cxx')
{
	return md5(dechex(mt_rand(0, 255)) . dechex(time()) . dechex(mt_rand(0, pow(2, 32))) . dechex($uid));
}

function salt()
{
	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$randnum = '';
	$length = mt_rand(3, 8);
	for ($i = 0; $i < $length; $i++) {
		$randnum .= $str[mt_rand(0, strlen($str) - 1)];
	}
	return $randnum;
}

/**
 * [生成密码]
 * @param  string $pwd [密码]
 * @param  string $salt [salt字段，不输入则自动获取，用来验证旧密码请输入salt]
 */
function getPassWord($pwd, $salt)
{
	return  md5(md5($pwd) . '*' . $salt);
}



/**
 * [产生n位随机数]
 * @param  integer $num [随机数位数]
 * @return [type]       [description]
 */
function generalRandCode($num = 4)
{
	$code = '';
	for ($i = 0; $i < $num; $i++) {
		$code .= mt_rand(0, 9);
	}
	return $code;
}

/**
 * [校验电话号码]
 * @param  string $phone [电话号码]
 * @return [type]        [description]
 */
function is_mobile($phone)
{
	$pattern = '/^(13[0-9]|145|15[012356789]|18[0-9]|17[0678])[0-9]{8}$/i';
	return preg_match($pattern, $phone);
}

function is_email($email)
{
	return preg_match("/^[a-z0-9]([a-z0-9]*[\\-_\\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+\.)+[a-z]{2,3}([\.][a-z]{2})?$/i", $email);
}

/**
 * [array_mult_sort description]
 * @param  array  $arr  [description]
 * @param  array  $sort [description]
 * @return [type]       [description]
 */
function _array_multisort($arr, $key1, $sort1, $key2, $sort2)
{
	$data1 = $data2 = array();

	foreach($arr as $key => $v)
	{
		$data1[$key] = $v[$key1];
		$data2[$key] = $v[$key2];
	}

	array_multisort($data1, $sort1, $data2, $sort2, $arr);

	return $arr;
}

function _array_sorts($arr, $keys, $type = 'asc')
{
	$keysvalue = $new_array = array();
	foreach ($arr as $k => $v) {
		@$keysvalue[$k] = $v[$keys];
	}
	if ($type == 'asc') {
		asort($keysvalue);
	} else {
		arsort($keysvalue);
	}
	reset($keysvalue);
	foreach ($keysvalue as $k => $v) {
		$new_array[$k] = $arr[$k];
	}
	return array_values($new_array);
}

function encryptId($id)
{
	require_once ROOT_PATH . '/system/third_party/MyEncrypt.class.php';
	$en = new MyEncrypt();
	return $en->encryptId($id);
}

function decryptId($id)
{
	require_once ROOT_PATH . '/system/third_party/MyEncrypt.class.php';
	$en = new MyEncrypt();
	return $en->decryptId($id);
}


function encrypt($id)
{
	require_once ROOT_PATH . '/system/third_party/MyEncrypt.class.php';
	$en = new MyEncrypt('CAWU-XNMYAN-5FANG-HEN7');
	return $en->encrypt($id);
}

function decrypt($id)
{
	require_once ROOT_PATH . '/system/third_party/MyEncrypt.class.php';
	$en = new MyEncrypt('CAWU-XNMYAN-5FANG-HEN7');
	return $en->decrypt($id);
}



function node_merge($node, $access = null, $pid = 0)
{
	$arr = array();
	foreach($node as $v)
	{
		if(is_array($access))
		{
			$v['access'] = in_array($v['id'], $access) ? 1: 0;
		}
		if($v['pid'] == $pid)
		{
			$v['child'] = node_merge($node, $access, $v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}


function fgetData($get,$url)
{
	$_exurl = '';
	foreach ($get as $key => $value) {
		if(!empty($value))
		{
			$_exurl = $_exurl.'&'.$key.'='.$value;
		}
	}

	if(!strpos($url, '?'))
	{
		$_exurl = '?'.ltrim($_exurl,'&');
	}
	return $url.$_exurl;
}

function saveUserSession($data)
{
	return array(
		'id' => $data['uid'],
		'email' => $data['email'],
		'lastname' => $data['lastname'],
		'firstname' => $data['firstname'],
		'nickname' => $data['nickname'],
		'registerDate' => $data['registerDate'],
		'froms' => $data['froms'],
		'headjpg' => $data['headjpg'],
		'birthday' => $data['birthday'],
		'sex' => $data['sex'],
		'token' => $data['token']
	);
}

function filterPostAndGet()
{
	isset($_POST) && $_POST && $_POST = filterInputData($_POST);
	isset($_GET) && $_GET && $_GET = filterInputData($_GET);
}

function filterInputData($data)
{
	if(is_array($data))
	{
		$tmp = array();
		foreach($data as $i => $v)
		{
			$tmp[$i] = filterInputData($v);
		}
	}
	else if(is_numeric($data))
	{
		$tmp = $data;
	}
	else
	{
		$tmp = addslashes(trim($data));
	}
	return isset($tmp) ? $tmp : null;
}


/**
 * 处理反斜杠操作和HTML格式化
 * @param $data string
 * @return string
 */
function filterOutputData($data)
{
	return htmlspecialchars(stripslashes($data));
}

function buildShareProductUrl($prod, $id_key = 'id', $name_key = 'name', $cateName = 'category', $skuid = 0)
{
	$id = isset($prod[$id_key]) ? $prod[$id_key] : '0';

	$cate = isset($prod[$cateName]) ? strtolower($prod[$cateName]) : 'g2';
	$name = isset($prod[$name_key]) ? strtolower($prod[$name_key]) : 'g2';

	$cate = str_replace(' ', '-', $cate);
	$name = str_replace(' ', '-', $name);

	return "/{$cate}/p-_{$id}.html" . ($skuid ? "?id={$skuid}" : '');
}



function buildComProductUrl($pid ,$catename ,$name, $skuid = 0 )
{
	$tmp = '';
	$catename && $catename = strtolower(str_replace(' ', '-', $catename));
	$name = str_replace(array(' ', '  ', '   '), '-',  strtolower($name) );
	$tmp = $skuid ? "/{$catename}/p-{$name}_{$pid}.html?id={$skuid}" :  "/{$catename}/p-{$name}_{$pid}.html";
	return $tmp;
}

function buildComCategoryUrl($categoryId,$categoryName)
{
	$tmp = '';
	$categoryName && $categoryName = strtolower(str_replace(' ', '-', $categoryName));
	return "/i-{$categoryName}_{$categoryId}.html";
}

function ViewStar($num)
{
	if($num< 0 )
	{
		$num = 0;
	}else if($num> 5)
	{
		$num = 5;
	}

	$num = round($num);
	$tmp = '';
	for ($i=1; $i <=5 ; $i++) {
		if($i <= $num)
		{
			$tmp= $tmp."<label class=\"current\"></label>";
		}else{
			$tmp= $tmp."<label ></label>";
		}
	}
	return $tmp;
}

function cutReview($str,$set)
{
	$len = strlen($str);
	if($len <= $set)
	{
		return $str;
	}else
	{
		return substr($str,0,$set)." &nbsp;&nbsp;&nbsp;<a href=\"javascript:;\" class=\"view-hide\">View more&gt;</a>";
	}
}

/**
 * 获取不同大小的img
 *
 */
function img_size($id){

	$size = array(
		'0' => array('800', '600'),
		'1' => array('800', '800'),
		'2' => array('300', '300'),
		'3' => array('200', '200'),
		'4' => array('100', '100'),
	);
	if($id >= 0 && $id <= 4)
	{
		return '?imageView2/0/h/'.$size[$id][0].'/w/'.$size[$id][1];
	}
	else
	{
		return '';
	}
}


function getOrderStatus($status)
{
	// 订单状态：1 No-Pay 未付款、2 Pending 待审核、3 Paid 已付款、4 Shipped 已发货、5 Frozen 交易冻结、6 Closed 交易关闭、7 Completed 完成
	$type = '未知状态';
	switch($status)
	{
		case 1:
			$type = 'Unpaid';
			break;
		case 2:
			$type = 'Pending';
			break;
		case 3:
			$type = 'Unshipped';
			break;
		case 4:
			$type = 'Shipped';
			break;
		case 5:
			$type = 'Trading freezing';
			break;
		case 6:
			$type = 'Trading closed';
			break;
		case 7:
			$type = 'Trading succeed';
			break;
		default:
			# code...
			break;
	}
	return $type;
}

/**
 * 产品详情URL
 * @param array $prod 产品信息
 **/
function buildNiceProductUrl($prod, $id_key = 'id', $name_key = 'name', $skuid = 0, $cateName = 'category')
{
	$id = isset($prod[$id_key]) ? $prod[$id_key] : '0';

	$cate = isset($prod[$cateName]) ? strtolower($prod[$cateName]) : 'g2';
	$name = isset($prod[$name_key]) ? strtolower($prod[$name_key]) : 'g2';

	$cate = str_replace(' ', '-', $cate);
	$name = str_replace(' ', '-', $name);

	return "/{$cate}/p-{$name}_{$id}.html" . ($skuid ? "?id={$skuid}" : '');
}

/**
 * 分类URL
 * @param array $cate 分类信息
 * @param int   $type 1:产品分类，2:Recommend分类
 */
function buildNiceCatalogUrl($cate, $type = 1, $id_key = 'id', $name_key = 'name', $ext_name = null)
{
	$id = isset($cate[$id_key]) ? $cate[$id_key] : '0';
	// p($type);
	$ext_name && $ext_name = strtolower(str_replace(' ', '-', $ext_name));
	$name = isset($cate[$name_key]) ? strtolower($cate[$name_key]) : 'g2';
	$name = str_replace(' ', '-', $name);
	$type = $type == 1 ? 'i' : 'r';
	return $ext_name ? "/{$type}-{$ext_name}/{$name}_{$id}.html" : "/{$type}-{$name}_{$id}.html";
}

/**
 * 产品列表，加SKU
 * @param  [type] $sku          [description]
 * @param  [type] $categoryname [description]
 * @return [type]               [description]
 */
function buildNiceBackShcool($sku, $categoryname)
{

	$categoryname = str_replace(array(' ', '  ', '   '), '-',  strtolower(trim($categoryname)));
	$name = str_replace(array(' ', '  ', '   '), '-',strtolower( $sku['productname']));
	return  "/{$categoryname}/p-{$name}_{$sku['product_id']}_{$sku['id']}.html";
}

/**
 *web 回调 APP 产品详情
 */
function buildAppUrlProductDetail($pid)
{
	$url = "openApp.wfMobileMall://virtual?actionCategory=2&content=$pid";
	return $url;
}

/**
 *web 回调 APP 网页
 */
function buildAppUrlSiteDetail($type, $content)
{
	$url = "openApp.wfMobileMall://virtual?actionCategory={$type}&content={$content}";
	return $url;
}

//截取字符串长度
function _substring($str, $len = 50, $subfix = '...')
{
	if(mb_strlen($str, 'utf-8') > $len)
	{
		$len -= mb_strlen($subfix, 'utf-8');
		$str = mb_substr($str, 0, $len,'utf-8');
		$str .= $subfix;
	}
	return $str;
}

/**
 * 获取订单来源
 * 来源 1：Android；2：iPhone；3：iPad；7：mobile web；10：Pc Web
 * @return [type] [description]
 */
function getAllOrderForm()
{
	$from[] = array('id' => 1, 'name' => 'Android');
	$from[] = array('id' => 2, 'name' => 'iPhone');
	$from[] = array('id' => 3, 'name' => 'iPad');
	$from[] = array('id' => 7, 'name' => 'm');
	$from[] = array('id' => 10, 'name' => 'www');
	$from[] = array('id' => 99, 'name' => 'offline');

	return $from;
}

/**
 * 获取订单类型
 * @return string
 */
function getOrderPayType($type)
{
	$msg = '-';
	switch($type)
	{
		case 1:
			$msg = 'PayPal';
			break;
		case 2:
			$msg = '信用卡';
			break;
		case 3:
			$msg = '其他';
			break;
		default:
			# code...
			break;
	}
	return $msg;
}


/**
 * 获取订单来源
 * 来源 1：Android；2：iPhone；3：iPad；7：mobile web；10：Pc Web
 * @return [type] [description]
 */
function getOrderFrom($from)
{
	$msg = '-';
	switch($from)
	{
		case 1:
			$msg = 'Android';
			break;
		case 2:
			$msg = 'iPhone';
			break;
		case 3:
			$msg = 'iPad';
			break;
		case 7:
			$msg = 'm';
			break;
		case 10:
			$msg = 'www';
			break;
		case 99:
			$msg = 'offline';
			break;
		default:
			# code...
			break;
	}
	return $msg;
}

function getOrderTraceFrom($from)
{
	$msg = '-';
	switch($from)
	{
		case 1:
			$msg = 'Android';
			break;
		case 2:
			$msg = 'iPhone';
			break;
		case 3:
			$msg = 'iPad';
			break;
		case 7:
			$msg = 'm';
			break;
		case 8:
			$msg = 'payment';
			break;
		case 10:
			$msg = 'www';
			break;
		case 99:
			$msg = 'offline';
			break;
		default:
			# code...
			break;
	}
	return $msg;
}

function getAllUserFroms()
{
	$from[] = array(
		'id'        => 0,
		'name'      => '全部'
	);
	$from[] = array(
		'id'        => 1,
		'name'      => '开机注册'
	);
	$from[] = array(
		'id'        => 2,
		'name'      => '开机平板'
	);
	$from[] = array(
		'id'        => 3,
		'name'      => 'iPhone'
	);
	$from[] = array(
		'id'        => 4,
		'name'      => 'iPad'
	);
	$from[] = array(
		'id'        => 5,
		'name'      => 'Android'
	);
	$from[] = array(
		'id'        => 6,
		'name'      => 'www'
	);
	$from[] = array(
		'id'        => 7,
		'name'      => 'mobile'
	);
	return $from;
}

function getUserFroms($from)
{
	$txt = '-';
	switch($from)
	{
		case 1:
			$txt = '开机注册';
			break;
		case 2:
			$txt = '开机平板';
			break;
		case 3:
			$txt = 'iPhone';
			break;
		case 4:
			$txt = 'iPad';
			break;
		case 5:
			$txt = 'Android';
			break;
		case 6:
			$txt = 'www';
			break;
		case 7:
			$txt = 'mobile';
			break;
		default:
			# code...
			break;
	}
	return $txt;
}

/**
 * 写操作日志
 * @param $msg_type
 * @param $message
 */
function OPT_LOG($msg_type , $message){
	$ci =& get_instance();
	$ci->load->config('mq');

	$host 	= $ci->config->item("mq_host");
	$port 	= $ci->config->item("mq_port");
	$login 	= $ci->config->item("mq_login");
	$password = $ci->config->item("mq_password");
	$vhost 	  = $ci->config->item("mq_vhost");
	$config = array(
		'host'     => $host,
		'port'     => $port,
		'login'    => $login,
		'password' => $password,
		'vhost'    => $vhost
	);
	$connection = new AMQPConnection($config);

	if(is_array($message)){
		$message = json_encode($message);
	}
	try
	{
		$connection->connect();
	}
	catch (Exception $e)
	{
		require_once 'application/third_party/Logger.class.php';
		Logger::writes("common_error" , $e->getCode().":".$e->getMessage()."|file:".$e->getFile().
			"|line:".$e->getLine()."|ext:".$msg_type."|".$message);
		return;
	}
	$channel = new AMQPChannel($connection);
	// 创建交换机对象
	$exchange = new AMQPExchange($channel);
	$exchange_name = $ci->config->item("op_log_exchange_name");
	$routing_key   = $ci->config->item("op_log_routing_key");
	$exchange->setName($exchange_name);
	$exchange->setType(AMQP_EX_TYPE_DIRECT);
	$exchange->setFlags(AMQP_DURABLE);
	$attributes = array('delivery_mode' => 2);

	$m_time = "Time: ".date("Y/m/d H:i:s" , time())."\t\t";
	$push_data = array(
		'msg_type' => $msg_type,
		'message'  => $m_time.$message
	);

	$exchange->publish(json_encode($push_data), $routing_key, AMQP_NOPARAM, $attributes);
}
// 获取请求头
if (! function_exists ( 'getallheaders' )) {
	function getallheaders() {
		foreach ( $_SERVER as $name => $value ) {
			if (substr ( $name, 0, 5 ) == 'HTTP_') {
				$headers [str_replace ( ' ', '-', ucwords ( strtolower ( str_replace ( '_', ' ', substr ( $name, 5 ) ) ) ) )] = $value;
			}
		}
		return $headers;
	}
}



/**
 * 操作缓存
 * @param string $op		get/set/del
 * @param string $type		u/ulogin/uinvite
 * @param string $key
 * @param string $val
 */
function op_cache($op, $type, $key, $val = "")
{
	$CI =& get_instance();
	$cache_conf = $CI->config->item('cache_conf');

	$cache = new Opcache();
	if($op == 'get'){
		$result = $cache->get($type, $key);
	} else if($op == 'set'){
		$result = $cache->set($type, $key, $val);
	} else if($op == 'del'){
		$result = $cache->del($type, $key);
	} else {
		trigger_error(__FUNCTION__ . ': unknown op_cache optype', E_USER_ERROR);
	}

	return $result;
}

function test_log($message){
	if(is_array($message)){
		$message = json_encode($message);
	}
	file_put_contents("/tmp/test.log" , "\r\n" .$message. "\r\n" , FILE_APPEND);
}

function get_login_type($oauth_type)
{
	$type = 1;
	switch($oauth_type)
	{
		case 'Facebook':
			$type = 2;
			break;
		case 'Twitter':
			$type = 3;
			break;
		case 'Google':
			$type = 4;
			break;
		case 'Paypal':
			$type = 5;
			break;
		default:
			# code...
			break;
	}
	return $type;
}
