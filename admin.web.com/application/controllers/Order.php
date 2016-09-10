<?php
class Order extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("service/order_service_model");
	}

	public function index()
	{
		$type = $this->input->get('type', TRUE);
		$get['stype'] = trim($this->input->get("stype",TRUE));
		$get['search'] = trim($this->input->get("search",TRUE));
		$get['page'] = intval($this->input->get('p'));
		$get['page'] = $get['page'] > 0 ? $get['page'] : 1;
		// p($get);
		// 订单状态：1 No-Pay 未付款、2 Pending 待审核、3 Paid 已付款、4 Shipped 已发货、5 Frozen 交易冻结、6 Closed 交易关闭、7 Completed 完成
		switch ($type)
		{
			case 'index':
				$status = '';
				$display = "order/detail.tpl";
				break;
			case 'unpaid':
				$status = 1;
				$display = "order/notpaid.tpl";
				break;
			case 'waitDelivery':
				$status = 3;
				$display = "order/waitdelivery.tpl";
				break;
			case 'delivered':
				$status = 4;
				$display = "order/delivered.tpl";
				break;
			case 'successOrder':
				$status = 7;
				$display = "order/successorder.tpl";
				break;
			case 'closeOrder':
				$status = 6;
				$display = "order/closeorder.tpl";
				break;
			default:
				$status = '';
				$type = "";
				$display = "order/detail.tpl";
				break;
		}
		$get['status'] = $status;

		if($this->input->get("submit", TRUE))
		{
			$res = $this->order_service_model->getOrderBySelect($get);
		}
		else
		{
			$res = $this->order_service_model->getOrder($status, $get['page']);
		}
		// p($res);
		if (!empty($res['data']['list'])) 
		{
			foreach($res['data']['list'] as $i => $v)
			{
				$res['data']['list'][$i]['skus'] = join(',', array_columns($v['productList'], 'uniq'));
			}
		}

// p($res);
		//配送服务提供商
		$logistics = $this->order_service_model->getLogisticslist();
		//退款原因
		$reasonList = $this->order_service_model->getReasonList();
		// p($logistics);
//print_r($res['data']['list']);exit();
		$this->smarty->assign('stype', $get['stype']);
		$this->smarty->assign('search', $get['search']);
		$this->smarty->assign('type', $type);
		$this->smarty->assign('logistics', $logistics['data']['list']);
		$this->smarty->assign('reasonList', $reasonList);
		$this->smarty->assign('data', $res['data']['list']);
		$this->smarty->assign('page', $get['page']);
		$this->smarty->assign('totalPage', ceil($res['data']['total'] / 20));
		$this->smarty->display($display);
	}

	public function test()
	{
	}

	//未处理订单就是未发货订单
	public function unDeal()
	{
		$status = 3;//等待发货	status : 3
		$get['stype'] = trim($this->input->get("stype",TRUE));
		$get['search'] =trim($this->input->get("search",TRUE));
		$get['status'] = $status;
		$get['page'] = intval($this->input->get('p'));
		$get['page'] = $get['page'] > 0 ? $get['page'] : 1;

		if($this->input->get("submit", TRUE))
		{
			$res = $this->order_service_model->getOrderBySelect($get);
		}
		else
		{
			$res = $this->order_service_model->getOrder($status, $get['page']);
		}

		if (!empty($res['data']['list'])) 
		{
			foreach($res['data']['list'] as $i => $v)
			{
				$res['data']['list'][$i]['skus'] = join(',', array_columns($v['productList'], 'uniq'));
			}
		}

		//退款原因
		$reasonList = $this->order_service_model->getReasonList();
		$this->smarty->assign('stype', $get['stype']);
		$this->smarty->assign('search', $get['search']);
		$this->smarty->assign('reasonList', $reasonList);
		$this->smarty->assign("type", "undeal");
		$this->smarty->assign('data', $res['data']['list']);//print_r($res['data']['list']);exit();
		$this->smarty->assign('page', $get['page']);
		$this->smarty->assign('totalPage', ceil($res['data']['total'] / 20));
		$this->smarty->display("order/undeal.tpl");
	}

	public function details()
	{
		$orderid = trim($this->input->get("orderid"));
		$res = $this->order_service_model->detail($orderid);
		$this->smarty->assign('code', $res['code']);
		if($res['code'] == 0)
		{
			$this->smarty->assign('data', $res['data']);//print_r($res['data']);exit();
		}
		else
		{
			$this->smarty->assign('msg', $res['msg']);
		}
		//退款原因
		$reasonList = $this->order_service_model->getReasonList();
		$this->smarty->assign('reasonList', $reasonList);
		$this->smarty->display("order/checkorder.tpl");
	}

	public function changeOrderLable()
	{
		$para['orderid'] = trim($this->input->post("orderid"));
		$para['lable'] = trim($this->input->post("lable"));
		$res = $this->order_service_model->changeOrderLable($para);
		$this->outputResponse($res);
	}

	public function doDeliveryOrder()
	{
		$data['orderid'] = trim($this->input->post("orderid", TRUE));
		$data['company'] = trim($this->input->post("company", TRUE));
		$data['snno'] = trim($this->input->post("snno", TRUE));
		$res = $this->order_service_model->updateOrderTabelById($data);
		$this->outputResponse($res);
	}

	//退款
	public function doRefund()
	{
		$data['skuid'] = 0;//已发货状态
		$data['orderid'] = trim($this->input->post("orderid", TRUE));
		$data['money'] = floatval($this->input->post("refund_fee", TRUE));
		$data['reason'] = trim($this->input->post("refund_reason", TRUE));
		// p($data);
		$res = $this->order_service_model->updateOrderStatus($data);
		$this->outputResponse($res);
	}

	//联系卖家
	public function linkmer()
	{

	}

	public function doEditAdd()
	{
		$data['orderid'] = trim($this->input->post("orderid", TRUE));
		$data['address1'] = trim($this->input->post("street_line1", TRUE));
		$data['address2'] = trim($this->input->post("street_line2", TRUE));
		$data['city'] = trim($this->input->post("city", TRUE));
		$data['state'] = trim($this->input->post("state", TRUE));
		$data['country'] = trim($this->input->post("country", TRUE));
		$data['zipCode'] = trim($this->input->post("postal_code", TRUE));
		$data['firstName'] = trim($this->input->post("first_name", TRUE));
		$data['lastName'] = trim($this->input->post("last_name", TRUE));
		$data['phone'] = trim($this->input->post("phone_number", TRUE));

		$res = $this->order_service_model->updateAddress($data);
		$this->outputResponse($res);
	}

	//获取配送选中订单
	public function selectedDelivered()
	{
		//以','分隔的字符串
		$dataArr = trim($this->input->get("orderId"));
		$data = explode(",", $dataArr);
		foreach ($data as $key => $value) {
			$res = $this->order_service_model->detail($value);
			// p($res);
			$res_data[$key] = $res['data'];
		}
		// p($res_data);
		$logisticsList = $this->order_service_model->getLogisticslist();
		$this->smarty->assign('data', $res_data);
		$this->smarty->assign('logisticsList', $logisticsList['data']['list']);
		$this->smarty->display("order/seldelivery.tpl");
	}

	//处理配送选中订单
	public function doSelectedDeli()
	{
		$data['orderid'] = $this->input->post('orderid', TRUE);
		$data['logi_co_id'] = $this->input->post('logistics_co_id', TRUE);
		$data['logistics_id'] = $this->input->post('logistics_id', TRUE);
		$bool = false;
		foreach ($data['orderid'] as $key => $value) {
			$pra['orderid'] = $value;
			$pra['logi_co_id'] = $data['logi_co_id'][$key];
			$pra['logistics_id'] = $data['logistics_id'][$key];
			$res = $this->order_service_model->updateOrderTabelById($pra);

			if($res['code'] == 0)
			{
				$data2['orderid'] = $value;
				$data2['status'] = 3;//已发货状态
				$res = $this->order_service_model->updateOrderStatus($data2);
				if($res['code'] == 0)
				{
					$bool = true;
				}
			}
		}
		if($bool)
		{
			$res['code'] = 0;
			$res['msg'] = "更新成功";
		}
		else
		{
			$res['code'] = 1;
			$res['msg'] = "更新失败";
		}
		$this->outputResponse($res);
	}

	public function dochangestatus()
	{
		$order_id = $this->input->post('orderid');
		$status = $this->input->post('status');
		$transactionid = $this->input->post('transactionid');
		$reason = $this->input->post('reason');

		$data = $this->order_service_model->dochangestatus($order_id, $status, $transactionid, $reason);
		$this->outputResponse($data);
	}

	// 添加订单备注信息
	public function savedOrderTips()
	{
		$tips = trim($this->input->post('tips'));
		$order_id = $this->input->post('orderid');
		$res = $this->order_service_model->savedOrderTips($order_id, $tips);
		if($res)
			$this->outputResponse(array('code' => 0));
		else
			$this->outputResponse(array('code' => 1, 'msg'=> '添加备注出错'));
	}
}