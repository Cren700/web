<?php
class Catalog_dao_model extends MY_Model
{
    private $_product_catalog_table = 'wf_product_catalog';

    public function __construct()
    {
        parent::__construct();
    }

    public function getCatalogListByPid($pid)
    {
        $sql = "SELECT `id`, `name` FROM {$this->_product_catalog_table} WHERE `pid` = $pid AND `status` = 1 ORDER BY `sort` DESC, `id` ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAllCatalogList()
    {
        $sql = "SELECT `id`, `name`, `ext`, `pid` FROM {$this->_product_catalog_table} WHERE `status` = 1 ORDER BY `sort` ASC, `id` ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}