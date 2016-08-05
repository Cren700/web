<?php
class Sysmassage_service_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dao/sysmassage_dao_model');

	}

	public function getMerchantMassage()
	{
		//获取商家系统消息表中的内容
		$msglid_arr = $this->sysmassage_dao_model->getMerchantSysmassageMsgidByMid($this->mid);
		//取出msgid列作为新数组
		$msglid_arr1 = array_columns($msglid_arr, 'msgid');
		$merchant_sysmsg_info = $this->sysmassage_dao_model->getMerchantSysMassageInfoByMsgid($msglid_arr1);
		//以msgid为数组索引
		$msglid_arr2 = _array_keyst($msglid_arr, 'msgid');
		foreach ($merchant_sysmsg_info as $key => $value) {
			$merchant_sysmsg_info[$key]['status'] = $msglid_arr2[$value['id']]['status'];
		}
		return $merchant_sysmsg_info;
	}

	public function getDetail($msglid)
	{
		$msglid = decryptId($msglid);
		//更新阅读状态
		$data['status'] = 1;
		//通过msgid和bid获取消息表中的ID
		$info = $this->sysmassage_dao_model->getMerchantMassageIDByMidandBid($this->mid, $msglid);
		$id = $info['id'];
		$this->sysmassage_dao_model->updateMerchantMassageInfoById($id, $data);
		return $this->sysmassage_dao_model->getMerchantMassageListDetailByMsgid($msglid);
	}

	/**
	 * 长轮询中出现休眠情况导致页面需等待后才能执行后面的操作【暂未使用】
	 */
	public function getCount()
	{
		set_time_limit(0);
		$time = 20;
		$i = 0;
		$ret = array(
			'sysmassageCount'		=> 0,
			'customerCount'			=> 0,
			'orderCount'			=> 0,
			"saleCount"				=> 0
		);
		while(true)
		{
			sleep(4);
			$i += 4;
			if($i == $time || $ret['sysmassageCount'] = $this->sysmassage_dao_model->getSysmsgCountByMid($this->mid))
			{
				break;
			}
		}
		return $ret;
	}

	public function getMsgCount()
	{
		$count['sysmassageCount'] = $this->sysmassage_dao_model->getSysmsgCountByMid($this->mid);
		$count['customerCount'] = 0;
		$count['orderCount'] = 0;
		$count['saleCount'] = 0;
		return $count;
	}
}
 ?>