<?php
class Order_service_model extends MY_Model
{
	private $order = 'order';
	public function __construct()
	{
		parent::__construct();
		$this->load->model("dao/order_dao_model");
	}

	/**
	 * 获取限制订单状态的订单信息
	 */
	public function getOrder($status, $page)
	{
		$get = array('mid' => encryptId($this->mid), 'status' => $status, 'page' => $page, 'num' => 20);
		$res = $this->myCurl($this->order, 'getOrderMerchant', $get);//print_r($res);exit();
		return $res;
	}

	/**
	 * 根据SELECT分类获取相应状态的订单信息
	 */
	public function getOrderBySelect($data)
	{

		$get = array('mid' => encryptId($this->mid), 'status' => $data['status'], 'page' => $data['page'], 'num' => 20);

		$arr = array('orderid', 'email', 'transactionid', 'uid', 'username', 'logistics');

		if(in_array($data['stype'], $arr))
		{
			$get[$data['stype']] = $data['search'];
		}

		return $this->myCurl($this->order, 'getOrderMerchant', $get);
	}

	public function detail($orderid)
	{
		$get = array('mid' => encryptId($this->mid), 'orderid' => $orderid);
		$res = $this->myCurl($this->order, 'detailMerchant', $get);
		return $res;
	}

	public function getLogisticslist()
	{
		return $this->myCurl($this->order, 'getLogisticsList');
	}

	public function updateOrderTabelById($data)
	{
		$data['mid'] = encryptId($this->mid);
		return $this->myCurl($this->order, 'merchantUpdateLogistics', $data, true);
	}

	public function updateOrderStatus($data)
	{
		$data['mid'] = encryptId($this->mid);
		return $this->myCurl($this->order, 'orderRefund', $data, true);
	}

	public function updateAddress($data)
	{
		$data['mid'] = encryptId($this->mid);
		return $this->myCurl($this->order, 'updateAddress', $data, true);
	}

	public function updateOrderRefundById($data)
	{
		return $this->myCurl($this->order, 'updateOrderStatus', $data, true);
	}

	public function getReasonList()
	{
		return $this->order_dao_model->getRefundReasonList();
	}

	public function changeOrderLable($para)
	{
		$para['mid'] = encryptId($this->mid);
		return $this->myCurl($this->order,'changeOrderLable',$para,true);
	}

	public function dochangestatus($order_id, $status, $transactionid, $reason)
	{
		$data['mid'] = encryptId($this->mid);
		$data['orderId'] = $order_id;
		$data['status'] = $status;
		$data['transactionid'] = $transactionid;
		$data['reason'] = $reason;

		return $this->myCurl($this->order,'dochangestatus', $data, true);
	}

	public function savedOrderTips($order_id, $tips)
	{
		return $this->order_dao_model->savedOrderTips($order_id, $tips);
	}
}