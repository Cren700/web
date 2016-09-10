<?php
class Stat extends BaseController
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->model('service/stat_service_model');
    }

    //首页
    public function index()
    {
//        $data = $this->stat_service_model->index();
//        $this->smarty->assign('data',$data);
        $this->smarty->display('stat/detail.tpl');
    }

    //曲线图详情
    public function detail()
    {
//        $left_time = isset($_GET['left_time']) ? trim($this->input->get('left_time')) : date('Y-m-d',(time()-3600*24*7));
//        $right_time = isset($_GET['right_time']) ? trim($this->input->get('right_time')) : date('Y-m-d');
//        $data = $this->stat_service_model->getDetail($left_time,$right_time);
        //print_r($data);exit();
//        $this->smarty->assign('left_time',$left_time);
//        $this->smarty->assign('right_time',$right_time);
//        $this->smarty->assign('data',$data);
        $this->smarty->display('stat/detail.tpl');
    }

}