<?php
class Sysmassage_dao_model extends MY_Model
{
	private $_wf_merchant_sysmassage = 'wf_merchant_sysmassage';
	private $_wf_merchant_sysmassage_list = 'wf_merchant_sysmassage_list';
	private $dbwrite;
	public function __construct()
	{
		parent::__construct();
		$this->dbwrite = $this->load->database('dbwrite',true);
	}

	/**
	 * 通过系统消息内容ID获取商家的系统消息内容
	 * @param  	array 	$msgid 	[系统消息内容ID]
	 * @return 	array  			二维数组
	 **/
	public function getMerchantSysMassageInfoByMsgid($msgid)
	{
		$msgid = join(',', $msgid);
		$sql = "SELECT * FROM {$this->_wf_merchant_sysmassage_list} WHERE id in ({$msgid}) ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * 通过商家ID获取商家系统消息表中的内容
	 * @param 	int 	$mid 	[商家ID]
	 * @return 	array 			[系统消息内容二维数组]
	 */
	public function getMerchantSysmassageMsgidByMid($mid)
	{
		$where = array('bid' => $mid);
		$query = $this->db->get_where($this->_wf_merchant_sysmassage,$where);
		return  $query->result_array();
	}

	public function getMerchantMassageIDByMidandBid($mid, $msglid)
	{
		$where = array('bid' => $mid, 'msgid' => $msglid);
		$query = $this->db->get_where($this->_wf_merchant_sysmassage, $where);
		return $query->row_array();
	}

	/**
	 * 通过系统内容表中的ID获取系统内容表中的详细内容
	 * @param 	int 	$msgid 	[消息ID]
	 * @return 	array 			[系统消息一维数组]
	 */
	public function getMerchantMassageListDetailByMsgid($msgid)
	{
		$where = array('id' => $msgid);
		$query = $this->db->get_where($this->_wf_merchant_sysmassage_list, $where);
		return $query->row_array();
	}

	/**
	 * 通过商家ID获取该商家系统消息表中未读信息数量
	 * @param 	int 	$mid 	[商家ID]
	 * @return 	int 			[未读信息数量]
	 */
	public function getSysmsgCountByMid($mid)
	{
		$sql = "SELECT count(id) as count FROM {$this->_wf_merchant_sysmassage} WHERE status=0 and bid={$mid}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return isset($result['count']) ? intval($result['count']) : 0;
	}

	public function updateMerchantMassageInfoById($id, $data)
	{
		$where = array('id' => $id);
        $this->dbwrite->update($this->_wf_merchant_sysmassage, $data, $where);
        return $this->dbwrite->affected_rows();
	}

}
 ?>