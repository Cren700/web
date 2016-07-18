<?php

/**
 * Product_service_model.php
 * Author   : cren
 * Date     : 16/7/16
 * Time     : 下午11:01
 */
class Product_service_model extends MY_Model
{
    private $_host = 'product';
    public function __construct()
    {
        parent::__construct();
    }

    public function add($product_name, $product_description, $sale_price, $market_price, $product_protocol, $promotion_tag, $product_tag, $product_detail, $create_time)
    {
        $data = array(
            'productName'          => $product_name,
            'productDescription'   => $product_description,
            'salePrice'            => $sale_price,
            'marketPrice'          => $market_price,
            'productProtocol'      => $product_protocol,
            'promotionTag'         => $promotion_tag,
            'productTag'           => $product_tag,
            'productDetail'        => $product_detail,
            'createTime'           => $create_time,
            'mid'                   => $this->mid,
        );
        return $this->myCurl($this->_host, 'addProduct', $data, true);
    }
}