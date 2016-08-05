<?php
class Service extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/service_service_model');
    }

    public function lists()
    {
        $status = intval($this->input->get('stat'));
        $p = intval($this->input->get('p'));
        $data = $this->service_service_model->lists($status, $p);

        $this->smarty->assign('data', $data['data']);
        $this->smarty->assign('reason', $data['reason']);
        $this->smarty->assign('status', $data['status']);
        $this->smarty->assign('p', $data['page']);
        $this->smarty->assign('total', $data['total']);
        $this->smarty->assign('totalPage', $data['totalPage']);
        $this->smarty->display('service/lists.tpl');
    }

    public function serv()
    {
        $id = trim($this->input->get('id'));
        $data = $this->service_service_model->serv($id);
// p($data);
        $this->smarty->assign('list', $data['list']);
        $this->smarty->assign('question', $data['question']);
        $this->smarty->assign('orderInfo', $data['orderInfo']);
        $this->smarty->assign('merchantInfo', $data['merchantInfo']);
        $this->smarty->assign('userInfo', $data['userInfo']);
        $this->smarty->assign('tag', $data['tag']);
        $this->smarty->display('service/serv.tpl');
    }

    public function tag()
    {
        $servId = trim($this->input->post('servId'));
        $content = trim($this->input->post('content'));
        $data = $this->service_service_model->tag($servId, $content);
        echo json_encode($data);
    }

    public function status()
    {
        $servId = trim($this->input->get('servId'));
        $status = intval($this->input->get('stat'));
        $this->service_service_model->status($servId, $status);
        $this->jump('/service/serv?id='.$servId);
    }

    public function publishMessage()
    {
        $servId = trim($this->input->post('servId'));
        $content = trim($this->input->post('content'));
        $data = $this->service_service_model->publishMessage($servId, $content);
        echo json_encode($data);
    }
}