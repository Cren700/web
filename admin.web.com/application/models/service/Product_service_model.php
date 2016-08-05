<?php
class Product_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/catalog_dao_model');
        $this->load->model('dao/product_dao_model');
    }

    public function lists($type, $keyword, $p, $num)
    {
        $get = array(
            'mid'       => encryptId($this->mid),
            'p'         => $p ? : 1,
            'num'       => $num ? : 5
        );

        if($type && $keyword)
        {
            $get['type'] = $type;
            $get['keyword'] = $keyword;
            $data = $this->myCurl('item', 'search', $get);
        }
        else
        {
            $data = $this->myCurl('item', 'lists', $get);
        }

        $data['data']['p'] = $get['p'];
        $data['data']['num'] = $get['num'];

        if(isset($data['data']['total'])){
            $data['data']['totalPage'] = ceil($data['data']['total'] / $get['num']);
        }else{
            $data['data']['totalPage'] = 0;
        }


        return $data['data'];
    }

    public function excel($type, $keyword)
    {
        $get = array(
            'mid'       => encryptId($this->mid),
            'p'         => 1,
            'num'       => 10000
        );

        if($type && $keyword)
        {
            $get['type'] = $type;
            $get['keyword'] = $keyword;
            $data = $this->myCurl('item', 'search', $get);
        }
        else
        {
            $data = $this->myCurl('item', 'lists', $get);
        }
// print_r($data);exit();
        $excel[] = array('id', '名称', '主图', '链接', 'sku', '特性', '原价', '现价', '库存', '是否上架','skuId');
        foreach($data['data']['list'] as $list)
        {
            foreach($list['type'] as $i => $type)
            {
                if($i == 0)
                {
                    $excel[] = array($list['id'], $list['name'], $list['image'], "www.irulu.com".buildNiceProductUrl($list), $type['uniq'], join(',', $type['type']), $type['price'], $type['discountPrice'], $type['stock'], $type['status'],$type['id']);
                }
                else
                {
                    $excel[] = array('', '', '', '', $type['uniq'], join(',', $type['type']), $type['price'], $type['discountPrice'], $type['stock'], $type['status'],$type['id']);
                }
            }
        }
        require_once APPPATH.'third_party/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setTitle('sheet1');

        // 从A1开始填充
        $objPHPExcel->getActiveSheet()->fromArray($excel, NULL, 'A1');

        // 设置默认字体及大小
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体')->setSize(12);

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="product-info-'.date('YmdHi').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        // 保存为Office Execl 2007格式
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function add()
    {
        $data['catalog'] = $this->catalog_dao_model->getCatalogListByPid(0);
        return $data;
    }

    public function addHandle($name, $skus, $uniq, $price, $discountPrice, $stock, $sku_type, $image, $catalog_id, $extra_id, $stdname, $stdcontent, $description, $descriptionApp, $tag, $deliveryFee, $deliveryTime, $min, $max, $device, $descText, $seoKeyword, $seoDescription)
    {
        $skus = is_array($skus) ? $skus : array();
        $uniq = is_array($uniq) ? $uniq : array();
        $price = is_array($price) ? $price : array();
        $discountPrice = is_array($discountPrice) ? $discountPrice : array();
        $stock = is_array($stock) ? $stock : array();
        $image = is_array($image) ? $image : array();
        $stdname = is_array($stdname) ? $stdname : array();
        $stdcontent = is_array($stdcontent) ? $stdcontent : array();

        // 格式化产品规格
        $standard = $this->_formatStandard($stdname, $stdcontent);

        // 配送时间
        switch($deliveryTime)
        {
            case 1:
                $deliveryTimeAll = '05~10';
                break;
            case 2:
                $deliveryTimeAll = '07~14';
                break;
            case 3:
                $deliveryTimeAll = '10~15';
                break;
            case 4:
                $deliveryTimeAll = '14~21';
                break;
            case 5:
                $deliveryTimeAll = '21~28';
                break;
            case 6:
                $deliveryTimeAll = sprintf("%-2d~%-2d", $min, $max);
                break;
            default:
                $deliveryTimeAll = '05~10';
                break;
        }

        // 产品信息
        $prod = array(
            'mid'               => $this->mid, // 商家id
            'name'              => $name, // spu名称
            'image'             => $image, // spu图片
            'description'       => $description, // 描述
            'app_description'   => $descriptionApp, // 手机端描述
            'tag'               => explode(',', $tag), // 产品标签
            'catalog_id'        => $catalog_id, // 类别id
            'extra_catalog_id'  => $extra_id,
            'standard'          => $standard, // 规格
            'service'           => 'no',// 服务标准
            'delivery_fee'      => $deliveryFee, // 配送费用
            'delivery_time'     => $deliveryTimeAll, // 配送时间
            'device'            => $device,
            'status'            => 0,
            'descText'          => $descText,
            'seo_keywords'      => $seoKeyword,
            'seo_description'   => $seoDescription,
        );
        // 格式化sku信息
        $sku = array();
        foreach($skus as $i => $s)
        {
            $sku[] = array(
                'mid'                   => $this->mid, // 商家id
                'uniqid'                => $uniq[$i],
                'sku'                   => $s, // sku
                'image'                 => array(), // sku图片
                'price'                 => floatval($price[$i]), // 价格
                'discount_price'        => floatval($discountPrice[$i]), // PC价格
                'app_discount_price'    => floatval($price[$i]), // APP价格
                'stock'                 => intval($stock[$i]), // 库存
            );
        }

        $inp = array(
            'skuType'       => $sku_type, // sku名称
            'prod'          => $prod, // spu信息
            'sku'           => $sku, // sku信息
        );

        $inp = json_encode($inp);
        $ret = $this->myCurl('item', 'add', $inp, true);
        isset($ret['msg']) || $ret['msg'] = '添加成功';
        $ret['data'] = '/product/lists';
        return $ret;
    }

    public function modify($id)
    {
        $id = decryptId($id);
        $info = $this->product_dao_model->getProductInfoById($id);

        $sku = $this->product_dao_model->getProductSkuInfoByProductid($id);//print_r($sku);exit();
        $remmendSku = $this->myCurl('order','getProductIds',array('id'=>encryptId($id)));//print_r($remmendSku);exit();
        if (isset($remmendSku['data']['list']))
        {
            $remmendSku = _array_keyst($remmendSku['data']['list'], 'skuId');
        }

        $delivery_time = explode('~', $info['delivery_time']);

        $info = array(
            'id'                => encryptId($info['id']),
            'name'              => $info['name'],
            'image'             => $info['image'],
            'imageFull'         => getImageFullPath($info['image']),
            'tag'               => join(',', $info['tag']),
            'skuType'           => $info['sku_type'],
            'deliveryFee'       => $info['delivery_fee'],
            'min'               => isset($delivery_time[0]) ? $delivery_time[0] : 0,
            'max'               => isset($delivery_time[1]) ? $delivery_time[1] : 0,
            'description'       => $info['description'],
            'descriptionApp'    => $info['app_description'],
            'standard'          => $info['standard'],
            'device'            => $info['device'],
            'descText'          => $info['descText'],
            'seoDescription'    => $info['seo_description'],
            'seoKeywords'       => $info['seo_keywords'],
            'seoDescription'    => isset($info['seo_description']) ? $info['seo_description'] : "",
            'seoKeywords'       => isset($info['seo_keywords']) ? $info['seo_keywords'] : "",
            'preGiftSkuIds'     => isset($info['pre_gift_sku_ids']) ? join(",",$this->product_dao_model->getUniqIdsByIds($info['pre_gift_sku_ids'])) : "",
            'giftSkuIds'       => isset($info['gift_sku_ids']) ? join(",",$this->product_dao_model->getUniqIdsByIds($info['gift_sku_ids'])) : ""
        );
        $list = array();
        foreach($sku as $u)
        {
            $recommendPrice = 0;
            $enc_skuId = encryptId($u['id']);
            if(isset($remmendSku[$enc_skuId]))
            {
                $recommendPrice = $remmendSku[$enc_skuId]['type'] == 1 ? $remmendSku[$enc_skuId]['discount']*$u['price'] : $remmendSku[$enc_skuId]['discountPrice'];
            }
            $list[] = array(
                'id'                => encryptId($u['id']),
                'uniq'              => $u['uniqid'],
                'sku'               => explode(',', $u['sku']),
                'image'             => json_decode($u['image'], true),
                'imageFull'         => getImageFullPath($u['image']),
                'price'             => $u['price'],
                'discountPrice'     => $u['discount_price'],
                'recommendPrice'    => $recommendPrice,
                'appDiscountPrice'  => $u['app_discount_price'],
                'stock'             => $u['stock']
            );
        }
        return array('info' => $info, 'list' => $list);
    }

    public function modifyHandle($id, $skuid, $name, $tag, $deliveryFee, $size,
                                 $color, $stock, $price, $discountPrice, $appDiscountPrice,
                                 $stdname, $stdcontent, $cover, $proimg, $description,
                                 $descriptionApp, $min, $max, $device, $descText, $seoKeyword, $seoDescription
                                 ,$giftSkuIds,$preGiftSkuIds)
    {
        $skuid = is_array($skuid) ? $skuid : array();
        $size = is_array($size) ? $size : array();
        $color = is_array($color) ? $color : array();
        $stock = is_array($stock) ? $stock : array();
        $price = is_array($price) ? $price : array();
        $discountPrice = is_array($discountPrice) ? $discountPrice : array();
        $appDiscountPrice = is_array($appDiscountPrice) ? $appDiscountPrice : array();
        $stdname = is_array($stdname) ? $stdname : array();
        $stdcontent = is_array($stdcontent) ? $stdcontent : array();
        $device = is_array($device) ? $device : array();
        // $giftSkuIds
        $giftSkuIds=explode(",",$giftSkuIds);
        $giftSkuIds = is_array($giftSkuIds) ? $this->product_dao_model->getSkuIdBySkuUniqIds($giftSkuIds) : array();

        $preGiftSkuIds =explode(",",$preGiftSkuIds);
        $preGiftSkuIds = is_array($preGiftSkuIds) ? $this->product_dao_model->getSkuIdBySkuUniqIds($preGiftSkuIds) : array();

        //print_r($giftSkuIds);exit;
        $tmp = array();
        foreach ($cover as $value)
        {
            if($value != '')
            {
                $tmp[] = $value;
            }
        }
        $cover = $tmp;

        $prod = array(
            'mid'               => $this->mid,
            'name'              => $name,
            'image'             => $cover,
            'description'       => $description,
            'app_description'   => $descriptionApp,
            'tag'               => explode(',', $tag),
            'standard'          => $this->_formatStandard($stdname, $stdcontent),
            'service'           => '',
            'delivery_fee'      => $deliveryFee,
            'device'            => $device,
            'descText'          => $descText,
            'delivery_time'     => '05~10',
            'seo_description'   => $seoDescription,
            'seo_keywords'      => $seoKeyword,
            'gift_sku_ids'      => $giftSkuIds,
            'pre_gift_sku_ids'     => $preGiftSkuIds
        );
        $sku = array();
        $skuInfo = $this->_formatSkuInfo($size, $color);
        foreach($skuid as $i => $idd)
        {
            if(isset($price[$i]) && $price[$i] && isset($skuInfo['sku'][$i]))
            {
                $sku[] = array(
                    'id'                    => $idd,
                    'mid'                   => $this->mid,
                    'sku'                   => $skuInfo['sku'][$i],
                    'image'                 => isset($proimg[$i]) ? $proimg[$i] : array(),
                    'price'                 => $price[$i],
                    'discount_price'        => isset($discountPrice[$i]) && $discountPrice[$i] ? $discountPrice[$i] : $price[$i],
                    'app_discount_price'    => isset($appDiscountPrice[$i]) && $appDiscountPrice[$i] ? $appDiscountPrice[$i] : $appDiscountPrice[$i] * 0.98,
                    'stock'                 => isset($stock[$i]) && $stock[$i] ? $stock[$i] : 0
                );
            }
        }

        $sku_type = $skuInfo['type'];
        $inp = array(
            'id'            => $id,
            'skuType'       => $sku_type, // sku名称
            'prod'          => $prod, // spu信息
            'sku'           => $sku, // sku信息
        );
        $inp = json_encode($inp);
        $ret = $this->myCurl('item', 'modify', $inp, true);

        isset($ret['msg']) || $ret['msg'] = '修改成功';
        $ret['data'] = '/product/modify?id=' . $id;
        return $ret;
    }

    public function addSku($prodId, $uniqid, $stock, $price, $color, $size)
    {
        $sku_type = $sku_info = '';
        if($size && $color)
        {
            $sku_type = 'Size,Color';
            $sku_info = $size.','.$color;
        }
        else if($size)
        {
            $sku_type = 'Size';
            $sku_info = $size;
        }
        else
        {
            $sku_type = 'Color';
            $sku_info = $color;
        }
        $sku = array(
            'mid'                   => $this->mid, // 商家id
            'uniqid'                => $uniqid,
            'skuType'               => $sku_type,
            'sku'                   => $sku_info, // sku
            'image'                 => array(), // sku图片
            'price'                 => $price, // 价格
            'discount_price'        => $price, // PC价格
            'app_discount_price'    => $price, // APP价格
            'stock'                 => $stock, // 库存
            'activity_id'           => 0 // 参与活动的活动id
        );
        $inp = array(
            'prodId'        => $prodId,
            'sku'           => $sku
        );
        $inp = json_encode($inp);

        $ret = $this->myCurl('item', 'addSku', $inp, true);
        $ret['msg'] = isset($ret['msg']) ? $ret['msg'] : '添加成功';
        $ret['data'] = '/product/lists';
        return $ret;
    }

    public function cate($cate)
    {
        $catalog = $this->catalog_dao_model->getAllCatalogList();
        $catalog = _node_merge($catalog);

        $cat = array();
        foreach($catalog as $cata)
        {
            if($cata['id'] == $cate)
            {
                $cat = $cata['child'];
                break;
            }
        }
        $html = '';
        foreach($cat as $i => $v)
        {
            $html .= "<label><input type='radio'".($i == 0 ? 'checked' : '')." name='extra' value='{$v['id']}'>{$v['name']}</label>";
        }
        return array('code' => 0, 'data' => $html);
    }

    // 1,2,3|4,5,6|7,8,9
    public function getSkuForm($title, $ids)
    {
        $html = '';
        if($title and $ids)
        {
            $title = explode(',', $title);
            $ids = explode('|', $ids);

            $catalog = array();
            foreach($ids as $id)
            {
                $tp = explode(',', $id);
                $catalog[] = $tp;
            }

            $html = $this->_getProductCata($title, $catalog);
        }
        return array('code' => 0, 'data' => $html);
    }

    public function stat($id, $value, $field)
    {
        switch($field)
        {
            case 1:
                // 更新spu运费
                $data = array(
                    'id'        => $id,
                    'fee'       => floatval($value)
                );
                $ret = $this->myCurl('item', 'deliveryfee', $data, true);
                $ret['data'] = number_format($value, 2);
                break;
            case 2:
                // 更新sku的价格
                $data = array(
                    'id'        => $id,
                    'price'     => floatval($value),
                    'orprice'   => -1,
                    'stock'     => -1,
                    'status'    => -1
                );
                $ret = $this->myCurl('item', 'statstockprice', $data, true);
                $ret['data'] = number_format($value, 2);
                break;
            case 3:
                // 更新sku的库存
                $data = array(
                    'id'        => $id,
                    'price'     => -1,
                    'orprice'   => -1,
                    'stock'     => intval($value),
                    'status'    => -1
                );
                $ret = $this->myCurl('item', 'statstockprice', $data, true);
                $ret['data'] = intval($value);
                break;
            case 4:
                // 更新sku上下架状态
                $data = array(
                    'id'        => $id,
                    'price'     => -1,
                    'orprice'   => -1,
                    'stock'     => -1,
                    'status'    => intval($value) == 0 ? 0 : 1
                );
                $ret = $this->myCurl('item', 'statstockprice', $data, true);
                break;
            case 5:
                // 更新原价
                $data = array(
                    'id'        => $id,
                    'price'     => -1,
                    'orprice'   => floatval($value),
                    'stock'     => -1,
                    'status'    => -1
                );
                $ret = $this->myCurl('item', 'statstockprice', $data, true);
                $ret['data'] = number_format($value, 2);
                break;
            default:
                $ret = array('code' => 1);
                break;
        }

        if(!isset($ret['code']))
        {
            $ret['code'] = 1;
        }
        return $ret;
    }

    public function changeDiscountPrice($id,$price)
    {
        $data = array(
            'id'    => $id,
            'price' => $price,
            'mid'   => $this->mid
        );
        $res = $this->myCurl('item','changeDiscountPrice',$data,true);
        return $res;
    }

    /**
     * 根据属性排列组合商品SKU
     * @param  array  $title   [description]
     * @param  array  $catalog [description]
     * @return [type]          [description]
     */
    private function _getProductCata($title, $catalog)
    {
        $catalog = $this->_getProductCataVar($catalog);
        $html = '<ul><li class="new-block3-list clearfix"><input type="hidden" name="type" value="' . htmlspecialchars(join(',', $title), ENT_QUOTES) . '">';

        foreach($title as $tit)
        {
            $html .= '<span>'.$tit.'</span>';
        }
        $html .= '<span>唯一ID(SKU)</span><span>原价</span><span>现价</span><span>数量</span><span>操作</span></li>';

        foreach($catalog as $i => $cata)
        {
            $cata = is_array($cata) ? $cata : array($cata);
            $html .= '<li class="clearfix"><input type="hidden" name="skus[]" value="' . htmlspecialchars(join(',', $cata), ENT_QUOTES) . '" />';
            foreach($cata as $cat)
            {
                $html .= '<span>'.$cat.'</span>';
            }

            $html .= '<span class="one-id"><input type="text" name="uniq[]" placeholder="如：ISUW080901"></span><span class="one-nums"><input type="text" name="price[]" placeholder="如：$228"></span><span class="one-nums"><input type="text" name="discountPrice[]" placeholder="如：$227.9"></span><span class="one-nums"><input type="text" name="stock[]" placeholder="如：25"></span><span class="one-delete">删除</span></li>';
        }
        $html .= '</ul>';
        return $html;
    }

    /**
     * 递归处理商品属性组合 依次将最后两个数组合并成一个数组
     * @param  array  $arr [description]
     * @return [type]      [description]
     */
    private function _getProductCataVar($arr)
    {
        $maxIndex = count($arr) - 1;
        if($maxIndex > 0)
        {
            $preIndex = $maxIndex - 1;

            $arr[$preIndex] = $this->_merge2Array($arr[$preIndex], $arr[$maxIndex]);
            unset($arr[$maxIndex]);

            return $this->_getProductCataVar($arr);
        }
        else
        {
            return $arr[0];
        }
    }

    private function _merge2Array($arr1, $arr2)
    {
        $newArr = array();
        foreach($arr1 as $ar1)
        {
            foreach($arr2 as $ar2)
            {
                $newArr[] = array_merge((array)$ar1, (array)$ar2);
            }
        }
        return $newArr;
    }

    private function _formatStandard($stdname, $stdcontent)
    {
        // 格式化产品规格
        $standard = array();
        foreach($stdname as $i => $std)
        {
            if(isset($stdcontent[$i]) && $stdcontent[$i] != '')
            {
                $standard[] = array(
                    'name'      => $std,
                    'content'   => $stdcontent[$i]
                );
            }
        }
        return $standard;
    }

    public function _formatSkuInfo($size, $color)
    {
        $sku = array();
        $type = '';
        if($size && $color)
        {
            foreach($size as $i => $s)
            {
                if(isset($color[$i]) && $color[$i])
                {
                    $sku[] = $s.','.$color[$i];
                }
            }
            $type = 'Size,Color';
        }
        else if($size)
        {
            foreach($size as $i => $s)
            {
                $sku[] = $s;
            }
            $type = 'Size';
        }
        else
        {
            foreach($color as $i => $s)
            {
                $sku[] = $s;
            }
            $type = 'Color';
        }
        return array(
            'type'      => $type,
            'sku'       => $sku
        );
    }

    /***
     * 置空产品的Gift列表
     */
    public function clearProductGift($promotionId)
    {
       return $this->product_dao_model->clearProductGift($promotionId);
    }


    public function pre2Product($promotionId)
    {
        return $this->product_dao_model->pre2Product($promotionId);
    }
}
