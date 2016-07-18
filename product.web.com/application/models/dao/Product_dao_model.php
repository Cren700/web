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

}