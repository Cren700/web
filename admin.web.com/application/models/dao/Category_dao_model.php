<?php
/**
 * Category_dao_model.php
 * Author   : cren
 * Date     : 16/8/2
 * Time     : 下午12:10
 */

class Category_dao_model extends MY_Model
{
    private $_cate_table = 'hi_category';
    private $_cateTag_table = 'hi_cate_tag';
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $this->db->insert($this->_cate_table, $data);
        return $this->db->affected_rows();
    }

    public function getCate($limit = 0)
    {
        if ($limit !== 0) {
            $this->db->where('is_delete', 0);
        }
        $this->db->order_by('priority', 'ASC');
        $query = $this->db->get($this->_cate_table);
        return $query->result_array();
    }
    
    public function getCateInfoById($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where($this->_cate_table, $where);
        return $query->row_array();
    }

    public function update($where, $data)
    {
        $this->db->update($this->_cate_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function change($id)
    {
        $sql = "UPDATE {$this->_cate_table} SET is_delete = 1 - is_delete AND last_time = ".time()." WHERE id = {$id}";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }
    
    public function getCateTagByCateId($cate_id)
    {
        $where = array('cate_id' => $cate_id, 'status' => 1);
        $query = $this->db->get_where($this->_cateTag_table, $where);
        return $query->result_array();
    }

    public function addTag($data)
    {
        $this->db->insert($this->_cateTag_table, $data);
        return $this->db->affected_rows();
    }

    public function getTagList()
    {
        $sql = "SELECT c.cate_name, c.id as cate_id, t.tag_name, t.id as tag_id, t.status, t.priority, t.last_time 
                FROM {$this->_cate_table} AS c 
                LEFT JOIN {$this->_cateTag_table} AS t ON c.id = t.cate_id 
                ORDER BY c.priority ASC, t.priority ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function updateTag($where, $data)
    {
        $this->db->update($this->_cateTag_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function getTagInfoByTagId($tag_id)
    {
        $query = $this->db->get_where($this->_cateTag_table, array('id' => $tag_id), 1);
        return $query->row_array();
    }
    
}