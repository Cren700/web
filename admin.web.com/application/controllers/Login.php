<?php
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/login_service_model');
    }

    public function index()
    {
        $this->smarty->assign('url', rawurlencode(trim($this->input->get('url'))));
        $this->smarty->display('login/index.tpl');
    }

    public function doLogin()
    {
        $url = trim($this->input->get('url', true));
        $username = trim($this->input->post('username', true));
        $password = trim($this->input->post('password', true));
        $data = $this->login_service_model->doLogin($url, $username, $password);
        $this->outputResponse($data);
    }
}