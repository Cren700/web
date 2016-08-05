<?php
class Merchant_service_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("dao/merchant_dao_model");
	}

	public function index()
	{
		return $this->merchant_dao_model->getMerchantInfoByID($this->mid);
	}

	public function update($data)
	{
		$res = array('code' => 1, 'msg' => "没有提交数据");

		if($data['email'] != '')
		{
			$res = array('code' => 1, 'msg' => '邮箱错误，请先确认');
			if(is_email($data['email']))
			{
				if($this->merchant_dao_model->updateMerchantInfoById($this->mid, $data))
				{
					$res = array('code' => 0, 'msg' => '更新成功', 'data' => '/merchant');
				}
				else
				{
					$res = array('code' => 1, 'msg' => "更新失败");
				}
			}
		}
		return $res;
	}

	public function updatepwd($data)
	{
		$info = $this->merchant_dao_model->getMerchantInfoByID($this->mid);
		$res = array('code' => 1, 'msg' => '两次密码不一致');
		if($data['newpwd'] == $data['renewpwd'])
		{
			$res = array('code' => 1, 'msg' => '原密码输入错误');
			if(getPassWord($data['password'], $info['salt']) == $info['password'])
			{
				$res = array('code' => 1, 'msg' => '修改失败');
				$info['salt'] = salt();
        		$info['password'] = getPassword($data['newpwd'], $info['salt']);
        		$info['update_time'] = time();
				if($this->merchant_dao_model->updateMerchantInfoById($this->mid, $info))
				{
					$res  = array('code' => 0, 'msg' => '密码修改成功');
				}
			}
		}

		return $res;
	}

	public function addAccount($username, $pwd)
	{
		$salt = salt();
		$data = array(
			'username'  => $username,
			'pwd'		=> getPassword($pwd, $salt),
			'salt'		=> $salt,
			'log_cnt'	=> 1,
			'create_time'	=> time(),
			'last_time'		=> time(),
			'ip'		=> get_client_ip(),
		);
		return $this->merchant_dao_model->insertMerchantInfo($data);
	}
}
 ?>