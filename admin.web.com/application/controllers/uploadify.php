<?php
class Uploadify extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->smarty->display('upload.tpl');
    }

    public function doUpload()
    {
        $this->load->library('upload');

        $config['upload_path']      = './upload/'.date('Ym', time());
        $config['allowed_types']    = 'gif|jpg|png';
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);

        // 以年月分文件夹
        if ( !file_exists($config['upload_path'])) {
            mkdir($config['upload_path']);
        }
        //是否获取到上传文件
        // print_r($_FILES ); 通过uploadify上传字段为file_name,
        // 通过form上传则为input中的name
        if ( ! $this->upload->do_upload('file_name'))
        {
            echo json_encode(array('code'=>'-1','msg'=>$this->upload->display_errors()));
            exit;
        }

        $data = array('code' => 0, 'file_data' => '/upload/'.date('Ym', time()).'/'.$this->upload->data('file_name'));
        echo json_encode($data);

    }
}