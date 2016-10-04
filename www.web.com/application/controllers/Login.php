<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 下午2:37
 */
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/account_service_model');
    }

    /**
     * 登录页面
     */
    public function index()
    {
        $jsArr = array(
            array('url' => '/static/js/common/jquery.form.js'),
            array('url' => '/static/js/common/global.js'),
            array('url' => '/static/js/account/public/common-form.js'),
            array('url' => '/static/js/account/login.js')
        );
        $this->smarty->assign('jsArr', $jsArr);
        $this->smarty->display('account/login.tpl');
    }

    /**
     * 登录接口
     */
    public function loginHandel()
    {
        $username = $this->input->post('phone');
        $pwd = $this->input->post('pwd');
        $res = $this->account_service_model->accountLogin($username, $pwd);
        echo outPutJsonData($res);
    }

    /**
     * 获取验证码
     * VerificationCode
     */
    public function getVC()
    {
        $this->load->library('captcha');
        $code = $this->captcha->getCaptcha();
        $this->session->set_userdata('code', $code);
        $this->captcha->showImg();
        $this->session->set_userdata('vc', $code);
    }

    /**
     * 检验验证码
     */
    public function checkVC()
    {
        $code = strtoupper($this->input->get('vc'));
        $vc = $this->session->userdata('vc');
        if ($code == $vc) {
            echo json_encode(array('code' => 0));
        } else {
            echo json_encode(array('code' => 1, 'msg' => '验证码错误'));
        }
    }
}
