<?php
class MY_Model extends CI_Model
{
    protected $mid = 0;
    protected $uid = 0;
    public function __construct()
    {
        parent::__construct();
        $this->mid = $this->session->userdata('id');
    }

    public function saveMerchantInfoToSession($info)
    {
        $data = array(
            'id'        => intval($info['id']),
            'name'      => $info['username'],
            'logo'      => baseUrl($info['logo'])
        );
        $this->session->set_userdata($data);
        $info = $info['id'] . ',' . $info['username'] . ','. $info['logo'];
        $this->setUserCookie($info);
    }

    public function setUserCookie($info = null)
    {
        if($info == null)
        {
            $info = isset($_COOKIE['_ca']) ? base64_decode($_COOKIE['_ca']) : null;
        }
        if($info !== null)
        {
            $time = time() + 3600 * 4;
            setcookie('_ca', base64_encode($info), $time, '/');

            if($this->session->userdata('id') == false)
            {
                $info = explode(',', $info);

                $tmp = array(
                    'id'        => $info[0],
                    'name'      => $info[1],
                    'logo'      => $info[2],
                );
                $this->saveMerchantInfoToSession($tmp);
            }
        }
    }

    protected function myCurl($host, $control, $data = array(), $is_post = false)
    {
        if(is_array($data))
        {
            $data = http_build_query($data);
        }
        $userAgent = 'haha/1.0';

        $this->load->config('curl_api');
        $api = $this->config->item($host);
        $url = $api['host'].$api['api'][$control];
        $url = $is_post ? $url : $url.'?'.$data;

        $header = array(
            'X-App-Device: 8',
            'X-FORWARDED-FOR: '. get_client_ip(),
            'REMOTE-ADDR: '. get_client_ip(),
            'CLIENT-IP: '. get_client_ip()
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

        /*if(stripos($url, "lists"))
        {
            print_r($res);exit();
        }*/


        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if($httpCode != '200')
        {
            $res = '';
        }
        return json_decode($res, true);
        // return $res;
    }
}
