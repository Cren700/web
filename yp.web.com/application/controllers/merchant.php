<?php

/**
 * 商户
 * merchant.php
 * Author   : cren
 * Date     : 16/10/8
 * Time     : 下午11:23
 */
class merchant extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/merchant_service_model', 'merchant_service');
    }

    /**
     * 商家店铺信息页面
     */
    public function index()
    {
        $mid = $this->_uid;
        $info = $this->merchant_service->getMerchantByMid($mid);
        $this->smarty->assign('info', $info);
        $this->smarty->assign('seo_title', '商家后台页面');
        $this->smarty->display('merchant/index.tpl');
    }

    /**
     * 商家个人信息页面
     */
    public function manageInfo()
    {

    }

    /**
     * 编辑
     */
    public function edit()
    {
        $mid = $this->_uid;
        $info = $this->merchant_service->getMerchantByMid($mid);
        $jsArr = array(
            array('url' => '/static/js/common/jquery.placeholder.min.js'),
            array('url' => '/static/js/common/jquery.form.js'),
            array('url' => '/static/js/merchant/edit.js')
        );
        $this->smarty->assign('info', $info);
        $this->smarty->assign('jsArr', $jsArr);
        $this->smarty->assign('seo_title', '商家信息');
        $this->smarty->display('merchant/edit.tpl');
    }

    /**
     * 处理编辑信息
     */
    public function editHandel()
    {
        $data['cp_sname'] = $this->input->post('cpSname');
        $data['cp_fullname'] = $this->input->post('cpFullname');
        $data['cp_add'] = $this->input->post('cpAdd');
        $data['cp_detail'] = $this->input->post('cpDetail');
        $data['charge_name'] = $this->input->post('chargeName');
        $data['charge_phone'] = $this->input->post('chargePhone');
        $data['charge_email'] = $this->input->post('chargeEmail');

        $res = $this->merchant_service->modified($data);

        echo outPutJsonData($res);
    }

    /**
     * 发布工作列表
     */
    public function job()
    {
        $info = array();

        $this->smarty->assign('info', $info);
        $this->smarty->display('merchant/job.tpl');
    }

    /**
     * 添加招聘信息
     */
    public function addJob()
    {
        $work_type = getCommonConf('work_type');
        $sex_limit = getCommonConf('sex_limit');
        $salary_unit = getCommonConf('salary_unit');
        $settlement_method = getCommonConf('settlement_method');

        $this->smarty->assign('work_type', $work_type);
        $this->smarty->assign('sex_limit', $sex_limit);
        $this->smarty->assign('salary_unit', $salary_unit);
        $this->smarty->assign('settlement_method', $settlement_method);
        $this->smarty->display('merchant/addJob.tpl');
    }

    public function saveJob()
    {

    }

}