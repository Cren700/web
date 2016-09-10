<?php

/**
 * Banner_service_model.php
 * Author   : cren
 * Date     : 16/8/28
 * Time     : 下午7:18
 */
class Banner_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/banner_dao_model');
    }

    public function index()
    {
        $res = $this->banner_dao_model->index();
        return array('code' => 0, 'list' => $res);
    }

    public function save($id, $name, $url, $img, $priority, $show_time, $status)
    {
        $rse = array('code' => 0);
        $data = array(
            'name'      => $name,
            'url'       => $url,
            'img'       => $img,
            'priority'  => $priority,
            'show_time' => $show_time,
            'status'    => $status,
            'last_time' => time()
        );
        if ($id) {
            $where = array('id' => $id);
            $ret = $this->banner_dao_model->modify($where, $data);
        } else {
            $data['create_time'] = time();
            $ret = $this->banner_dao_model->add($data);
        }
        if ( $ret ) {
            $res['url'] = '/banner.html';
        } else {
            $res['code'] = 1;
            $res['msg'] = '保存不成功,请重新再试';
        }
        return $res;
    }
}