<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('service/account_service_model');
	}


	/**
	 * 管理员登录接口
	 */
	public function index()
	{
		$htmlCssArr = array(
			array('href' => baseCssUrl('account/login.css'))
		);
		$htmlJsArr = array(
			array('src' => baseJsUrl('account/login.js'))
		);
		
		$this->smarty->assign('htmlCssArr', $htmlCssArr);
		$this->smarty->assign('htmlJsArr', $htmlJsArr);
		$this->smarty->display('account/login.tpl');
	}

	/**
	 * 处理登录请求
	 */
	public function handelLogin()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$res = $this->account_service_model->accountLogin($username, $pwd);
		echo json_encode($res);
	}


}
