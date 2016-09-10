<?php
/**
 * Banner_dao_model.php
 * Author   : cren
 * Date     : 16/8/28
 * Time     : 下午7:24
 */

class Banner_dao_model extends MY_Model
{
    private $_table_banner = 'hi_banner';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $ret = $this->db->select('*')
             ->from($this->_table_banner)
             ->order_by('priority ASC, status DESC')
             ->get();
        return $ret->result_array();
    }

    public function modify($where, $data){
        $this->db->insert($this->_table_banner, $data, $where);
        return $this->db->affected_rows();
    }

    public function add($data){
        $this->db->insert($this->_table_banner, $data);
        return $this->db->affected_rows();
    }
}
