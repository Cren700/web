<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 上午11:16
 */
class Account_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/account_dao_model');
    }

    /**
     * 管理员登录
     * @param $username
     * @param $pwd
     * @return mixed|string
     */
    public function accountLogin($username, $pwd)
    {
        $data = array(
            'username'      => $username,
            'pwd'           => $pwd,
            'table_type'    => 1,       //0: admin, 1: merchant
        );
        $res = $this->myCurl('account', 'adminAccountLogin', $data, true);
        if($res['code'] === 0) {
            $res['url'] = base_url();
            $session_data = array(
                'mid'       => $res['data']['id'],
                'username'  => $res['data']['username']
            );
            $this->session->set_userdata($session_data);
        }
        return $res;
    }

    public function getMerchantInfo()
    {
        $data = array( 'mid' => $this->_mid);
        $res = $this->myCurl('account', 'getMerchantInfo', $data, true);
        return $res;
    }

}