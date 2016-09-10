<?php
class Sysmassage extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('service/sysmassage_service_model');
	}

	public function index()
	{
		//获取邮件信息
		$merchant_sysmsg_info = $this->sysmassage_service_model->getMerchantMassage();
		// p($merchant_sysmsg_info);
		$this->smarty->assign('merchant_sysmsg_info', $merchant_sysmsg_info);
		$this->smarty->display('sysmassage/detail.tpl');
	}

	public function detail($msgid)
	{
		$msgid = intval($msgid);
		$sysmassage_detail = $this->sysmassage_service_model->getDetail($msgid);
		$msgCount = $this->sysmassage_service_model->getMsgCount();

        $this->smarty->assign('count', $msgCount);
		$this->smarty->assign("sysmassage_detail", $sysmassage_detail);
		$this->smarty->display("sysmassage/detail.tpl");
	}

	public function getMsgCount()
	{
		$data = $this->sysmassage_service_model->getMsgCount();
		echo json_encode($data);
	}
}
 ?>