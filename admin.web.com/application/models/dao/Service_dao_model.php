<?php
class Service_dao_model extends MY_Model
{
    private $_service_detail_table = 'wf_service_detail';
    private $_service_message_table = 'wf_service_message';
    private $_service_reason_table = 'wf_service_reason';
    private $_service_tag_table = 'wf_service_tag';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mongos');
    }

    public function getUserServiceMessageNumByWhere($where)
    {
        return $this->mongos->count($this->_service_message_table, $where);
    }

    public function getUserServiceMessageListByWhere($where, $p)
    {
        $field = array();
        $sort = array('time' => -1);
        return $this->mongos->find($this->_service_message_table, $where, $field, $sort, $p, 20);
    }

    public function getAllServiceReason()
    {
        $where = array('status' => 1);
        $field = array('_id', 'name');
        $sort = array('sort' => -1);
        return $this->mongos->find($this->_service_reason_table, $where, $field, $sort);
    }

    public function insertUserServiceTag($servId, $content)
    {
        $data = array(
            'service_id'        => $servId,
            'content'           => $content,
            'ip'                => get_client_ip(1),
            'time'              => time()
        );
        return $this->mongos->insert($this->_service_tag_table, $data);
    }

    public function getUserServiceTagByServId($servId)
    {
        $where = array('service_id' => $servId);
        $field = array('content');
        $sort = array('time' => 1);
        return $this->mongos->find($this->_service_tag_table, $where, $field, $sort);
    }

    public function getUserServiceMessageInfoById($id)
    {
        $where = array('_id' => $id);
        return $this->mongos->findOne($this->_service_message_table, $where);
    }

    public function updateUserServiceMessageInfoById($id, $data)
    {
        $where = array('_id' => $id);
        return $this->mongos->update($this->_service_message_table, $data, $where);
    }
}