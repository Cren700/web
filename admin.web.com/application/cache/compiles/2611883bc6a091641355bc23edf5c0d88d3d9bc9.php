<?php /* Smarty version Smarty-3.1.19, created on 2016-01-19 17:45:00
         compiled from "application/views/zh_cn/stat/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1560155881569e059ca29df9-25419279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5842425891955f07f6bccf97a7b22e2ab56df4e5' => 
    array (
      0 => 'application/views/zh_cn/stat/index.tpl',
      1 => 1442456040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1560155881569e059ca29df9-25419279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569e059ca67389_24522896',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569e059ca67389_24522896')) {function content_569e059ca67389_24522896($_smarty_tpl) {?><html>
	<head>
		<meta charset="utf-8">
		<title>首页</title>
		<link rel="stylesheet" href="/css/reset.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
		<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
		<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>

		<!--图表分析 start-->
		<script type="text/javascript">
			$(function () {
				var _json_amount_list = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['amount']['json_list'])===null||$tmp==='' ? '' : $tmp);?>
';
				var json_amount_list = _json_amount_list ? $.parseJSON(_json_amount_list) : new Array() ;
				var _json_order_list = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['order']['json_list'])===null||$tmp==='' ? '' : $tmp);?>
';
				var json_order_list = _json_order_list ? $.parseJSON(_json_order_list) : new Array();
				var _json_view_list = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['view']['json_list'])===null||$tmp==='' ? '' : $tmp);?>
';
				var json_view_list = _json_view_list ? $.parseJSON(_json_view_list) : new Array();
				var arr_amount_x = new Array();
				var arr_amount_y = new Array();
				var arr_order_x = new Array();
				var arr_order_y = new Array();
				var arr_view_x = new Array();
				var arr_view_y = new Array();
	      	 	for(var i=0;i<json_amount_list.length;i++){
					arr_amount_x.unshift(json_amount_list[i].date);
					arr_amount_y.unshift(parseFloat(json_amount_list[i].values));
	      	 	}
	      	 	for(var i=0;i<json_order_list.length;i++){
					arr_order_x.unshift(json_order_list[i].date);
					arr_order_y.unshift(parseFloat(json_order_list[i].values));
	      	 	}
	      	 	for(var i=0;i<json_view_list.length;i++){
					arr_view_x.unshift(json_view_list[i].date);
					arr_view_y.unshift(parseFloat(json_view_list[i].values));
	      	 	}


				//图1
				if (arr_amount_x.length && arr_amount_y.length) 
				{
			        $('#container').highcharts({
			            chart: {
			                type: 'spline'
			            },
			            title: {
			                text: '',
			                x: -20 //center
			            },
			            subtitle: {
			                text: '',
			                x: -20
			            },
			            xAxis: {
			                categories: arr_amount_x,
			                tickInterval:1
			            },
			            yAxis: {
			                title: {
			                    text: ''
			                },
			                /*
			                lineColor: '#7A7A7A',
	            			lineWidth: 1,
			                */
			                gridLineColor: '#eee',
	            			gridLineWidth: 1,

			                plotLines: [{
			                    value: 0,
			                    width: 1,
			                    color: '#808080'
			                }]
			            },
			            tooltip: {
			                valueSuffix: '$'
			            },
			            legend: {
			                layout: 'vertical',
			                align: 'right',
			                verticalAlign: 'middle',
			                borderWidth: 0
			            },
			            series: [{
			                name: 'irulu',
			                data: arr_amount_y
			            }]
			        });
				}
				else
				{
					$('#container').parents('.container-box').hide();
				}

				//图2
				if (arr_order_x.length && arr_order_y.length) 
				{
			        $('#container2').highcharts({
			            chart: {
			                type: 'spline'
			            },
			            title: {
			                text: '',
			                x: -20 //center
			            },
			            subtitle: {
			                text: '',
			                x: -20
			            },
			            xAxis: {
			                categories: arr_order_x,
			                tickInterval:1
			            },
			            yAxis: {
			                title: {
			                    text: ''
			                },
			            	gridLineColor: '#eee',
	            			gridLineWidth: 1,
			                plotLines: [{
			                    value: 0,
			                    width: 1,
			                    color: '#808080'
			                }]
			            },
			            tooltip: {
			                valueSuffix: '笔'
			            },
			            legend: {
			                layout: 'vertical',
			                align: 'right',
			                verticalAlign: 'middle',
			                borderWidth: 0
			            },
			            series: [{
			                name: 'irulu',
			                data: arr_order_y
			            }]
			        });
				}
				else
				{
					$('#container2').parents('.container-box').hide();
				}
				//图3
				if (arr_view_x.length && arr_view_y.length) 
				{
			        $('#container3').highcharts({
			            chart: {
			                type: 'spline'
			            },
			            title: {
			                text: '',
			                x: -20 //center
			            },
			            subtitle: {
			                text: '',
			                x: -20
			            },
			            xAxis: {
			                categories: arr_view_x,
			                tickInterval:1
			            },
			            yAxis: {
			                title: {
			                    text: ''
			                },
			          		gridLineColor: '#eee',
	            			gridLineWidth: 1,
			                plotLines: [{
			                    value: 0,
			                    width: 1,
			                    color: '#808080'
			                }]
			            },
			            tooltip: {
			                valueSuffix: '次'
			            },
			            legend: {
			                layout: 'vertical',
			                align: 'right',
			                verticalAlign: 'middle',
			                borderWidth: 0
			            },
			            series: [{
			                name: 'irulu',
			                data: arr_view_y
			            }]
			        });					
				}
				else
				{
					$('#container3').parents('.container-box').hide();
				}

			});
		</script>
		<script src="/js/highchart/highcharts.js"></script>
		<!--图表分析 end-->

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

				<!-- 消息详情 start -->

				<div class="wrap-right">
					<div class="wrap-right-content">
						<div class="index-block1 index-block">
							<div class="index-block-common">
								<h2 class="clearfix">
									<span>成交金额</span>
									<a href="/stat/detail">更多详情</a>
								</h2>
								<div class="index-block-common-inner">
									<ul class="clearfix">
										<li class="index-block-common-right1">
											<div>
												<span>昨天成交金额</span>
												<p>$<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['amount']['yesterday_amount'])===null||$tmp==='' ? '0.00' : $tmp);?>
</p>
											</div>
										</li>
										<li>
											<div>
												<span>过去7日成交金额</span>
												<p>$<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['amount']['seven_amount'])===null||$tmp==='' ? '0.00' : $tmp);?>
</p>
											</div>
										</li>
										<li>
											<div>
												<span>总成交金额</span>
												<p>$<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['amount']['total_amount'])===null||$tmp==='' ? '0.00' : $tmp);?>
</p>
											</div>
										</li>
									</ul>
									<div class="index-block-common-picture container-box">
										<h3>七日成交金额趋势图</h3>
										<div>
											<div id="container" style="width:auto; height: 360px; margin: 0 auto"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="index-block2 index-block">
							<div class="index-block-common">
								<h2 class="clearfix">
									<span>销售订单</span>
									<a href="/stat/detail">更多详情</a>
								</h2>
								<div class="index-block-common-inner index-block-common-right">
									<ul class="clearfix">
										<li class="index-block-common-right1">
											<div>
												<span>昨天销售订单</span>
												<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['order']['yesterday_order'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
											</div>
										</li>
										<li>
											<div>
												<span>过去7日销售订单</span>
												<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['order']['seven_order'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
											</div>
										</li>
										<li>
											<div>
												<span>总销售订单</span>
												<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['order']['total_order'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
											</div>
										</li>
									</ul>
									<div class="index-block-common-picture container-box">
										<h3>七日销售订单趋势图</h3>
										<div>
											<div id="container2" style="width:auto; height: 360px; margin: 0 auto"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="index-block3 index-block">
							<div class="index-block-common">
								<h2 class="clearfix">
									<span>商品浏览</span>
									<a href="/stat/detail">更多详情</a>
								</h2>
							</div>
							<div class="index-block3-view-wrapper clearfix">
								<div class="index-block3-view-message">
									<div>
										<h3>总浏览人数</h3>
										<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['view']['total_view_person'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
									</div>
									<div class="index-block3-view-innder">
										<h3>总浏览次数</h3>
										<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['view']['total_view_page'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
									</div>
								</div>
								<div class="index-block3-view-picture container-box">
									<h3>每日浏览次数趋势图</h3>
									<div>
										<div id="container3" style="width:auto; height: 400px; margin: 0 auto"></div>
									</div>
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


		</script>
	</body>
</html>
<?php }} ?>
