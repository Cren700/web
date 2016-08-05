<?php
class Logger
{
    public static function response($message)
    {
        $ci =& get_instance();

        $uid = isset($_SERVER['HTTP_X_UID']) ? $_SERVER['HTTP_X_UID'] : 0;
        $token = isset($_SERVER['HTTP_X_TOKEN']) ? $_SERVER['HTTP_X_TOKEN'] : '';
        $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/'; // 请求的URL
        $request_method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET'; // 请求的方式

        $data = '';
        if(isset($_REQUEST) && $_REQUEST)
        {
            $tmp = array();
            foreach($_REQUEST as $key => $value)
            {
                $tmp[] = "{$key}={$value}";
            }
            $data = '?' . join('&', $tmp);
        }


        $message = self::handleMessage($message);
        $redurect_status = $_SERVER['REDIRECT_STATUS'];
        $server_protocol = $_SERVER['SERVER_PROTOCOL'];
        $res_length = strlen($message);
        $ip = get_client_ip();
        $time = date('M/d/Y H:i:s +0800');
        $message = "[{$time}] \"{$ip}\" \"{$request_method} {$request_uri}{$data} {$server_protocol}\" {$redurect_status} {$res_length} \"{$uid}\" \"{$token}\"\r\n{$message}\r\n";
        self::write("output-{$uid}", $message);
    }

    public static function write($save, $message)
    {
        $path = './application/logs/' . date('Ymd');

        if(!is_dir($path))
        {
            if (!mkdir($path, 0777, true))
            {
                return false;
            }
        }

        $file = fopen("{$path}/{$save}.log", 'a+');

        fwrite($file, self::handleMessage($message)."\r\n");
        fclose($file);
    }

    private static function handleMessage($msg)
    {
        return is_array($msg) ? json_encode($msg, JSON_UNESCAPED_UNICODE) : $msg;
    }
}