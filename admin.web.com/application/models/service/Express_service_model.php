<?php
class Express_service_model extends MY_Model
{
	private $_host = 'item';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/express_dao_model');
    }

    public function index()
    {
    	$data = array(
			'country'=>array(),
			'Express'=>array()
    	); 
    	$res1 = $this->myCurl('account','getCountryList');//var_dump($res1);exit();
    	if (!$res1['code']) 
    	{
    		$data['country'] = $res1['data'];
    	}
    	$res2 = $this->myCurl($this->_host,'expressGetExpressPriceList');//var_dump($res2);exit();
    	if (!$res2['code']) 
    	{
    		$data['Express'] = $res2['data'];
    	}

    	return $data;
    }

    public function add($para)
    {
    	$res = $this->myCurl($this->_host,'expressAdd',$para,true);
    	return $res;
    }

    public function delete($para)
    {
    	$para['mid'] = 0;
    	$res = $this->myCurl($this->_host,'expressDelete',$para,true);
    	return $res;
    }

    public function update($para)
    {
    	$res = $this->myCurl($this->_host,'expressUpdate',$para,true);
    	return $res;
    }


}