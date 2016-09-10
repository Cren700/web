<?php
/**
 * Article_dao_model.php
 * Author   : cren
 * Date     : 16/8/14
 * Time     : 上午12:52
 */

class Article_dao_model extends MY_Model
{
    private $_table_article = 'hi_article';
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data)
    {
        $this->db->insert($this->_table_article, $data);
        return $this->db->affected_rows();
    }

    public function update($where, $data)
    {
        $this->db->update($this->_table_article, $data, $where);
        return $this->db->affected_rows();
    }
    
    public function getArticleByTagId($tag_id)
    {
        $where = array('tag_id' => $tag_id);
        $query = $this->db->get_where($this->_table_article, $where);
        return $query->result_array();
    }
    
    public function getArticleByAid($aid)
    {
        $where = array('id' => $aid);
        $query = $this->db->get_where($this->_table_article, $where, 1);
        return $query->row_array();
    }


}