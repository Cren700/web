<?php

/**
 * Product.php
 * Author   : cren
 * Date     : 16/7/16
 * Time     : 下午5:30
 */
class Product extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('service/product_service_model');
    }
    
    public function add(){
        $htmlJsArr = array(
            array('src' => baseJsUrl('product/product.js')),
            array('src' => baseJsUrl('common/jquery.form.js')),
        );
        $this->smarty->assign('htmlJsArr', $htmlJsArr);
        $this->smarty->display('product/add.tpl');
    }

    public function handelAdd(){
        $product_name = $this->input->post('productName');
        $product_description = $this->input->post('productDescription');
        $sale_price = $this->input->post('salePrice');
        $market_price = $this->input->post('marketPrice');
        $product_protocol = $this->input->post('productProtocol'); //注意: 数组类型
        $promotion_tag = $this->input->post('promotionTag');
        $product_tag = $this->input->post('productTag');
        $product_detail = $this->input->post('productDetail');
        $create_time = time();
        $res = $this->product_service_model->add($product_name, $product_description, $sale_price, $market_price, $product_protocol, $promotion_tag, $product_tag, $product_detail, $create_time);
        echo json_encode($res);
    }

    public function manage(){
        $this->smarty->display('product/manage.tpl');
    }
}