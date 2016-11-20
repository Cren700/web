<?php

/**
 * Merchant_service_model.php
 * Author   : cren
 * Date     : 2016/10/16
 * Time     : 下午10:20
 */
class Merchant_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/merchant_dao_model', 'merchant_dao');
    }

    /**
     * 通过商户ID获取商户信息
     * @param $mid
     * @return mixed
     */
    public function getMerchantByMid($mid)
    {
        return $this->merchant_dao->getMerchantByMid($mid);
    }

    /**
     * 编辑商户信息
     * @param $data 商户信息
     * @return array
     */
    public function modified($data)
    {
        $res = array('code' => 0);
        $mid = $this->_mid;
        if (!$mid) {
            return array('code' => 'account_error_99');
        }
        // 数据验证
        $validationConfig = array(
            array(
                'value' => $data['cp_sname'],
                'rules' => 'required',
                'field' => '公司简称'
            ),
            array(
                'value' => $data['cp_fullname'],
                'rules' => 'required',
                'field' => '公司全称'
            ),
            array(
                'value' => $data['cp_add'],
                'rules' => 'required',
                'field' => '公司地址'
            ),
            array(
                'value' => $data['cp_detail'],
                'rules' => 'required',
                'field' => '公司简介'
            ),
            array(
                'value' => $data['charge_name'],
                'rules' => 'required',
                'field' => '负责人姓名'
            ),
            array(
                'value' => $data['charge_phone'],
                'rules' => 'required|phone',
                'field' => '负责人电话'
            ),
            array(
                'value' => $data['charge_email'],
                'rules' => 'required|email',
                'field' => '公司邮箱'
            )
        );
        foreach ($validationConfig as $v) {
            $resValidation = validationData($v['value'], $v['rules'], $v['field']);
            if (!empty($resValidation)) {
                return $resValidation;
            }
        }
        if ( !$mid ) {
            unset($data['mid']);
            $ret = $this->merchant_dao->add($data);
        } else {
            $data['check_status'] = 2;
            $ret = $this->merchant_dao->modified($mid, $data);
        }
        if (!$ret) {
            $res['code'] = 'product_error_3';
        }
        return $res;
    }
}