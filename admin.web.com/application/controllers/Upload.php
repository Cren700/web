<?php
class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/upload_service_model');
    }

    public function token()
    {
        $type = $this->input->get('type');
        $file = $this->input->get('file');
        $data = $this->upload_service_model->token($type, $file);
        echo json_encode($data);
    }

    public function kindeditor()
    {
        $data = $this->upload_service_model->kindeditor();
        echo json_encode($data);
    }
}