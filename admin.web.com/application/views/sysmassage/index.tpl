<html>
	<head>
		<meta charset="utf-8">
		<title>系统消息</title>
		<link rel="stylesheet" href="/css/reset.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/js/mCustomScrollbar/jquery.mCustomScrollbar.css">
		<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="/js/commen.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
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

				<!-- 系统消息 start -->

				<div class="wrap-right">
					<div class="wrap-right-content">
						<div class="wrap-right-title">
							<h2>系统消息</h2>
						</div>
						<div class="system-message-page clearfix">
							<div class="system-page-inner clearfix">
								<div class="wrap-word-pagechange">
									<div class="wrap-page-show"><code>1</code>/<span>50</span>页</div>
									<ul class="wrap-page-list">
										<li><a href="javascript:;">1</a></li>
										<li><a href="javascript:;">2</a></li>
										<li><a href="javascript:;">3</a></li>
										<li><a href="javascript:;">4</a></li>
										<li><a href="javascript:;">5</a></li>
										<li><a href="javascript:;">6</a></li>
										<li><a href="javascript:;">7</a></li>
										<li><a href="javascript:;">8</a></li>
										<li><a href="javascript:;">5</a></li>
										<li><a href="javascript:;">6</a></li>
										<li><a href="javascript:;">7</a></li>
										<li><a href="javascript:;">8</a></li>
									</ul>
								</div>
								<div class="wrap-word-pagetap">
									<a href="javascript:;" class="word-pagetap-prev">上一页</a>
									<a href="javascript:;" class="word-pagetap-next">下一页</a>
								</div>
							</div>
						</div>
						<div class="system-message-list">
							<ul>
								<{foreach $merchant_sysmsg_info as $key => $data}>
								<li <{if $data.status eq 1}>class="current"<{/if}>>
									<a href="/sysmassage/detail/<{$data.id|encryptId}>" class="clearfix">
										<div>
											<dl class="clearfix">
												<dt><img src="../images/systemMessage/system-pic1.jpg" alt=""></dt>
												<dd>
													<h3><{$data.title|truncate:36:"...":true}><label></label></h3>
													<p><{$data.msg|truncate:36:"...":true}></p>
												</dd>
											</dl>
										</div>
										<span><script>document.write(showDate(<{$data.time}>));</script></span>
									</a>
								</li>
								<{/foreach}>
							</ul>
						</div>
					</div>
				</div>

			<!-- 系统消息 end -->

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