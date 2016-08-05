<html>
	<head>
		<meta charset="utf-8">
		<title>图表详情</title>
	    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
	    <link href="/css/bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="/css/reset.css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
		<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
		<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>

		<!--图表开始-->
		<style type="text/css">
			${demo.css}
		</style>
		<script type="text/javascript">
			$(function () {

				var _json_nearlyCount = '<{$data.json_nearlyCount}>';
				var json_nearlyCount = $.parseJSON(_json_nearlyCount);
				var arr_nearly_x = new Array();
				var arr_nearly_y1 = new Array();//订单数
				var arr_nearly_y2 = new Array();//订单额
				var arr_nearly_y3 = new Array();//浏览量
	      	 	for(var i=0;i<json_nearlyCount.length;i++){
					arr_nearly_x.unshift(json_nearlyCount[i].date);
					arr_nearly_y1.unshift(parseFloat(json_nearlyCount[i].day_order_num));
					arr_nearly_y2.unshift(parseFloat(json_nearlyCount[i].day_order_amount));
					arr_nearly_y3.unshift(parseFloat(json_nearlyCount[i].day_views_page));
	      	 	}

	      	 	if (json_nearlyCount.length) 
	      	 	{
				    $('#container').highcharts({
				        chart: {
				            zoomType: 'xy'
				        },
				        title: {
				            text: ''
				        },
				        subtitle: {
				            text: ''
				        },
				        xAxis: [{
				            categories: arr_nearly_x
				        }],
				        yAxis: [{ // Primary yAxis
				            labels: {
				                format: '{value}笔',
				                style: {
				                    color: Highcharts.getOptions().colors[2]
				                }
				            },
				            title: {
				                text: '订单数',
				                style: {
				                    color: Highcharts.getOptions().colors[2]
				                }
				            },
				            opposite: true

				        }, { // Secondary yAxis
				            gridLineWidth: 0,
				            title: {
				                text: '交易额',
				                style: {
				                    color: Highcharts.getOptions().colors[0]
				                }
				            },
				            labels: {
				                format: '{value} 美元',
				                style: {
				                    color: Highcharts.getOptions().colors[0]
				                }
				            }

				        }, { // Tertiary yAxis
				            gridLineWidth: 0,
				            title: {
				                text: '浏览量',
				                style: {
				                    color: Highcharts.getOptions().colors[1]
				                }
				            },
				            labels: {
				                format: '{value} 次',
				                style: {
				                    color: Highcharts.getOptions().colors[1]
				                }
				            },
				            opposite: true
				        }],
				        tooltip: {
				            shared: true
				        },
				        legend: {
				            layout: 'vertical',
				            align: 'left',
				            x: 120,
				            verticalAlign: 'top',
				            y: 80,
				            floating: true,
				            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
				        },
				        series: [{
				            name: '交易额',
				            type: 'column',
				            yAxis: 1,
				            data: arr_nearly_y2,
				            tooltip: {
				                valueSuffix: ' 美元'
				            }

				        }, {
				            name: '浏览量',
				            type: 'spline',
				            yAxis: 2,
				            data: arr_nearly_y3,
				            marker: {
				                enabled: false
				            },
				            dashStyle: 'shortdot',
				            tooltip: {
				                valueSuffix: ' 次'
				            }

				        }, {
				            name: '订单数',
				            type: 'spline',
				            data: arr_nearly_y1,
				            tooltip: {
				                valueSuffix: ' 笔'
				            }
				        }]
				    });
	      	 	};

			});
		</script>
		<!--图表结束-->



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

				<!-- 数据统计详情 start -->

				<div class="wrap-right">
					<div class="wrap-right-content">
						<div class="wrap-right-title">
							<h2>数据统计详情</h2>
						</div>
						<div class="index-data-statistic">
							<div class="index-data-statistic-title">
								<ul class="clearfix">
									<li>
										<div>
											<span>总成交金额</span>
											<p>$<{$data.historyCount.order_amount|default:0.00}></p>
										</div>
									</li>
									<li>
										<div>
											<span>总销售订单</span>
											<p class="all-sale-order"><{$data.historyCount.order_num|default:0}></p>
										</div>
									</li>
									<li>
										<div>
											<span>总浏览人数</span>
											<p><{$data.historyCount.views_person|default:0}></p>
										</div>
									</li>
									<li class="index-statistic-title-last">
										<div>
											<span>总浏览次数</span>
											<p><{$data.historyCount.views_page|default:0}></p>
										</div>
									</li>
								</ul>
							</div>
							<div class="index-data-statistic-date">
								<form action="" class="form-horizontal">
							        <fieldset>
										<div class="control-group" style="float:left;">
							                <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd" style="margin-left:0;">
							                    <input size="16" type="text" class="data-show-val" value="<{$left_time}>" readonly style="height:30px;width:100px;background-color:#fff;border-right:none">
												<span class="add-on" style="background-color:#fff;"><i class="icon-th" style="background:url(../images/common/icon-select-bottom1.png) no-repeat 0px 4px;padding-right:8px"></i></span>
							                </div>
											<input type="hidden" id="dtp_input1" class="date-hidden-val" name="left_time" value="<{$left_time}>" /><br/>
							            </div>
							            <label style="width: 18px;margin: 0px 7px;padding: 15px 0px 0px;border-bottom: 2px solid #CBCBCB;float:left"></label>
										<div class="control-group" style="float:left">
							                <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="margin-left:0;margin-right:10px;">
							                    <input size="16" type="text" class="data-show-val" value="<{$right_time}>" readonly style="height:30px;width:100px;background-color:#fff;border-right:none">
												<span class="add-on" style="background-color:#fff;"><i class="icon-th" style="background:url(../images/common/icon-select-bottom1.png) no-repeat 0px 4px;padding-right:8px"></i></span>
							                </div>
											<input type="hidden" id="dtp_input2" class="date-hidden-val" name="right_time" value="<{$right_time}>" /><br/>
							            </div>
							            <input type="submit" value="查询" style="width: 64px;height: 30px;margin: 0px 0px 0px 20px;font-family: 'Microsoft YaHei';color: #9D9D9D;background: transparent none repeat scroll 0% 0%;line-height: 30px;border: 1px solid #CBCBCB;cursor: pointer;border-radius: 5px;float:left">
							            <div style="clear:both"></div>
							        </fieldset>
									<div class="index-data-statistic-wrap">
										<div class="index-data-statistic-table clearfix">
											<span>单位:人/次</span>
											<label class="icon-table-block1" style="width:44px">成交额</label>
											<label class="icon-table-block2" style="width:44px">订单量</label>
											<label class="icon-table-block3" style="width:44px">浏览数</label>
										</div>
										<div id="container" style="width:auto; height: 400px; margin: 0 auto">
										</div>
									</div>
								</form>
							</div>
							<div class="index-data-statistic-list">
								<table>
									<thead>
										<tr>
											<th>日期</th>
											<th>浏览人数</th>
											<th>浏览次数</th>
											<th>订单数</th>
											<th>成交金额($)</th>
										</tr>
									</thead>

									<tbody>
										<{if $data.nearlyCount|@count neq 0}>
										<{foreach $data.nearlyCount as $list}>
										<tr>
											<td><{$list.date}></td>
											<td><{$list.day_views_person}></td>
											<td><{$list.day_views_page}></td>
											<td><{$list.day_order_num}></td>
											<td><{$list.day_order_amount}></td>
										</tr>
										<{/foreach}>
										<{/if}>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			<!-- 数据统计详情 end -->

			</div>

		</div>

		<!-- 主内容 end-->
		<script type="text/javascript" src="/js/bootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script src="/js/highchart/highcharts.js"></script>
		<script type="text/javascript">

			$(function(){
				//隔行变色
				$(".index-data-statistic-list tr:odd").css("background","#f9f9f9");
			});

			$('.form_date').datetimepicker({
		        language:  'fr',
		        weekStart: 1,
		        todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
		    });


			$('.data-show-val').on('change',function(){
				var _val = $(this).parent('.input-append').siblings('.date-hidden-val').val();
				$(this).val(_val);
			})

		</script>
	</body>
</html>
