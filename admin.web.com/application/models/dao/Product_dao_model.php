<?php
class Product_dao_model extends MY_Model
{
    private $_product_table = 'wf_product';
    private $_product_sku_table = 'wf_product_sku';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mongos');
    }

    public function getProductInfoById($id)
    {
        $where = array('id' => $id);
        return $this->mongos->findOne($this->_product_table, $where);
    }

    /**
     * @param $uniqIds
     * @return mixed
     */
    public function getSkuIdBySkuUniqIds($uniqIds)
    {
        $arr =  array();
        if($uniqIds!=null&&count($uniqIds)>0) {
            $con = "'" . join("','", $uniqIds) . "'";
            $sql = "SELECT id FROM {$this->_product_sku_table} WHERE `uniqid` in ({$con})";
            $query = $this->db->query($sql);
            $res = $query->result_array();
            $arr = array();
            foreach ($res as $data) {
                $arr[] = $data["id"];
            }
        }
        return $arr;
    }

    /**
     * @param $ids
     * @return mixed
     */
    public function getUniqIdsByIds($ids)
    {
        $arr =  array();
        if($ids!=null&&count($ids)>0)
        {
            $ids = join(',',$ids);
            $sql = "SELECT uniqid FROM {$this->_product_sku_table} WHERE `id` in ({$ids})";
            $query = $this->db->query($sql);
            $res =  $query->result_array();
            foreach($res as $data)
            {
                $arr[] = $data["uniqid"];
            }
        }
        return $arr ;
    }

    public function getProductSkuInfoByProductid($id)
    {
        $sql = "SELECT * FROM {$this->_product_sku_table} WHERE `product_id` = {$id}";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /***
     * 将产品下的giftList置空产品的Gift列表
     */
    public function clearProductGift($promotionId)
    {
        return $this->mongos->update(
            $this->_product_table,
            array("gift_sku_ids"=>array()),
            array("gift_sku_ids"=>array('$exists'=>true))
            );
    }

    /**
     * @desc 将产品预览数据同步到赠品
     * @param $promotionId
     * @return mixed
     */
    public function pre2Product($promotionId)
    {
        $field= array("pre_gift_sku_ids","id");
        $ret  = $this->mongos->find( $this->_product_table, array("pre_gift_sku_ids"=>array('$exists'=>true)),$field );
        foreach($ret as $data)
        {
            $id=$data["id"];
            $gift= $data["pre_gift_sku_ids"];
            $this->mongos->update( $this->_product_table,
                array("gift_sku_ids"=>$gift),
                array("id"=>$id));
        }
        return 1;
    }

}