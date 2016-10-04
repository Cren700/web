<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 下午2:47
 */
class Account_dao_model extends MY_Model
{
    private $_account_table = 'yp_account';
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 添加账号
     * @param $username
     * @param $pwdCode
     * @param $salt
     * @return mixed
     */
    public function addAccount($username, $pwdCode, $salt)
    {
        $data = array(
            'username'  => $username,
            'pwd'       => $pwdCode,
            'salt'      => $salt,
            'register_time' => time()
        );
        $data = dbEscape($data); // 转义输入数据
        return $this->db->insert($this->_account_table, $data);
    }

    public function getInfoByUsername($username){
        $data = array(
            'username'  => $username,
        );
        $data = dbEscape($data); // 转义输入数据
        $query = $this->db->get_where($this->_account_table, $data, 1);
        return $query->row_array();
    }

    /**
     * 获取商户信息
     * @param $id
     * @return mixed
     */
    public function getAccountInfo($id)
    {
        $where = array('id' => $id);
        $query = $this->db->get_where($this->_account_table, $where, 1);
        return $query->row_array();
    }

}