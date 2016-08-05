<?php /* Smarty version Smarty-3.1.19, created on 2016-08-02 15:51:17
         compiled from "application/views/merchant/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:416865219579f6ff61c5cc9-61385525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25176182058d21b3deb1a4f55f909cc527965e35' => 
    array (
      0 => 'application/views/merchant/index.tpl',
      1 => 1470124275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '416865219579f6ff61c5cc9-61385525',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_579f6ff6215e91_85488151',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579f6ff6215e91_85488151')) {function content_579f6ff6215e91_85488151($_smarty_tpl) {?><html>
<head>
	<meta charset="utf-8">
	<title>账号信息</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/mCustomScrollbar/jquery.mCustomScrollbar.css">
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="/js/commen.js"></script>

	<style>.mCSB_container{margin-right:0;}</style>
</head>
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
			<!-- 基本信息 start -->
			<div class="wrap-right">
				<div class="wrap-right-content">
					<div class="wrap-right-title">
						<h2>账号信息</h2>
						<ul class="clearfix">
							<li class="current"><a href="javascript:;">基本信息</a></li>
						</ul>
					</div>
					<div class="base-infor-wrap">
						<form id="merchant_info" method="post" action="/merchant/update">
							<ul>
								<li class="clearfix">
									<span>登&nbsp;录&nbsp;&nbsp;名：</span>
									<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
" readonly />
								</li>
								<li class="clearfix">
									<span>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</span>
									<input type="text" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
" />
								</li>
							</ul>
							<div>
								<span data-num="1" data-flag="true">修改密码</span>
								<input type="submit" value="更&nbsp;&nbsp;&nbsp;新">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- 基本信息 end -->
		</div>
	</div>
	<!-- 主内容 end-->
	<!-- 弹窗 start-->
	<div class="window-wrap">
		<div class="window-wrap-common">
			<div class="window-wrap-head clearfix">
				<span>修改密码</span>
				<a href="javascript:;" class="window-close"><img src="/images/common/icon-close.png" alt=""></a>
			</div>
			<form id='updatepwd' action='/merchant/doUpdatepwd' method="post">
				<div class="window-wrap-body">
					<!-- 订单退款 -->
					<div class="window-body-common change-password">
						<ul>
							<li class="clearfix">
								<span>原&nbsp;密&nbsp;&nbsp;码</span>
								<input type="password" name="password">
							</li>
							<li class="clearfix">
								<span>新&nbsp;密&nbsp;&nbsp;码</span>
								<input type="password" name="newpwd">
							</li>
							<li class="clearfix">
								<span>确认密码</span>
								<input type="password" name="renewpwd">
							</li>
						</ul>
					</div>
				</div>
				<div class="window-wrap-foot">
					<div class="window-wrap-button clearfix">
						<span class="window-button-btnLeft">取消</span>
						<span class="window-button-btnRight"><input type="submit" value="提交"></span>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- 弹窗 end-->
	<script type="text/javascript" src="/js/jquery.form.js"></script>
	<script type="text/javascript">
	$(function()
	{
		$("#merchant_info").submit(function()
		{
			var opt = {
	            dataType: 'json',
	            type: 'post',
	            success: function (data)
	            {
	            	console.log(data);
	            	alert(data.msg);
	            }
	        };
	        $(this).ajaxSubmit(opt);
	        return false;
		});
		$("#updatepwd").submit(function()
		{
			var opt = {
	            dataType: 'json',
	            type: 'post',
	            success: function (data)
	            {
	            	console.log(data);
	            	alert(data.msg);
	            }
	        };
	        $(this).ajaxSubmit(opt);
	        return false;
		});
	});
	</script>
</body>
</html><?php }} ?>
