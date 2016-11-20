<?php

/**
 * MY_Model.php
 * Author   : cren
 * Date     : 16/7/10
 * Time     : 上午12:28
 */
class MY_Model extends CI_Model
{
    protected $_mid = '';
    protected $_username = '';
    public function __construct()
    {
        parent::__construct();
        $this->_mid = $this->session->userdata('id');
        $this->_username = $this->session->userdata('username');
    }

    /**
     * myCurl 通过接口请求数据
     * @param $host
     * @param $control
     * @param array $data
     * @param bool $is_post
     * @param bool $is_decode
     * @return mixed|string
     */
    protected function myCurl($host, $control, $data = array(), $is_post = false, $is_decode = true)
    {
        if(is_array($data))
        {
            $data = http_build_query($data);
        }
        $userAgent = 'mobile-web/2.0';

        $this->load->config('curl_api');
        $api = $this->config->item($host);
        $url = $api['host'].$api['api'][$control];
        $url = $is_post ? $url : $url.'?'.$data;

        $header = array(
            'X-App-Device: 10',
            'X-Api-Version: v1.0'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

        if($is_post === true)
        {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $res = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if($httpCode != '200')
        {
            $res = '';
        }
        return $is_decode ? json_decode($res, true) : $res;
    }
}