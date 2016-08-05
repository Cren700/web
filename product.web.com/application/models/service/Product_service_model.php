<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 上午11:16
 */
class Product_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/product_dao_model');
    }

    public function add($product_name, $product_description, $sale_price, $market_price, $product_protocol, $promotion_tag, $product_tag, $product_detail, $create_time, $mid)
    {
        $data = array(
            'name'                  => $product_name,
            'description'           => $product_description,
            'sale_price'            => $sale_price,
            'market_price'          => $market_price,
            'protocol'              => join(',', $product_protocol),
            'promotion_tag'         => $promotion_tag,
            'product_tag'           => $product_tag,
            'detail'                => $product_detail,
            'create_time'           => $create_time,
            'last_time'             => $create_time,
            'mid'                   => $mid
        );
        $res = $this->product_dao_model->add($data);
        if ($res) {
            return array('code' => 0);
        } else {
            return array('code' => 'product_error_1');
        }
    }

    public function getProductById($pid)
    {
        $result = array('code' => 0);
        $res = $this->product_dao_model->getProductById($pid);
        if (!empty($res)) {
            $result['data']['productList'] = $res;
        } else {
            $result = array('code' => 'product_error_2');
        }
        return $result;
    }

    public function getProductsByMid($mid)
    {
        $result = array('code' => 0);
        $res = $this->product_dao_model->getProductsByMid($mid);
        if (!empty($res)) {
             $result['data']['productList'] = $res;
        } else {
            $result = array('code' => 'product_error_2');
        }
        return $result;
    }

}