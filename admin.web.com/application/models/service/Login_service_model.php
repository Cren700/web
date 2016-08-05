<?php
class Login_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/merchant_dao_model');
    }

    public function doLogin($url, $username, $password)
    {
        // 请输入登陆名、密码
        $ret = array('code' => 1, 'msg' => '请输入登陆名、密码');
        if($username and $password)
        {
            // 登陆名不合法
            $ret = array('code' => 1, 'msg' => '登陆名不合法');
            if(preg_match('/^[a-z0-9_]+$/i', $username))
            {
                // 用户不存在
                $ret = array('code' => 1, 'msg' => '用户不存在');
                if($info = $this->merchant_dao_model->getMerchantInfoByUserName($username))
                {
                    // 密码错误
                    $ret = array('code' => 1, 'msg' => '密码错误');
                    if(getPassWord($password, $info['salt']) == $info['password'])
                    {
                        // 验证通过
                        $ret = array('code' => 0, 'data' => $url ? : '/stat');
                        $data = array('last_time' => time(), 'log_cnt' => $info['log_cnt'] + 1);
                        $this->merchant_dao_model->updateMerchantInfoById($info['id'], $data);
                        $this->saveMerchantInfoToSession($info);
                    }
                }
            }
        }
        return $ret;
    }
}