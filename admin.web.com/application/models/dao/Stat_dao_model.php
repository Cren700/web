<?php
class Stat_dao_model extends MY_Model
{

    private $_day_amount_table = 'st_day_amount';
    private $_day_order_table = 'st_day_order';
    private $_day_view_table = 'st_day_view';
    private $_day_status_table = 'st_day_status';
    private $_monty_view_table = 'st_monty_view';
    private $m_id=0;//临时写死商户id

    public function __construct()
    {
        parent::__construct();
    }

    //获取交易额
    public function getDayAmount()
    {
        return $this->stat->where('mid',$this->m_id)->order_by('date','desc')->limit(7)->get($this->_day_amount_table)->result_array();
        echo $this->stat->last_query();exit();
    }

    //获取订单
    public function getDayOrder()
    {
        return $this->stat->where('mid',$this->m_id)->order_by('date','desc')->limit(7)->get($this->_day_order_table)->result_array();
    }

    //获取浏览统计
    public function getDayView()
    {
        return $this->stat->where('mid',$this->m_id)->order_by('date','desc')->limit(15)->get($this->_day_view_table)->result_array();
    }

    //获取历史统计：总浏览次数，总浏览人数，总订单数，总订单金额
    public function getHistoryCount()
    {
        $field = 'sum(day_views_person) as views_person,sum(day_views_page) as views_page,sum(day_order_num) as order_num,sum(day_order_amount) as order_amount';
        return $this->stat->select($field)->get($this->_day_status_table)->row_array();
        echo $this->stat->last_query();exit();
    }

    //获取最近10天统计：总浏览次数，总浏览人数，总订单数，总订单金额
    public function getNearlyCount($left_time,$right_time)
    {
        if ($left_time) {
            $this->stat->where('date >=',"'$left_time'",false);
        }
        if ($right_time) {
            $this->stat->where('date <=',"'$right_time'",false);
        }
        return $this->stat->group_by('date')->order_by('date','desc')->limit(10)->get($this->_day_status_table)->result_array();
        echo $this->stat->last_query();exit();
    }


}