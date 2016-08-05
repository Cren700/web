<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 下午2:47
 */
class Product_dao_model extends MY_Model
{
    private $_product_tabel = 'cr_products';
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $data = dbEscape($data);
        return $this->db->insert($this->_product_tabel, $data);
    }

    public function getProductById($pid)
    {
        $where = array('id' => $pid);
        $query = $this->db->get_where($this->_product_tabel, $where, 1);
        return $query->result_array();
    }

    public function getProductsByMid($mid)
    {
        $where = array('mid' => $mid);
        $query = $this->db->get_where($this->_product_tabel, $where);
        return $query->result_array();
    }

}