<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'address'   => "深圳市马蹄山三区三巷",
            'output'    => 'JSON'
        );
        $res = $this->myCurl('addr_encode_url', $data);
        echo $res;
    }
    public function decode()
    {
        $data = array(
            'location'  => '114.066193,22.651092',
            'radius'    => 1000,
            'extensions'=> 'base'
        );
        $res = $this->myCurl('addr_decode_url', $data);
        echo $res;
    }

}
