<?php
class Service_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/service_dao_model');
    }

    public function lists($status, $p)
    {
        $status = in_array($status, array(1, 2 , 0)) ? $status : 1;
        $where['status'] = $status == 1 || $status == 2 ? $status : array('$in' => array(0, 3));
        $p = $p > 0 ? $p : 1;
        $count = $this->service_dao_model->getUserServiceMessageNumByWhere($where);
        $totalPage = ceil($count / 20);
        $p = $p > $totalPage ? $totalPage : $p;

        $data = $this->service_dao_model->getUserServiceMessageListByWhere($where, $p);
        $reason = $this->service_dao_model->getAllServiceReason();
        $reason = _array_keyst($reason, '_id');

        $ids = array_columns($data, 'userid');
        $ids = array_unique($ids);

        $user_info = $this->myCurl('account', 'getUserInfoByIds', array('ids' => join(',', $ids)));
        $user_info = isset($user_info['data']['list']) ? $user_info['data']['list'] : array();
        $user_info = _array_keyst($user_info, 'uid');


        foreach($data as $i => $v)
        {
            $data[$i]['id'] = $v['_id'];
            $data[$i]['reason'] = $reason[$v['reason_id']]['name'];
            if(isset($user_info[encryptId($v['userid'])]))
            {
                $data[$i]['userInfo'] = $user_info[encryptId($v['userid'])];
            }
            unset($data[$i]['_id']);
        }

        $tmp = array();
        foreach($reason as $in)
        {
            $tmp[] = array(
                'id'        => $in['_id'],
                'name'      => $in['name']
            );
        }

        return array(
            'data'      => $data,
            'reason'    => $tmp,
            'status'    => $status,
            'page'      => $p,
            'total'     => $count,
            'totalPage' => ceil($count / 20)
        );
    }

    public function serv($id)
    {
        $info = $this->myCurl('order', 'getServiceListById', array('servId' => $id));

        $info = isset($info['data']) ? $info['data'] : array();
        $info['orderInfo'] = $this->myCurl('order', 'detailMerchant', array('orderid' => $info['question']['orderId'], 'mid' => encryptId($this->mid)));
        $info['orderInfo'] = $info['orderInfo']['data'];

        $info['merchantInfo'] = array(
            'id'        => $this->session->userdata('id'),
            'name'      => $this->session->userdata('name')
        );

        $info['userInfo'] = $this->myCurl('account', 'getUserInfoById', array('uid' => $info['question']['userid']));

        $info['userInfo'] = $info['userInfo']['data'];

        $info['tag'] = $this->service_dao_model->getUserServiceTagByServId($id);

        return $info;
    }

    public function tag($servId, $content)
    {
        $ret = array('code' => 0, 'msg' => '添加失败');
        $info = $this->service_dao_model->getUserServiceMessageInfoById($servId);
        if($content and $info and ($info['status'] == 1 or $info['status'] == 2))
        {
            // 标签最大为16个字
            $ret = array('code' => 1, 'msg' => '标签最大为16个字');
            if(mb_strlen($content, 'utf-8') <= 18)
            {
                if($this->service_dao_model->insertUserServiceTag($servId, $content))
                {
                    $ret = array('code' => 0);
                }
                else
                {
                    $ret = array('code' => 0, 'msg' => '添加失败');
                }
            }
        }
        return $ret;
    }

    public function status($servId, $status)
    {
        $info = $this->service_dao_model->getUserServiceMessageInfoById($servId);

        if(($status == 0 or $status == 3) and $info and ($info['status'] == 1 or $info['status'] == 2))
        {
            $data = array('status' => $status);
            $this->service_dao_model->updateUserServiceMessageInfoById($servId, $data);
        }
    }

    public function publishMessage($servId, $content)
    {
        $info = $this->service_dao_model->getUserServiceMessageInfoById($servId);
        $ret = array('code' => 1, 'msg' => '售后已关闭，无法进行回复');
        if($info and ($info['status'] == 1 or $info['status'] == 2))
        {
            $ret = array('code' => 1, 'msg' => '内容最小1，最大为200个字');
            if(mb_strlen($content, 'utf-8') > 0 and mb_strlen($content, 'utf-8') < 201)
            {
                $ret = array('code' => 1, 'msg' => '回复失败');
                $data = array(
                    'mid'               => encryptId($this->mid),
                    'servId'            => $servId,
                    'content'           => $content,
                    'image'             => '',
                );
                $ret = $this->myCurl('order', 'serv', $data, true);
            }
        }
        $ret['data'] = time();
        return $ret;
    }
}