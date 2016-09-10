<html>
<head>
    <meta charset="utf-8">
    <title>订单管理</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>
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
        <!-- 基本信息 start -->
        <div class="wrap-right">
            <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2><{$fun_name}></h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">栏目信息</a></li>
                    </ul>
                </div>
                <div class="base-infor-wrap">
                    <form method="post" action="<{if !isset($data)}>/category/doadd.html<{else}>/category/doupdate.html<{/if}>">
                        <ul>
                            <li class="clearfix">
                                <span>栏目名称</span>
                                <input type="text" name="cateName" value="<{$data['cate_name']|default:''}>"  autocomplete="off"  />
                            </li>
                            <li class="clearfix">
                                <span>优&nbsp;&nbsp;先&nbsp;&nbsp;级</span>
                                <input type="text" name="priority" value="<{$data['priority']|default:''}>"  autocomplete="off" />
                            </li>
                            <{if isset($data)}>
                            <li class="clearfix">
                                <span>是否使用</span>
                                <label for="">使用:<input style="float: none;" type="radio" name="status" value="1" <{if $data['status'] eq 1}>checked<{/if}>></label>
                                <label for="">禁用:<input style="float: none;"  type="radio" name="status" value="0" <{if $data['status'] eq 0}>checked<{/if}>></label>
                            </li>
                            <{/if}>
                        </ul>
                        <div>
                            <input type="submit" value="<{if !isset($data)}>添&nbsp;&nbsp;&nbsp;加<{else}>修&nbsp;&nbsp;&nbsp;改<{/if}>">
                            <input type="button" id="js-return-list" value="返回栏目列表">
                        </div>
                        <{if isset($data)}>
                        <input type="hidden" name="id" value="<{$data['id']}>">
                        <{/if}>
                    </form>
                </div>
            </div>
        </div>
        <!-- 基本信息 end -->
    </div>
</div>
<!-- 主内容 end-->
</body>
<script>
    $(function () {
        $("#js-return-list").click(function () {
            location.href = '/category.html'
        })
    })
</script>
</html>