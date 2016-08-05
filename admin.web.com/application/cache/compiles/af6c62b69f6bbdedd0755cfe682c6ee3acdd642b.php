<?php /* Smarty version Smarty-3.1.19, created on 2016-01-20 10:10:17
         compiled from "application/views/zh_cn/order/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1053002280569eec89454062-59229796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91b87f1d63d2c218d00753466331f5505179d53' => 
    array (
      0 => 'application/views/zh_cn/order/index.tpl',
      1 => 1450686972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1053002280569eec89454062-59229796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'data' => 0,
    'page' => 0,
    'totalPage' => 0,
    'stype' => 0,
    'search' => 0,
    'value' => 0,
    'logistics' => 0,
    'v' => 0,
    'reasonList' => 0,
    'reason' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569eec894e5026_14045694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569eec894e5026_14045694')) {function content_569eec894e5026_14045694($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data0/htdocs/merchant.imt.com/application/third_party/smarty/plugins/modifier.date_format.php';
?><html>
<head>
    <meta charset="utf-8">
    <title>订单管理</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>
</head>
<style>
    .mCSB_container{margin-right:0;}
</style>
<body>
    <!-- 主内容 start-->
    <div class="wrapper">
        <div class="wrappper-block clearfix">
            <!-- 公用头部 start-->
            <?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!-- 公用头部 end-->
            <!-- 左边导航 start-->
            <?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!-- 左边导航 end-->
            <!-- 右边列表信息 start -->
            <div class="wrap-table-content">
                <div class="wrap-right">
                    <div class="wrap-right-parent">
                        <div class="wrap-right-content">
                            <div class="wrap-right-title">
                                <h2>所有订单</h2>
                                <ul class="clearfix">
                                    <li <?php if ($_smarty_tpl->tpl_vars['type']->value==''||$_smarty_tpl->tpl_vars['type']->value=="index") {?>class='current'<?php }?>><a href="/order" >所有订单</a></li>
                                    <li><a href="/order?type=unpaid">等待买家付款</a></li>
                                    <li><a href="/order?type=waitDelivery">等待发货</a></li>
                                    <li><a href="/order?type=delivered">已发货</a></li>
                                    <li><a href="/order?type=successOrder">成功订单</a></li>
                                    <li><a href="/order?type=closeOrder">关闭订单</a></li>
                                    <li><a href="/order/undeal">未处理订单</a></li>
                                </ul>
                            </div>
                            <div class="wrap-right-word clearfix">
                                <!-- <div class="wrap-word-left">
                                    <span><?php echo count($_smarty_tpl->tpl_vars['data']->value);?>
个订单</span>
                                    <p>导出选中的单</p>
                                </div> -->
                                <div class="wrap-word-right">
                                    <div class="wrap-word-page clearfix">
                                        <div class="wrap-word-pagechange">
                                            <div class="wrap-page-show"><code><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</code>/<span><?php echo $_smarty_tpl->tpl_vars['totalPage']->value;?>
</span>页</div>
                                            <ul class="wrap-page-list">
                                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['name'] = 'foo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['totalPage']->value+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['foo']['total']);
?>
                                                <li><a href="/order?p=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
</a></li>
                                                <?php endfor; endif; ?>
                                            </ul>
                                        </div>
                                        <div class="wrap-word-pagetap">
                                            <a href="<?php if ($_smarty_tpl->tpl_vars['page']->value==1) {?>javascript:;<?php } else { ?>/order?p=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
<?php }?>" class="word-pagetap-prev">上一页</a>
                                            <a href="/order?p=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" class="word-pagetap-next">下一页</a>
                                        </div>
                                    </div>
                                    <form action="/order" method='get' id="search">
                                        <div class="wrap-word-search clearfix">
                                            <div class="wrap-search-id">
                                                <select name='stype' class="wrap-id-show wrap-page-common">
                                                    <option value='orderid' <?php if ($_smarty_tpl->tpl_vars['stype']->value==''||$_smarty_tpl->tpl_vars['stype']->value=='orderid') {?>selected<?php }?>>订单ID</option>
                                                    <option value='email' <?php if ($_smarty_tpl->tpl_vars['stype']->value=="email") {?>selected<?php }?>>邮箱</option>
                                                    <option value='transactionid' <?php if ($_smarty_tpl->tpl_vars['stype']->value=="transactionid") {?>selected<?php }?>>交易号</option>
                                                    <option value='uid' <?php if ($_smarty_tpl->tpl_vars['stype']->value=="uid") {?>selected<?php }?>>买家ID</option>
                                                    <option value='username' <?php if ($_smarty_tpl->tpl_vars['stype']->value=="username") {?>selected<?php }?>>姓名</option>
                                                    <option value='logistics' <?php if ($_smarty_tpl->tpl_vars['stype']->value=="logistics") {?>selected<?php }?>>跟踪号</option>
                                                </select>
                                            </div>
                                            <div class="wrap-search-type">
                                                <button type='submit'><img src="/images/common/icon-search1.png" alt=""></button>
                                                <input type="text" name='search' placeholder="" value='<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
'>
                                                <input type="hidden" name='type' value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                                                <input type="hidden" name='submit' value='true'>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php if (count($_smarty_tpl->tpl_vars['data']->value)!=0) {?>
                            <div class="wrap-right-list">
                                <form action="">
                                    <ul>
                                        <li class="thead clearfix">
                                            <div class="trade-date">订单日期</div>
                                            <div class="order-id">订单ID</div>
                                            <div>订单状态</div>
                                            <div style="width:10%;">SKU</div>
                                            <div style="width:10%;">姓名</div>
                                            <div style="width:12%;">邮箱</div>
                                            <div style="width:10%;">电话</div>
                                            <div>国家</div>
                                            <div>标签</div>
                                            <div>总价</div>
                                            <div>付款类型</div>
                                            <div class="">交易日期</div>
                                            <div class="operatione-thead">操作</div>
                                        </li>
                                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                        <li class="clearfix" id='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'>
                                            <div class="trade-time trade-date list-float"style="text-align: center;">
                                                <label for=""><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['createTime'],'%Y/%m/%d %H:%M:%S');?>
</label>
                                            </div>
                                            <div class="order-number order-id list-float"><a href="/order/details?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
" style="color:#21aeff;"><?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
</a></div>
                                            <div class="order-status1 list-float"><?php echo getOrderStatus($_smarty_tpl->tpl_vars['value']->value['status']);?>
</div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><?php echo $_smarty_tpl->tpl_vars['value']->value['skus'];?>
</div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['firstName'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['lastName'];?>
</div>
                                            <div class="list-float" style="width:12%;word-break:break-all;text-align: center;"><a href="/order?stype=email&search=<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['email'];?>
&type=&submit=true"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['email'])===null||$tmp==='' ? "-" : $tmp);?>
</a></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['phone'])===null||$tmp==='' ? "-" : $tmp);?>
</div>
                                            <div class="list-float" style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['country'];?>
</div>
                                            <div class="list-float" style="text-align: center;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['value']->value['lable'])===null||$tmp==='' ? "-" : $tmp);?>
</div>
                                            <div class="list-float" style="text-align: center;">$ <?php echo number_format($_smarty_tpl->tpl_vars['value']->value['totalPrice'],2);?>
</div>
                                            <div class="list-float" style="text-align: center;"><?php if ($_smarty_tpl->tpl_vars['value']->value['payType']==1) {?>Paypal<?php } elseif ($_smarty_tpl->tpl_vars['value']->value['payType']==2) {?>信用卡<?php } else { ?>-<?php }?></div>
                                            <div class="list-float" style="text-align: center;">
                                                <label for=""><?php if ($_smarty_tpl->tpl_vars['value']->value['payTime']) {?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['payTime'],'%Y/%m/%d %H:%M:%S');?>
<?php } else { ?>-<?php }?></label>
                                            </div>
                                            <div class="operation-list list-float">
                                                <div class="wrap-page-common">操作</div>
                                                <ul class="window-btn">
                                                    <?php if ($_smarty_tpl->tpl_vars['value']->value['status']==1) {?>
                                                        <li><a href="/order/details?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">查看</a></li>
                                                        <li><a href="/order/linkmer?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">联系买家</a></li>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['value']->value['status']==2) {?>
                                                        <li><a href="/order/details?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">查看</a></li>
                                                        <li data-num=1 data-flag=true class='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'><a href="javascript:;">发货</a>
                                                        <li data-num=2 data-flag=true class='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'><a href="javascript:;">退款</a></li>
                                                        <li><a href="/order/linkmer?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">联系买家</a></li>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['value']->value['status']==3) {?>
                                                        <li><a href="/order/details?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">查看</a></li>
                                                        <li data-num=2 data-flag=true class='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'><a href="javascript:;">退款</a></li>
                                                        <li><a href="/order/linkmer?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">联系买家</a></li>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['value']->value['status']==4) {?>
                                                        <li><a href="/order/details?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">查看</a></li>
                                                        <li data-num=2 data-flag=true class='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'><a href="javascript:;">退款</a></li>
                                                        <li><a href="/order/linkmer?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">联系买家</a></li>
                                                    <?php } else { ?>
                                                        <li><a href="/order/details?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">查看</a></li>
                                                        <li><a href="/order/linkmer?orderid=<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
">联系买家</a></li>
                                                    <?php }?>
                                                    <li data-num=3 data-flag=true class='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'><a href="javascript:;">编辑发货地址</a></li>
                                                    <li data-num=4 data-flag=true class='<?php echo $_smarty_tpl->tpl_vars['value']->value['orderId'];?>
'><a href="javascript:;">修改订单状态</a></li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name='street_line1' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['address1'];?>
'>
                                            <input type="hidden" name='street_line2' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['address2'];?>
'>
                                            <input type="hidden" name='city' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['city'];?>
'>
                                            <input type="hidden" name='state' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['state'];?>
'>
                                            <input type="hidden" name='postal_code' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['zipCode'];?>
'>
                                            <input type="hidden" name='country' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['country'];?>
'>
                                            <input type="hidden" name='first_name' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['firstName'];?>
'>
                                            <input type="hidden" name='last_name' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['lastName'];?>
'>
                                            <input type="hidden" name='phone_number' value='<?php echo $_smarty_tpl->tpl_vars['value']->value['shoppingAddr']['phone'];?>
'>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div style="padding-top:30px; font-size:18px; color:red">
                                暂无相关数据
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 右边列表信息 end -->
        </div>
    </div>
    <!-- 主内容 end-->
    <!-- 弹窗 start-->
    <div class="window-wrap">
        <div class="window-wrap-common">
            <div class="window-wrap-head clearfix">
                <span>配送订单</span>
                <a href="javascript:;" class="window-close"><img src="../images/common/icon-close.png" alt=""></a>
            </div>
            <div class="window-wrap-body">
                <!-- 发货 -->
                <div class="window-body-common delivery-goods">
                    <form action="/order/dodeliveryorder" method="post" id='dodelivery'>
                        <div class="delivery-goods-block1 clearfix">
                            <span>配送服务提供商</span>
                            <div class="delivery-goods-server">
                                <select class="delivery-order-select" name='logistics_co_id'>
                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['logistics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                        <option value='<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['v']->value['comName'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix">
                            <span>跟踪编号</span>
                            <input type="text" name='logistics_id'>
                        </div>
                        <input type="hidden" name='orderid'>
                    </form>
                </div>
                <!-- 订单退款 -->
                <div class="window-body-common delivery-refound">
                    <form action="/order/dorefund" method="post" id="refund">
                        <div class="delivery-refound-inner">
                            <h2>填写退款原因</h2>
                            <div class="clearfix">
                                <span>退款金额</span>
                                <input type="text" name='refund_fee'>
                                <select name="refund_reason">
                                    <?php  $_smarty_tpl->tpl_vars['reason'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reason']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reasonList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reason']->key => $_smarty_tpl->tpl_vars['reason']->value) {
$_smarty_tpl->tpl_vars['reason']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['reason']->value['name'];?>
" ><?php echo $_smarty_tpl->tpl_vars['reason']->value['name'];?>
</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="hidden" name='orderid'>
                        </div>
                    </form>
                </div>
                <!-- 编辑送货地址 -->
                <div class="window-body-common delivery-address">
                    <form action="/order/doeditadd" method='post' id="editadd">
                        <div>
                            <span>街道地址1</span>
                            <input type="text" name='street_line1'>
                        </div>
                        <div>
                            <span>街道地址2</span>
                            <input type="text" name='street_line2'>
                        </div>
                        <div>
                            <span>城&nbsp;&nbsp;&nbsp;&nbsp;市</span>
                            <input type="text" name='city'>
                        </div>
                        <div>
                            <span>洲/&nbsp;省/&nbsp;区</span>
                            <input type="text" name='state'>
                        </div>
                        <div>
                            <span>国&nbsp;&nbsp;&nbsp;&nbsp;家</span>
                            <input type="text" name='country'>
                        </div>
                        <div>
                            <span>邮&nbsp;&nbsp;&nbsp;&nbsp;编</span>
                            <input type="text" name='postal_code'>
                        </div>
                        <div>
                            <span>收&nbsp;件&nbsp;人</span>
                            <input type="text" name='first_name' style="width:270px;margin-right:10px" placeholder="first name">
                            <input type="text" name='last_name' style="width:270px" placeholder="first name">
                        </div>
                        <div>
                            <span>电&nbsp;&nbsp;&nbsp;&nbsp;话</span>
                            <input type="text" name='phone_number'>
                        </div>
                        <input type="hidden" name='orderid'>
                    </form>
                </div>
                <!-- 修改订单状态 -->
                <div class="window-body-common delivery-goods">
                    <form action="/order/dochangestatus" method="post" id='dochangestatus'>
                        <div class="clearfix" style="margin:15px 0;">
                            <span>订单状态</span>
                            <div class="delivery-goods-server">
                                <select name="status">
                                    <option value="1" >未付款</option>
                                    <option value="2" >待审核</option>
                                    <option value="3" >已付款</option>
                                    <option value="4" >已发货</option>
                                    <option value="5" >交易冻结</option>
                                    <option value="6" >交易关闭</option>
                                    <option value="7" >完成</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix" style="margin:15px 0;">
                            <span>transactionid</span>
                            <input type="text" name='transactionid' />
                        </div>
                        <div class="clearfix" style="margin:15px 0;">
                            <span>原因</span>
                            <input type="text" name='reason' />
                        </div>
                        <input type="hidden" name='orderid'>
                    </form>
                </div>
            </div>
            <div class="window-wrap-foot">
                <div class="window-wrap-button clearfix">
                    <span class="window-button-btnLeft">取消</span>
                    <span class="window-button-btnRight"><input type="button" name='sub' value="提交"></span>
                </div>
            </div>
            <input type="hidden" name='subtype'>
        </div>
    </div>
    <!-- 弹窗 end-->
    <script type="text/javascript">
    $(function(){

        //弹框表单提交

        $("input[name='sub']").click(function()
        {
            var type = $("input[name='subtype']").val();
            if(type == 1)
            {
                $("#dodelivery").trigger("submit");
            }
            else if(type == 2)
            {
                $("#refund").trigger("submit");
            }
            else if(type == 3)
            {
                $("#editadd").trigger("submit");
            }
            else if(type == 4)
            {
                $("#dochangestatus").trigger("submit");
            }
        });

        //显示下拉列表

        showSelect();
    });
    </script>
</body>
</html><?php }} ?>
