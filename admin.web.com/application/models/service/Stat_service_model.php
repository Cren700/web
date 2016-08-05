<?php
class Stat_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/stat_dao_model');
    }

    //获取首页统计数据
    public function index()
    {
        $amount = array();
        $order = array();
        $view = array();
        $dayAmount = $this->stat_dao_model->getDayAmount();//订单金额统计
        if (!empty($dayAmount))
        { 
            $list = array();
            $total_amount = 0;
            $seven_amount = 0;
            $yesterday_amount = 0;
            foreach ($dayAmount as $key => $value) {
                $list[] = array('values' => $value['today_amount'],'date' => date('m-d',strtotime($value['date'])));
                $total_amount = $total_amount <= $value['total_amount'] ? $value['total_amount'] : $total_amount;
                $seven_amount = $seven_amount <= $value['seven_amount'] ? $value['seven_amount'] : $seven_amount;
                $yesterday_amount = $yesterday_amount <= $value['yesterday_amount'] ? $value['yesterday_amount'] : $yesterday_amount;
            }
            $amount['list'] = $list;
            $amount['json_list'] = json_encode($list);
            $amount['total_amount'] = $total_amount;
            $amount['seven_amount'] = $seven_amount;
            $amount['yesterday_amount'] = $yesterday_amount;
        }
        $dayOrder = $this->stat_dao_model->getDayOrder();//订单量统计
        if (!empty($dayOrder)) 
        { 
            $list = array();
            $total_order = 0;
            $seven_order = 0;
            $yesterday_order = 0;
            foreach ($dayOrder as $key => $value) {
                $list[] = array('values' => $value['today_order'],'date' => date('m-d',strtotime($value['date'])));
                $total_order = $total_order <= $value['total_order'] ? $value['total_order'] : $total_order;
                $seven_order = $seven_order <= $value['seven_order'] ? $value['seven_order'] : $seven_order;
                $yesterday_order = $yesterday_order <= $value['yesterday_order'] ? $value['yesterday_order'] : $yesterday_order;
            }
            $order['list'] = $list;
            $order['json_list'] = json_encode($list);
            $order['total_order'] = $total_order;
            $order['seven_order'] = $seven_order;
            $order['yesterday_order'] = $yesterday_order;
        }
        $dayView = $this->stat_dao_model->getDayView();//浏览统计
        if (!empty($dayView)) 
        { 
            $list = array();
            $total_view_person = 0;
            $total_view_page = 0;
            foreach ($dayView as $key => $value) {
                $list[] = array('values' => $value['view_page'],'date' => date('m-d',strtotime($value['date'])));
                $total_view_person = $total_view_person <= $value['total_view_person'] ? $value['total_view_person'] : $total_view_person;
                $total_view_page = $total_view_page <= $value['total_view_page'] ? $value['total_view_page'] : $total_view_page;
            }
            $view['list'] = $list;
            $view['json_list'] = json_encode($list);
            $view['total_view_person'] = $total_view_person;
            $view['total_view_page'] = $total_view_page;
        }
        return array(
            'amount' =>$amount,
            'order'  =>$order,
            'view'   =>$view
            );
    }

    //获取图表详情
    public function getDetail($left_time,$right_time)
    {
        $data = array();
        $data['historyCount'] = $this->stat_dao_model->getHistoryCount();
        $data['nearlyCount'] = $nearlyCount = $this->stat_dao_model->getNearlyCount($left_time,$right_time);
        if (!empty($nearlyCount)) {
            foreach ($nearlyCount as $key => $value) {
                $nearlyCount[$key]['date'] = date('m-d',strtotime($value['date']));
            }
        }
        $data['json_nearlyCount'] = json_encode($nearlyCount);
        return $data;
    }


}
/*
insert into st_day_status (date,mid,day_views_person,day_views_page,day_order_num,day_order_amount) 
values
('2015-07-07',0,1700,17000,900,10300),
('2015-07-08',0,1100,11000,1100,20000),
('2015-07-09',0,3000,30000,960,40000),
('2015-07-10',0,1300,13000,1580,30000),
('2015-07-11',0,1400,14000,680,43000),
('2015-07-12',0,2500,25000,1000,30000),
('2015-07-13',0,2000,30000,1100,11000),
('2015-07-14',0,1700,13000,1010,11000),
('2015-07-15',0,1800,18000,1300,15000),
('2015-07-16',0,2100,21000,1400,14000),
('2015-07-17',0,3350,21500,810,14100),
('2015-07-18',0,2800,28000,1220,12200),
('2015-07-19',0,4400,50000,830,14999),
('2015-07-20',0,2300,23000,1240,10400),
('2015-07-21',0,2200,22000,1050,12500);
*/