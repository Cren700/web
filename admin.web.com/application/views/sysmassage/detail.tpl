<html>
	<head>
		<meta charset="utf-8">
		<title>系统消息</title>
		<link rel="stylesheet" href="/css/reset.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/js/mCustomScrollbar/jquery.mCustomScrollbar.css">
		<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
		<script type="text/javascript" src="/js/commen.js"></script>
		<script type="text/javascript" src="/js/mCustomScrollbar/jquery.mCustomScrollbar.js"></script>
	</head>
	<style>
		.mCSB_container{margin-right:0;}
	</style>
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

				<!-- 消息详情 start -->

				<div class="wrap-right">
					<div class="wrap-right-content">
						<div class="wrap-right-title">
							<h2>系统消息</h2>
						</div>
						<div class="system-details-inner details-inner-block1">
							<h3 class="clearfix">
								<a href="javascript:history.go(-1)">系统信息</a>
								<span>/消息详情</span>
							</h3>
						</div>
						<div class="system-details-notice">
							<div class="system-details-wrap">
								<h4><{$sysmassage_detail.title}></h4>
								<p>iRULU商户：</p>
								<p><{$sysmassage_detail.msg}></p>
								<div>
									<span class="system-details-right">iRULU官方</span><br>
									<span class="system-details-right"><script>document.write(showDate(<{$sysmassage_detail.time}>))</script></span>
								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- 消息详情 end -->

			</div>

		</div>

		<!-- 主内容 end-->

		<script type="text/javascript">

		$(function(){

			//显示下拉列表

			showSelect();
		});
		</script>
	</body>
</html>