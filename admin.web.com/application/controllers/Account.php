<?php
/**
 * Account.php
 * Author   : cren
 * Date     : 16/7/31
 * Time     : 下午11:13
 */

class Account extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/merchant_service_model');
    }

    /**
     * 添加用户
     */
    public function addAccount()
    {
        $username = $this->input->get('username');
        $pwd = $this->input->get('pwd');
        echo $this->merchant_service_model->addAccount($username, $pwd);
    }
}