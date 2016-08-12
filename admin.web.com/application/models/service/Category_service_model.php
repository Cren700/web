<?php
/**
 * Category_service_model.php
 * Author   : cren
 * Date     : 16/8/2
 * Time     : 下午12:07
 */

class Category_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/category_dao_model');
    }

    public function add($catename, $priority)
    {
        $data = array(
            'cate_name' => $catename,
            'priority'  => $priority,
            'create_time'   => time(),
        );

        return $this->category_dao_model->add($data);
    }

    public function getCate($limit = 0)
    {
        $res = array('code' => 0, 'data' => array());
        $data = $this->category_dao_model->getCate($limit);
        if (!empty($data)) {
            $res['data']['cate_list'] = $data;
        }
        return $res;
    }

    public function getCateInfoById($id)
    {
        $data = $this->category_dao_model->getCateInfoById($id);
        if (!empty($data))
        {
            $res = array('code' => 0, 'data' => $data);
        } else {
            $res = array('code' => 1, 'msg' => '获取数据出错');
        }
        return $res;
    }
    
    public function update($id, $cate_name, $priority, $is_delete)
    {
        $res = array('code' => 0);
        $data = array();
        $data['priority'] = $priority;
        $data['is_delete'] = $is_delete;
        $cate_name ? $data['cate_name'] = $cate_name : '';
        $data['last_time'] = time();
        $where = array('id' => $id);
        if (empty($id)) {
            $res['code'] = 1;
            $res['msg'] = "数据出错";
            return $res;
        }
        $result = $this->category_dao_model->update($where, $data);
        if(!$result){
            $res['code'] = 2;
            $res['msg'] = "更新不成功";
        }
        return $res;
    }

    public function change($id)
    {
        $res = array('code' => 0);
        $result = $this->category_dao_model->change($id);
        if(!$result){
            $res['code'] = 2;
            $res['msg'] = "更新不成功";
        }
        return $res;
    }

    public function getCateTagByCateId($cate_id)
    {
        $res = array('code' => 0, 'data' => array());
        $data = $this->category_dao_model->getCateTagByCateId($cate_id);
        if (!empty($data)) {
            $res['data']['tagList'] = $data;
        }
        return $res;
    }

    public function addTag($cate_id, $tag_name, $priority)
    {
        $data = array(
            'cate_id'       => $cate_id,
            'tag_name'      => $tag_name,
            'priority'      => $priority,
            'create_time'   => time(),
            'last_time'     => time(),
            'status'        => 1
        );

        return $this->category_dao_model->addTag($data);
    }

    public function getTagList()
    {
        $res = array('code' => 0, 'data' => array());
        $data = $this->category_dao_model->getTagList();
        if (!empty($data)) {
            $res['data'] = $data;
        }
        return $res;
    }

    public function updateTag($where, $data)
    {
        $res = array('code' => 0);
        $data = $this->category_dao_model->updateTag($where, $data);
        if (!$data) {
            $res['code'] = -1;
        }
        return $res;
    }

    public function getTagInfoByTagId($tag_id)
    {
        $res = array('code' => 0, 'data' => array());
        $data = $this->category_dao_model->getTagInfoByTagId($tag_id);
        if (!empty($data)) {
            $res['data'] = $data;
        } else {
            $res['code'] = -1;
        }
        return $res;
    }

}