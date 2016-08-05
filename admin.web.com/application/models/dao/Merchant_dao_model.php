<?php
class Merchant_dao_model extends MY_Model
{
    private $_merchant_table = 'hi_merchant';
    public function __construct()
    {
        parent::__construct();
    }

    public function getMerchantInfoByUserName($username)
    {
        $sql = "SELECT * FROM {$this->_merchant_table} WHERE `username` = '{$username}' AND `status` = 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    /**
     * 通过商家ID获取hi_merchant表中的信息
     * @param   int     $mid    [商家ID]
     * @return  array           [商家信息]
     */ 
    public function getMerchantInfoByID($mid)
    {
        $sql = "SELECT * FROM {$this->_merchant_table} WHERE id = {$mid}  AND `status` = 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function updateMerchantInfoById($id, $data)
    {
        $where = array('id' => $id);
        $this->db->update($this->_merchant_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function insertMerchantInfo($data)
    {
        return $this->db->insert($this->_merchant_table, $data);
    }

}