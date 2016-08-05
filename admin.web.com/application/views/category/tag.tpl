<html>
<head>
    <meta charset="utf-8">
    <title>栏目标签</title>
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
                    <h2>栏目标签</h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">标签信息</a></li>
                    </ul>
                </div>
                <{if isset($data['tagList'])}>
                <div class="base-infor-wrap">
                    <ul>
                        <{foreach $data['tagList'] as $list}>
                        <li class="clearfix">
                            <button><{$list['tag_name']}></button>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
                <{else}>
                <p>暂无标签信息</p>
                <{/if}>
                <a href="/category/addtag.html?cate_id=<{$cate_id}>">添加新标签</a>
                <a href="/category/taglist.html">标签管理</a>
            </div>
        </div>
        <!-- 基本信息 end -->
    </div>
</div>
<!-- 主内容 end-->
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript">
    $(function()
    {

    });
</script>
</body>
</html>