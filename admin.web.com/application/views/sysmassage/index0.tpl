<html>
<head>
	<title>系统消息</title>
</head>
<body>

	<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/js/commen.js"></script>
	<div>
		待处理订单：<span id='order_count'><{$count.orderCount}></span>
		客户消息：<span id='customer_count'><{$count.customerCount}></span>
		系统消息：<span id='sysmassage_count'><{$count.sysmassageCount}></span>
	</div>
	<h1>邮件信息列表</h1>
	<table id='table'>

	<th>标题</th>
	<th>时间</th>
		<{foreach $merchant_sysmsg_info as $key => $data}>
			<tr>
				<td><a href="/sysmassage/detail/<{$data.id|encryptId}>"> <{$data.title}></a></td>
				<!-- <td id='time<{$key}>'><{$data.time}></td> -->
				<td ><script>document.write(showDate(<{$data.time}>));</script></td>
			</tr>
		<{/foreach}>
	</table>

	<script type="text/javascript">
		$(function()
		{
			//每间隔30秒获取一次消息数量
			setInterval("getCount()", 30000);
		})
		function getCount()
		{
			var url = '/sysmassage/getMsgCount';
			$.ajax(
			{
				url:url,
				type:"get",
				data:null,
				dataType:"json",
				error:function(XMLHttpRequest, textStatus, errorThorwn)
				{
					// console.log(textStatus);
                },
                success:function(data, textStatus)
                {
                	$("#order_count").text(data.orderCount);
                	$("#customer_count").text(data.customerCount);
                	$("#sysmassage_count").text(data.sysmassageCount);
                	// console.log(data);
                }
			})
		}
	</script>
</body>
</html>