<html>
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
			<{include file="public/header.tpl"}>
			<!-- 公用头部 end-->
			<!-- 左边导航 start-->
			<{include file="public/side.tpl"}>
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
									<input type="text" value="<{$data.username}>" readonly />
								</li>
								<li class="clearfix">
									<span>邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</span>
									<input type="text" name="email" value="<{$data.email|default:''}>" />
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
</html>