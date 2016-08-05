<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends BaseController {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('service/account_service_model');
	}

	/**
	 * 添加管理员接口
	 */
	public function addAccount()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('pwd');
		$table_type = $this->input->post('table_type'); // 0: admin, 1: merchant
		$role_type = $this->input->post('role_type'); // 0:普通管理员 1:超级管理员
		$res = $this->account_service_model->addAccount($username, $pwd, $table_type, $role_type) ;
		echo outPutJsonData($res);
	}
	
	public function getMerchantInfo()
	{
		$mid = $this->input->post('mid');
		$res = $this->account_service_model->getMerchantInfo($mid);
		echo outPutJsonData($res);
	}
	


}
