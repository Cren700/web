<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>跳转提示</title>
    <style type="text/css">
    *{ padding: 0; margin: 0; }
    body{background: #fff;  color: #333; font-size: 16px;overflow: hidden;font-family: "Microsoft YaHei", "微软雅黑", "黑体", Arial, Tahoma;width: 100%;margin: 0;padding: 0;-webkit-font-smoothing: subpixel-antialiased;}
    .system-message{ padding: 24px 48px; }
    .system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
    .system-message .jump{ padding-top: 10px}
    .system-message .jump a{ color: #333;}
    .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
    .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
    @media screen and (max-width: 1024px){.system-message h1{font-size: 24px;}.system-message .success,.system-message .error{font-size: 20px;}}
    </style>
</head>
<body>
    <div class="system-message">
        <h1>:(</h1>
        <p class="error"><{$message}></p>
        <p class="jump">页面自动 <a id="href" href="<{$url}>">跳转</a> 等待时间： <b id="wait"><{$time}></b></p>
    </div>
    <script type="text/javascript">
    (function()
    {
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function()
        {
        	var time = -- wait.innerHTML;
        	if(time <= 0)
            {
                <{if $url}>
                window.location.href = href;
                <{else}>
                window.history.go(-1);
                <{/if}>

        		clearInterval(interval);
        	};
        }, 1000);
    })();
    </script>
</body>
</html>
