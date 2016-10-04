<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 上午11:16
 */
class Account_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/account_dao_model');
    }

    public function addAccount($username, $pwd)
    {
        // 数据验证
        $validationConfig = array(
            array(
                'value' => $username,
                'rules' => 'required|min_length[4]|max_length[16]',
                'field' => '用户名'
            ),
            array(
                'value' => $pwd,
                'rules' => 'required|min_length[6]|max_length[16]',
                'field' => '密码'
            )
        );
        foreach ($validationConfig as $v) {
            $resValidation = validationData($v['value'], $v['rules'], $v['field']);
            if (!empty($resValidation)) {
                return $resValidation;
            }
        }

        $hasUsername = $this->account_dao_model->getInfoByUsername($username);
        if( $hasUsername ) {
            return array('code' => 'account_error_2'); // 用户名已存在
        }
        $salt = saltCode();
        $pwdCode = encodePwd($salt, $pwd);
        if ($this->account_dao_model->addAccount($username, $pwdCode, $salt) ){
            return array('code' => 0);
        } else {
            return array('code' => 'account_error_3');
        }
    }

    public function accountLogin($username, $pwd)
    {
        // 数据验证
        $validationConfig = array(
            array(
                'value' => $username,
                'rules' => 'required|min_length[4]|max_length[16]',
                'field' => '用户名'
            ),
            array(
                'value' => $pwd,
                'rules' => 'required|min_length[6]|max_length[16]',
                'field' => '密码'
            ),
        );
        foreach ($validationConfig as $v) {
            $resValidation = validationData($v['value'], $v['rules'], $v['field']);
            if (!empty($resValidation)) {
                return $resValidation;
            }
        }
        $info = $this->account_dao_model->getInfoByUsername($username);
        if (!$info) return array('code' => 'account_error_0'); // 账户不存在
        $pwdCode = encodePwd($info['salt'], $pwd);
        if ($info['pwd'] !== $pwdCode) {
            return array('code' => 'account_error_1');         // 账户密码不一致
        } else {
            $resData = array('id' => $info['id'], 'username' => $info['username']);
            return array('code' => 0, 'data' => $resData);
        }
    }

    public function getAccountInfo($mid)
    {
        $res = $this->account_dao_model->getAccountInfo($mid);
        if ( !empty($res) ){
            $result = array(
                'code' => 0,
                'data' => array(
                    'address'           => $res['address'],
                    'phone_number'      => $res['phone_number']
                )
            );
        } else {
            $result = array('code' => 'product_error_2');
        }
        return $result;
    }

}