<?php

/**
 * Merchant_dao_model.php
 * Author   : cren
 * Date     : 2016/10/16
 * Time     : 下午10:37
 */
class Merchant_dao_model extends MY_Model
{
    private $_table_merchant;
    public function __construct()
    {
        parent::__construct();
        $this->_table_merchant = getCommonConf('db_prefix').'merchant';
    }

    /**
     * 通过mid获取商户信息
     * @param $mid
     * @return mixed
     */
    public function getMerchantByMid($mid)
    {
        $where = array('mid' => $mid);
        $query = $this->db->get_where($this->_table_merchant, $where);
        return $query->row_array();
    }

    /**
     * 添加商户信息
     * @param $data
     * @return mixed
     */
    public function add($data){
        $this->db->insert($this->_table_merchant, $data);
        return $this->db->insert_id();
    }

    /**
     * 修改商户信息
     * @param $mid
     * @param $data
     */
    public function modified($mid, $data) {
        $where = array('mid' => $mid);
        $this->db->update($this->_table_merchant, $data, $where);
        return $this->db->affected_rows();
    }
}