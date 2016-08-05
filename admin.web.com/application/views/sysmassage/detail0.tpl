<html>
<head>
	<title>系统消息详情</title>
</head>
<body>
	<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/js/commen.js"></script>
	<h1>标题：<{$sysmassage_detail.title}></h1>
	<!-- <p>尊敬的<{$session['username']}>></p> -->
	<p>内容：<{$sysmassage_detail.msg}></p>
	<p>irulu团队</p>
	<p><script>document.write(showDate(<{$sysmassage_detail.time}>))</script></p>
</body>
</html>