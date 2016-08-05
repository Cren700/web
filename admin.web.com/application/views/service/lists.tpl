<html>
<head>
    <meta charset="utf-8">
    <title>订单管理</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
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
            <!-- 售后问题 start -->
            <div class="wrap-right">
                <div class="wrap-right-content">
                    <div class="wrap-right-title">
                        <h2>售后问题</h2>
                        <ul class="clearfix">
                            <li<{if $status eq 1}> class="current"<{/if}>><a href="/service/lists?stat=1">未处理</a></li>
                            <li<{if $status eq 2}> class="current"<{/if}>><a href="/service/lists?stat=2">处理中</a></li>
                            <li<{if $status eq 0}> class="current"<{/if}>><a href="/service/lists?stat=0">已关闭</a></li>
                        </ul>
                    </div>
                    <div class="after-sale-problem-title clearfix">
                        <div class="wrap-word-left">
                            <span><{$total}>个问题</span>
                            <!-- <div class="after-sale-problem-inner clearfix">
                                <span>标签</span>
                                <div class="change-choose-address wrap-page-common">全部</div>
                                <ul>
                                    <{foreach $reason as $rea}>
                                    <li><a href="<{$rea.id}>"><{$rea.name}></a></li>
                                    <{/foreach}>
                                </ul>
                            </div> -->
                        </div>
                        <div class="wrap-word-right">
                            <div class="wrap-word-page wrap-order-page clearfix">
                                <{if $totalPage}>
                                <div class="wrap-word-pagechange">
                                    <div class="wrap-page-show"><code><{$p}></code>/<span><{$totalPage}></span>页</div>
                                    <ul class="wrap-page-list">
                                        <{section name=foo start=1 loop=$totalPage + 1 step=1}>
                                        <li><a href="/service/lists?stat=<{$status}>&p=<{$smarty.section.foo.index}>"><{$smarty.section.foo.index}></a></li>
                                        <{/section}>
                                    </ul>
                                </div>
                                <{/if}>
                                <div class="wrap-word-pagetap">
                                    <a href="<{if $p gt 1}>/service/lists?stat=<{$status}>&p=<{$p - 1}><{else}>javascript:;<{/if}>" class="word-pagetap-prev">上一页</a>
                                    <a href="<{if $p lt $totalPage}>/service/lists?stat=<{$status}>&p=<{$p + 1}><{else}>javascript:;<{/if}>" class="word-pagetap-next">下一页</a>
                                </div>
                            </div>
                            <div class="wrap-word-search wrap-word-order clearfix">
                                <div class="wrap-search-id">
                                    <select class="wrap-id-show wrap-page-common">
                                        <{foreach $reason as $rea}>
                                        <option value="<{$rea.id}>"><{$rea.name}></option>
                                        <{/foreach}>
                                    </select>
                                </div>
                                <div class="wrap-search-type">
                                    <button type=""><img src="/images/common/icon-search1.png" alt=""></button>
                                    <input type="text" placeholder="输入问题ID或其他关键词">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="after-sale-problem-list">
                        <table>
                            <thead>
                                <tr>
                                    <th>问题ID</th>
                                    <th>问题标签</th>
                                    <th>用户名</th>
                                    <th>状态</th>
                                    <th>更新时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                <{foreach $data as $da}>
                                <tr>
                                    <td class="after-sale-problem-id"><a href="/service/serv?id=<{$da.id}>"><{$da.id}></a></td>
                                    <td><a href="/service/serv?id=<{$da.id}>"><{$da.reason}></a></td>
                                    <td class="after-sale-user-name">
                                        <a href="/service/serv?id=<{$da.id}>">
                                            <div class="clearfix">
                                                <{if $da.userInfo.headjpg}>
                                                <img src="<{$da.userInfo.headjpg}>">
                                                <{/if}>
                                                <p><{$da.userInfo.nickname}></p>
                                            </div>
                                        </a>
                                    </td>
                                    <td><a href="/service/serv?id=<{$da.id}>"><{if $da.status eq 1}>等待客服回复<{else if $da.status eq 2}>客服已回复<{else}>已关闭<{/if}></a></td>
                                    <td class="after-sale-date-right"><a href="/service/serv?id=<{$da.id}>"><{$da.time}></a></td>
                                </tr>
                                <{/foreach}>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- 售后问题 end -->
        </div>
    </div>
    <!-- 主内容 end-->
    <script type="text/javascript">
    $(function()
    {
        //显示下拉列表
        showSelect();
    });
    </script>
</body>
</html>