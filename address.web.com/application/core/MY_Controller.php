<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 上午1:34
 */
class MY_Controller extends CI_Controller
{
    private $_geo_key;
    public function __construct(){
        parent::__construct();
    }

    /**
     * 格式化post和get数据
     */
    private function filterPostAndGet(){
        isset($_POST) and $_POST and $_POST = $this->filterInputData($_POST);
        isset($_GET) and $_GET and $_GET = $this->filterInputData($_GET);
    }

    /**
     * 格式化输入信息 (不对string数据进行addslashes,会影响数据的完整性)
     * @param $data
     * @return string
     */
    private function filterInputData($data){
        if (is_array($data)) {
            foreach ($data as &$v){
                $v =  $this->filterInputData($v);
            }
        }
        elseif(is_string($data)){
            $data = trim($data);
        }
        return $data;
    }

    protected function myCurl($api_url, $data = array())
    {
        $this->load->config('address');
        if(is_array($data))
        {
            $this->_geo_key = $this->config->item('lbs_conf')[0]['key'];
            $data['key'] = $this->_geo_key;
            $data = http_build_query($data);
        }
        $userAgent = 'mobile-web/2.0';

        $url = $this->config->item($api_url) . '?' . $data;;

        $header = array(
//            'X-App-Device: 10',
//            'X-Api-Version: v1.0'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

        $res = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if($httpCode != '200')
        {
            $res = '';
        }
        return $res;
    }

}

class BaseControllor extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }


}