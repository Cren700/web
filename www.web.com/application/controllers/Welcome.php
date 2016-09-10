<?php
class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('upload.tpl');
	}

	public function doUpload()
	{
		echo 12341;
//        $config['upload_path']      = '/upload';
//
//        $config['allowed_types']    = '*';

		$config['upload_path']      = './uploads/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['max_size']         = 100;
		$config['max_width']        = 1024;
		$config['max_height']       = 768;

		$this->load->library('Upload', $config);

		//是否获取到上传文件
//        if ( ! $this->upload->do_upload('file_name'))
//        {
//            echo json_encode(array('code'=>'-1','status'=>$this->upload->display_errors()));
//            exit;
//        }
//
//        $data = array('upload_data' => $this->upload->data());
//        echo json_encode($data);

		if ( ! $this->upload->do_upload('file_upload'))
		{
			$error = array('error' => $this->upload->display_errors());
var_dump($error);
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
	}
}