<?php

/**
 * Index.php
 * 首页
 * Author   : cren
 * Date     : 16/7/16
 * Time     : 下午2:55
 */
class Index extends BaseController
{
    public function __construct(){
        parent::__construct();

    }

    public function index() {
        $this->smarty->display('index/index.tpl');
    }

    public function home() {
        $this->smarty->display('index/home.tpl');
    }
}