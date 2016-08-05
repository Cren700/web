<?php
class Order_dao_model extends MY_Model
{
	private $_service_reason_table = "wf_service_reason";
	private $_order_table = "wf_order";
	public function __construct()
	{
		parent::__construct();
		$this->load->library("mongos");
	}

	public function getRefundReasonList()
	{
		$where = array(
			"status" => 1
		);
		return $this->mongos->find($this->_service_reason_table, $where);
	}

	public function savedOrderTips($order_id, $tips)
	{
		$where = array('order_id'  => $order_id);
		$data = array('order_tips' => $tips);
		return $this->db->update($this->_order_table, $data, $where);
	}

}
 ?>