<?php
class Merchant extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service/merchant_service_model');
	}

	public function index()
	{
		$data = $this->merchant_service_model->index();
		$this->smarty->assign("data", $data);
		$this->smarty->display("merchant/index.tpl");
	}

	public function update()
	{
		$data['email'] = $this->input->post('email',TRUE);
		$res = $this->merchant_service_model->update($data);
		$this->outputResponse($res);
	}

	public function doUpdatepwd()
	{
		//修改密码
		$data['password'] = $this->input->post('password', TRUE);
		$data['newpwd'] = $this->input->post('newpwd', TRUE);
		$data['renewpwd'] = $this->input->post('renewpwd', TRUE);
		$res = $this->merchant_service_model->updatepwd($data);
		$this->outputResponse($res);
	}
}
 ?>