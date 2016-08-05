<?php

/**
 * Account.php
 * 账号管理
 * Author   : cren
 * Date     : 16/7/19
 * Time     : 下午9:53
 */
class Account extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/account_service_model');
    }

    /**
     * 获取商户基本信息
     */
    public function index()
    {
        $res = $this->account_service_model->getMerchantInfo();
        if ($res['code'] !== 0) {
            echo $res['msg'];exit();
        }
        $this->smarty->assign('info', $res['data']);
        $this->smarty->display('account/index.tpl');
    }
}