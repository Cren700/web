<?php
/**
 * Banner.php
 * Author   : cren
 * Date     : 16/8/28
 * Time     : 下午7:12
 */

class Banner extends BaseController{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/banner_service_model');
    }

    public function index()
    {
        $banner = $this->banner_service_model->index();
        $this->smarty->assign('data', $banner['list']);
        $this->smarty->display('banner/index.tpl');
    }


    public function add()
    {
        $this->smarty->assign('fun_name', '添加Banner');
        $this->smarty->display('banner/detail.tpl');
    }

    public function modify()
    {
        $this->smarty->assign('fun_name', '修改Banner');
        $this->smarty->display('banner/detail/tpl');
    }

    /**
     * 保存(修改)
     */
    public function save()
    {
        $id = intval($this->input->post('id'));
        $name = trim($this->input->post('name'));
        $url = urlencode(trim($this->input->post('url')));
        $img = urlencode(trim($this->input->post('img')));
        $priority = intval($this->input->post('priority'));
        $show_time = intval($this->input->post('showTime'));
        $status = intval($this->input->post('status'));
        $ret = $this->banner_service_model->save($id, $name, $url, $img, $priority, $show_time, $status);
        echo json_encode($ret);
    }




}