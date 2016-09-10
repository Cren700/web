<?php
class Product extends BaseController
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->model('service/product_service_model');
    }

    public function lists()
    {
        $type = intval($this->input->get('type'));
        $keyword = trim($this->input->get('keyword'));
        $p = intval($this->input->get('p'));
        $num = intval($this->input->get('num'));
        $data = $this->product_service_model->lists($type, $keyword, $p, $num);
        $this->smarty->assign('list', isset($data['list']) ? $data['list'] : array());
        $this->smarty->assign('type', $type);
        $this->smarty->assign('keyword', $keyword);
        $this->smarty->assign('total', isset($data['total']) ? $data['total'] : 0);
        $this->smarty->assign('p', $data['p']);
        $this->smarty->assign('num', $data['num']);
        $this->smarty->assign('totalPage', $data['totalPage']);
        $this->smarty->display('product/lists.tpl');
    }

    public function excel()
    {
        $type = intval($this->input->get('type'));
        $keyword = trim($this->input->get('keyword'));
        $data = $this->product_service_model->excel($type, $keyword);
    }

    public function addSku()
    {
        $prodId = intval($this->input->post('prodId'));
        $uniqid = trim($this->input->post('uniqid'));
        $stock = intval($this->input->post('stock'));
        $price = floatval($this->input->post('price'));
        $color = trim($this->input->post('color'));
        $size = trim($this->input->post('size'));

        // p($this->input->post());
        $data = $this->product_service_model->addSku($prodId, $uniqid, $stock, $price, $color, $size);
        $this->outputResponse($data);
    }

    public function add()
    {
//        $data = $this->product_service_model->add();
//        $this->smarty->assign('catalog', $data['catalog']);
        $this->smarty->display('product/detail.tpl');
    }

    public function addHandle()
    {
        $name = trim($this->input->post('name')); // spu名字 string
        $skus = $this->input->post('skus'); // suk array string
        $uniq = $this->input->post('uniq'); // sku唯一id array string
        $price = $this->input->post('price'); // sku原价 array float
        $discountPrice = $this->input->post('discountPrice'); // sku现价 array float
        $stock = $this->input->post('stock'); // sku库存 array int
        $type = trim($this->input->post('type')); // sku属性 string
        $image = $this->input->post('image'); // spu图片 array string
        $catalog_id = intval($this->input->post('catalog')); // spu产品类别 int
        $extra_id = intval($this->input->post('extra')); // spu产品类别 int
        $stdname = $this->input->post('stdname'); // spu规格名字 array string
        $stdcontent = $this->input->post('stdcontent'); // spu规格值 array string
        $description = trim($this->input->post('description', false)); // 产品PC端描述 string
        $descriptionApp = trim($this->input->post('descriptionApp', false)); // 产品APP端描述 string
        $tag = trim($this->input->post('tag')); // 产品标签 string
        $deliveryFee = floatval($this->input->post('deliveryFee')); // 产品配送费用 float
        $deliveryTime = intval($this->input->post('deliveryTime')); // 产品配送时间 intval
        $max = intval($this->input->post('max')); // 产品配送最小时间 int
        $min = intval($this->input->post('min')); // 产品配送最大时间 int
        $device = $this->input->post('device');
        $descText = $this->input->post('descText');
        $seoKeyword = $this->input->post('seoKeyword');
        $seoDescription = $this->input->post('seoDescription');

        $data = $this->product_service_model->addHandle($name, $skus, $uniq, $price, $discountPrice, $stock, $type, $image, $catalog_id, $extra_id, $stdname, $stdcontent, $description, $descriptionApp, $tag, $deliveryFee, $deliveryTime, $min, $max, $device, $descText, $seoKeyword, $seoDescription);
        $this->outputResponse($data);
    }

    public function modify()
    {
        $id = intval($this->input->get('id'));
        $data = $this->product_service_model->modify($id);
// p($data);
        $this->smarty->assign('info', $data['info']);
        $this->smarty->assign('list', $data['list']);
        $this->smarty->display('product/modify.tpl');
    }

    public function modifyHandle()
    {
        $id = intval($this->input->post('id')); // spu id
        $skuid = $this->input->post('skuid');
        $name = trim($this->input->post('name')); // spu名字 string
        $tag = trim($this->input->post('tag')); // 产品标签 string
        $deliveryFee = floatval($this->input->post('deliveryFee')); // 产品配送费用 float
        $size = $this->input->post('size'); // 产品尺寸
        $color = $this->input->post('color'); // 产品颜色
        $stock = $this->input->post('stock'); // sku库存 array int
        $price = $this->input->post('price'); // sku价格 array float
        $discountPrice = $this->input->post('discountPrice');
        $appDiscountPrice = $this->input->post('appDiscountPrice');
        $stdname = $this->input->post('stdname'); // spu规格名字 array string
        $stdcontent = $this->input->post('stdcontent');// spu规格值 array string
        $cover = $this->input->post('cover'); // spu图片 array string
        $proimg = $this->input->post('proimg'); // sku图片
        $description = $this->input->post('description', false); // 产品PC端描述 string
        $descriptionApp = $this->input->post('descriptionApp', false); // 产品APP端描述 string
        $min = intval($this->input->post('min')); // 产品配送时间 string
        $max = intval($this->input->post('max')); // 产品配送时间 string
        $device = $this->input->post('device');
        $descText = $this->input->post('descText');
        $seoKeyword = $this->input->post('seoKeyword');
        $seoDescription = $this->input->post('seoDescription');
        $giftSkuIds = $this->input->post('giftSkuIds');
        $preGiftSkuIds = $this->input->post('preGiftSkuIds');
        $data = $this->product_service_model->modifyHandle($id, $skuid, $name,
            $tag, $deliveryFee, $size, $color, $stock, $price, $discountPrice, $appDiscountPrice,
            $stdname, $stdcontent, $cover, $proimg, $description, $descriptionApp, $min, $max,
            $device, $descText, $seoKeyword, $seoDescription,$giftSkuIds,$preGiftSkuIds);
        $this->outputResponse($data);
    }

    public function cate()
    {
        $id = intval($this->input->get('id'));
        $data = $this->product_service_model->cate($id);
        echo json_encode($data);
    }

    public function getSkuForm()
    {
        // $title = 'size,color';
        // $ids = "19',20'|black,white";
        $title = trim($this->input->get('title'));
        $ids = trim($this->input->get('ids'));
        $data = $this->product_service_model->getSkuForm($title, $ids);
        echo json_encode($data);
    }

    public function stat()
    {
        $id = intval($this->input->post('id'));
        $value = trim($this->input->post('value'));
        $field = intval($this->input->post('field'));
        $data = $this->product_service_model->stat($id, $value, $field);
        echo json_encode($data);
    }

    public function changeDiscountPrice()
    {
        $id = intval($this->input->post('id'));//echo json_encode(decryptId($id));exit();
        $price = trim($this->input->post('price'));
        $data = $this->product_service_model->changeDiscountPrice($id,$price);
        echo json_encode($data);
    }

    /***
     * 置空产品的Gift列表
     */
    public function clearProductGift()
    {
        $promotionId = intval($this->input->get("promotionId"));
        $data = $this->product_service_model->clearProductGift($promotionId);
        $ret= array();
        $ret["code"]= 1;
        $ret['msg'] = '您已成功置空商品赠品!';
        $this->outputResponse($ret);
    }


    /***
     * 将商品预售转移到赠品中
     */
    public function pre2Product()
    {
        $promotionId = intval($this->input->get("promotionId"));
        $data = $this->product_service_model->pre2Product($promotionId);
        $ret= array();
        $ret["code"]= 1;
        $ret['msg'] = '操作成功!';
        $this->outputResponse($ret);
    }
}