<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends BaseControllor {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('service/product_service_model');
	}

	public function add()
	{
		$product_name = $this->input->post('productName');
		$product_description = $this->input->post('productDescription');
		$sale_price = $this->input->post('salePrice');
		$market_price = $this->input->post('marketPrice');
		$product_protocol = $this->input->post('productProtocol');
		$promotion_tag = $this->input->post('promotionTag');
		$product_tag = $this->input->post('productTag');
		$product_detail = $this->input->post('productDetail');
		$create_time = time();
		$mid = $this->input->post('mid');
		$res = $this->product_service_model->add($product_name, $product_description, $sale_price, $market_price, $product_protocol, $promotion_tag, $product_tag, $product_detail, $create_time, $mid);
		echo outPutJsonData($res);
	}


}
