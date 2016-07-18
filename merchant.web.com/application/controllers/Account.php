<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('service/account_service_model');
	}


	/**
	 * 管理员登录接口
	 */
	public function Login()
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

	/**
	 * 添加管理员接口
	 */
	public function addAccount()
	{
		$username = trim($this->input->get('username'));
		$pwd = trim($this->input->get('pwd'));
		$table_type = intval($this->input->get('table_type')); // 0: admin, 1: account
		$role_type = intval($this->input->get('role_type')); // 0:普通管理员 1:超级管理员
		$res = $this->account_service_model->addAccount($username, $pwd, $table_type, $role_type) ;
		echo outPutJsonData($res);
	}


}
