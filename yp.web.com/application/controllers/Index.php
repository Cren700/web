<?php
class Index extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->smarty->display('index/home.tpl');
	}

}