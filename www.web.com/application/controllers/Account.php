<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/account_service_model');
    }

    /**
     * 注册
     */
    public function register()
    {
        $jsArr = array(
            array('url' => '/static/js/common/jquery.form.js'),
            array('url' => '/static/js/common/global.js'),
            array('url' => '/static/js/account/public/common-form.js'),
        );
        $this->smarty->assign('jsArr', $jsArr);
        $this->smarty->display('account/register.tpl');
    }

    /**
     * 处理注册信息
     */
    public function registerHandel()
    {
        $username = $this->input->post('phone');
        $pwd = $this->input->post('pwd');
        $res = $this->account_service_model->addAccount($username, $pwd);
        echo outPutJsonData($res);
    }

    private function _verificationCode($code){
        if ($code === '1234') {
            return true;
        } else {
            return false;
        }
    }





}
