<?php /* Smarty version Smarty-3.1.19, created on 2016-01-20 10:57:21
         compiled from "application/views/zh_cn/product/lists.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1931049945569e074c0e0f02-28539113%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92829ecf0b34b5e05cae26cbcb86649a78215721' => 
    array (
      0 => 'application/views/zh_cn/product/lists.tpl',
      1 => 1453258566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1931049945569e074c0e0f02-28539113',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569e074c151b13_06991932',
  'variables' => 
  array (
    'total' => 0,
    'type' => 0,
    'keyword' => 0,
    'p' => 0,
    'totalPage' => 0,
    'num' => 0,
    'list' => 0,
    'info' => 0,
    'typeList' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569e074c151b13_06991932')) {function content_569e074c151b13_06991932($_smarty_tpl) {?><html>
<head>
	<meta charset="utf-8">
	<title>商品管理</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/mCustomScrollbar/jquery.mCustomScrollbar.css">
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="/js/commen.js"></script>
</head>
<style>
	.mCSB_container{margin-right:0;}
    .export{display: inline-block;padding: 0 10px;height: 34px;line-height: 34px;color: #9d9d9d;border: 1px solid #cbcbcb;border-radius: 5px;}
</style>
<body>
	<!-- 主内容 start-->
	<div class="wrapper">
		<!-- 公用头部 start-->
		<?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- 公用头部 end-->
		<!-- 左边导航 start-->
		<?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- 左边导航 end-->
		<!-- 订单详情 start -->
		<div class="wrap-table-content">
			<div class="wrap-right">
				<div class="wrap-right-parent">
					<div class="wrap-right-content">
						<div class="wrap-right-title">
							<h2>查看所有商品</h2>
						</div>
						<div class="wrap-right-word clearfix">
							<div class="wrap-word-left">
								<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
件商品</span>
								<div class="wrap-commodity-status clearfix">
									<a href="/product/excel?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" class="export">导出Excel</a>
                                    <!-- <ul>
										<li class="commodity-status-left">查看状态</li>
										<li>
											<label><input type="checkbox">待审核</label>
											<label><input type="checkbox">已批准</label>
											<label><input type="checkbox">被拒绝</label>
										</li>
									</ul>
									<ul>
										<li class="commodity-status-left">商品状态</li>
										<li>
											<label><input type="checkbox">已上架</label>
											<label><input type="checkbox">已下架</label>
										</li>
									</ul> -->
								</div>
							</div>
							<div class="wrap-word-right">
								<div class="wrap-word-page clearfix">
                                    <div class="wrap-word-pagechange">
                                        <div class="wrap-page-show"><code><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
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
                                            <li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&num=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
&p=<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['foo']['index'];?>
</a></li>
                                            <?php endfor; endif; ?>
                                        </ul>
                                    </div>
									<div class="wrap-word-pagechange wrap-word-pagechang-commodity">
										<div class="wrap-page-numbles clearfix">
											<span>显示个数</span>
											<span class="page-numbles-counter"><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</span>
										</div>
										<ul class="wrap-numbles-list">
											<li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=1&num=5">5</a></li>
											<li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=1&num=10">10</a></li>
											<li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=1&num=20">20</a></li>
											<li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=1&num=30">30</a></li>
											<li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=1&num=40">40</a></li>
											<li><a href="/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=1&num=50">50</a></li>
										</ul>
									</div>
									<div class="wrap-word-pagetap">
										<a href="<?php if ($_smarty_tpl->tpl_vars['p']->value>1) {?>/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['p']->value-1;?>
&num=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
<?php } else { ?>javascript:;<?php }?>" class="word-pagetap-prev">上一页</a>
										<a href="<?php if ($_smarty_tpl->tpl_vars['p']->value<$_smarty_tpl->tpl_vars['totalPage']->value) {?>/product/lists?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['p']->value+1;?>
&num=<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
<?php } else { ?>javascript:;<?php }?>" class="word-pagetap-next">下一页</a>
									</div>
								</div>
								<div class="wrap-word-search wrap-word-commedity clearfix">
									<form method="get" action="/product/lists">
										<div class="wrap-search-id">
											<select name="type" class="wrap-id-show wrap-page-common">
                                                <option value="1"<?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?> selected<?php }?>>商品名称</option>
												<option value="2"<?php if ($_smarty_tpl->tpl_vars['type']->value==2) {?> selected<?php }?>>SKU</option>
											</select>
										</div>
										<div class="wrap-search-type">
											<button type="submit"><img src="/images/common/icon-search1.png" alt=""></button>
											<input type="text" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="wrap-right-list">
							<table>
								<thead>
									<tr>
										<th>商品ID</th>
										<th>缩略图</th>
										<th>商品名称</th>
										<th class="commedy-thead">销量</th>
										<th>SKU</th>
										<th>特性</th>
										<th class="title-pad-left">原价</th>
										<th class="title-pad-left">现价</th>
										<th class="title-pad-left">库存</th>
										<th class="num-list">是否上架</th>
                                        <th>添加时间</th>
										<th>更新时间</th>
										<th class="operatione-thead">操作</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
									<tr>
										<td class="order-number" data-id="<?php echo decryptId($_smarty_tpl->tpl_vars['info']->value['id']);?>
"><?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
</td>
										<td class="trade-time">
											<img src="<?php echo $_smarty_tpl->tpl_vars['info']->value['image'];?>
?imageView2/0/h/100/w/100" alt="" style="width:68px;height:68px;">
										</td>
										<td class="commodity-name"><p><?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>
</p></td>
										<td><?php echo $_smarty_tpl->tpl_vars['info']->value['sales'];?>
</td>
										<td class="commodity-type-common">
											<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
											<div class="commodity-type commodity-type-cont"><?php echo $_smarty_tpl->tpl_vars['type']->value['uniq'];?>
</div>
											<?php } ?>
											<div class="block10"></div>
										</td>
										<td class="commodity-type-common">
											<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
											<div class="commodity-type">
												<?php  $_smarty_tpl->tpl_vars['typeList'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['typeList']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['typeList']->key => $_smarty_tpl->tpl_vars['typeList']->value) {
$_smarty_tpl->tpl_vars['typeList']->_loop = true;
?>
												<p><?php echo $_smarty_tpl->tpl_vars['typeList']->value;?>
</p>
												<?php } ?>
											</div>
											<?php } ?>
											<div class="block10"></div>
										</td>
										<td class="commodity-type-common">
											<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
											<div class="commodity-type">
                                                <?php echo number_format($_smarty_tpl->tpl_vars['type']->value['price'],2);?>

												<!-- <input type="text" class="label-border discountPriceInput" data-id="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" data-filed="5" data-original="<?php echo number_format($_smarty_tpl->tpl_vars['type']->value['discountPrice'],2);?>
" value="<?php echo number_format($_smarty_tpl->tpl_vars['type']->value['price'],2);?>
" /> -->
											</div>
											<?php } ?>
											<div class="block10"></div>
										</td>
										<td class="commodity-type-common">
											<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
											<div class="commodity-type">
												<input type="text" class="label-border discountPriceInput" data-id="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" data-filed="2" data-original="<?php echo number_format($_smarty_tpl->tpl_vars['type']->value['discountPrice'],2);?>
" value="<?php echo number_format($_smarty_tpl->tpl_vars['type']->value['discountPrice'],2);?>
">
											</div>
											<?php } ?>
											<div class="block10"></div>
										</td>
										<td class="commodity-type-common">
											<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
											<div class="commodity-type">
												<input type="text" class="label-border" data-id="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" data-filed="3" data-original="<?php echo $_smarty_tpl->tpl_vars['type']->value['stock'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['stock'];?>
">
											</div>
											<?php } ?>
											<div class="block10"></div>
										</td>
										<td class="commodity-type-common">
											<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
											<div class="commodity-type num-list">
												<input type="checkbox" data-id="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['type']->value['status']!=0) {?>checked<?php }?> >
											</div>
											<?php } ?>
										</td>
                                        <td><script>document.write(showTime(<?php echo $_smarty_tpl->tpl_vars['info']->value['addTime'];?>
));</script></td>
										<td><script>document.write(showTime(<?php echo $_smarty_tpl->tpl_vars['info']->value['updateTime'];?>
));</script></td>
										<td class="operation-list">
											<div class="wrap-page-common">操作</div>
											<ul class="window-btn commodity-window-btn">
												<!-- <li>
													<a href="javascript:;">预览</a>
												</li> -->
												<li>
													<a href="/product/modify?id=<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
">编辑商品</a>
												</li>
												<li data-num="1" data-flag="true">
													<a href="javascript:;" class="addsku" data-id="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
" <?php if (count($_smarty_tpl->tpl_vars['info']->value['typeName'])==1) {?>data-type="<?php echo $_smarty_tpl->tpl_vars['info']->value['typeName'][0]['name'];?>
"<?php }?>>添加尺寸/颜色</a>
												</li>
											</ul>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 订单详情 end -->
	</div>
	<!-- 主内容 end-->
	<!-- 弹窗 start-->
	<div class="window-wrap">
		<div class="window-wrap-common" style="margin-top:0;">
			<div class="window-wrap-head clearfix">
				<span>配送订单</span>
				<a href="javascript:;" class="window-close"><img src="/images/common/icon-close.png" alt=""></a>
			</div>
			<form action="/product/addsku" method="post" id="addOne">
				<div class="window-wrap-body">
				<!-- 添加尺寸/颜色 -->
					<div class="window-body-common add-commedity-color">
						<div class="add-commedity-write add-commedity-common">
							<div class="commedity-edit-block1">
								<div class="clearfix">
									<span>唯一ID(SKU)</span>
									<input type="text" name="uniqid" />
								</div>
								<div class="clearfix">
									<span>数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量</span>
									<input type="text" name="stock" />
								</div>
								<div class="clearfix">
									<span>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格</span>
									<input type="text" name="price" />
								</div>
							</div>
						</div>
						<div class="add-commedity-size add-commedity-common">
							<div class="add-size-wrap clearfix sel-size">
								<h3>尺&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;寸</h3>
								<div class="add-size-block clearfix">
									<div class="add-size-type clearfix">
										<label><input type="radio" name="size" value="7" />7"</label>
										<label><input type="radio" name="size" value="9.7" />9.7"</label>
										<label><input type="radio" name="size" value="10.1" />10.1"</label>
									</div>
									<div class="add-size-button clearfix addmore">
										<input type="text" placeholder="输入新尺寸" />
										<input type="button" value="添加" class="add-button-operate">
									</div>
								</div>
							</div>
							<div class="add-size-choose clearfix sel-color">
								<h3>颜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色</h3>
								<div class="add-choose-wrap">
									<ul class="clearfix">
										<li class="clearfix">
											<label>
												<input type="radio" name="color" value="White" />
												<span style="background:#ffffff"></span>
												<label>White</label>
											</label>
										</li>
										<li class="clearfix">
											<label>
												<input type="radio" name="color" value="Black" />
												<span style="background:#000000"></span>
												<label>Black</label>
											</label>
										</li>
										<li class="clearfix">
											<label>
												<input type="radio" name="color" value="Red" />
												<span style="background:#ff0000"></span>
												<label>Red</label>
											</label>
										</li>
									</ul>
									<div class="add-choose-button clearfix addmore">
										<input type="text" placeholder="输入新颜色" />
										<input type="button"  value="添加" class="add-button-operate ">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="window-wrap-foot">
					<div class="window-wrap-button clearfix">
						<span class="window-button-btnLeft">取消</span>
						<span class="window-button-btnRight"><input type="submit" value="提交" /></span>
					</div>
				</div>
				<input type="hidden" name="prodId" value="0" />
			</form>
		</div>
	</div>
	<script type="text/javascript" src="/js/jquery.form.js"></script>
	<script type="text/javascript">
	$(function()
	{
		$('.add-size-wrap .add-button-operate').click(function()
		{
			//添加尺寸
			var txt = $.trim($(this).parents('.addmore').find('input[type="text"]').val());
			if(txt != '')
            {
            	$(this).parents('.add-size-block').find('.add-size-type').append('<label><input type="radio" name="size" value="'+txt+'" />'+txt+'"</label>');
                $(this).parents('.addmore').find('input[type="text"]').val('');
            }
		});
		$('.add-size-choose .add-button-operate').click(function()
		{
			//添加颜色
			var txt = $.trim($(this).parents('.addmore').find('input[type="text"]').val());
			if(txt != '')
            {
                $(this).parents('.add-choose-wrap').find('ul').append('<li class="clearfix"><label><input type="radio" name="color" value="'+txt+'" /><span style="background:'+txt+'"></span><label>'+txt+'</label></label></li>');
                $(this).parents('.addmore').find('input[type="text"]').val('');
            }
		});
		$('.addsku').click(function()
		{
			var _this = $(this);
			var prodId = $(this).attr('data-id');
			$(".sel-color").css('display','');
			$(".sel-size").css('display','');
			$('form')[0].reset();
			$('input[name="prodId"]').val(prodId);
			if(typeof(_this.attr('data-type')) != 'undefined')
			{
				var type = _this.attr('data-type').toLowerCase();
				if(type == 'size')
				{
					var hideClass = 'sel-color';
				}
				else
				{
					var hideClass = 'sel-size';
				}
				$("."+hideClass).css('display','none');
			}
		});
		// $('input[type="text"]').blur(function()
		$('.label-border').blur(function()
        {
            var _this = $(this);
            var id = _this.attr('data-id');
            var original = _this.attr('data-original');
            var field = _this.attr('data-filed');
            var value = $.trim(_this.val());

            if(original != value && value != '')
            {
                if(id != '')
                {
                    $.post('/product/stat', {id: id, value: value, field: field}, function (data)
                    {
                    	if(data.code == 0)
                        {
                        	_this.attr('data-original', data.data);
                        	_this.val(data.data);
                        	alert('修改成功');
                        }
                        else
                        {
                        	_this.val(original);
                        }
                    }, 'json');
                }
            }
        });

        // $('.discountPriceInput').blur(function(){
        // 	var id = $(this).attr('data-id');
        // 	var discountPrice = $(this).val();
        // 	$.ajax({
        // 		url:'/product/changeDiscountPrice',
        // 		type:'post',
        // 		dataType:'josn',
        // 		data:{'id':id,'price':discountPrice},
        // 		success:function(data)
        // 		{
        // 			if (data.code)
        // 			{
        // 				alert(data.msg);
        // 			};
        // 		}
        // 	})
        // })
        $('input[type="checkbox"]').click(function()
        {
        	var _this = $(this);
            var id = _this.attr('data-id');
            var value = _this.is(':checked') ? 1 : 0;
            $.post('/product/stat', {id: id, value: value, field: 4}, function (data)
            {
            	if(data.code == 0)
                {
                	_this.prop('checked', value);
                	alert('修改成功');
                }
                else
                {
                	_this.prop('checked', value ? 0 : 1);
                }
            }, 'json');
        });
		$('#addOne').submit(function()
        {
            var opt = {
                dataType: 'json',
                type: 'post',
                success: function (data)
                {
                    if(data.code != 0)
                    {
                        alert(data.msg);
                    }
                    else
                    {
                        window.location.replace(data.data);
                    }
                }
            };
            $(this).ajaxSubmit(opt);
            return false;
        });

        showSelect();
	});

        /**根据条件查询商品信息*/
        function queryProductList()
        {

        }
	</script>
</body>
</html><?php }} ?>
