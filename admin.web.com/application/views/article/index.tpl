<html>
<head>
    <meta charset="utf-8">
    <title>文章列表</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>
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
                    <h2><{$data['tag_info']['tag_name']}> -- 文章列表</h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">文章列表</a></li>
                    </ul>
                </div>
                <{if $data['article_list']|@count neq 0}>
                <div class="wrap-right-list">
                    <ul>
                        <li class="thead clearfix">
                            <div style="width: 15%;">文章标题</div>
                            <div style="width: 10%;">作者</div>
                            <div style="width: 10%;">浏览次数</div>
                            <div style="width: 10%;">发布时间</div>
                            <div style="width: 10%;">创建时间</div>
                            <div style="width: 10%;">是否使用</div>
                            <div class="operatione-thead" style="width: 15%;">操作</div>
                        </li>
                        <{foreach $data['article_list'] as $k => $l}>
                        <li class="clearfix" >
                            <div class="list-float" style="text-align: center; width: 15%;"><{$l['title']}></div>
                            <div class="list-float" style="text-align: center; width: 10%;"><{$l['author']}></div>
                            <div class="list-float" style="text-align: center; width: 10%;"><{$l['cnt']|default:0}></div>
                            <div class="list-float" style="text-align: center; width: 10%;"><{'Y-m-d H:i:s'|date:$l['issue_time']}></div>
                            <div class="list-float" style="text-align: center; width: 10%;"><{'Y-m-d H:i:s'|date:$l['create_time']}></div>
                            <div class="list-float js-status-show" style="text-align: center; width: 10%;"><{if $l['status'] eq 0}>禁用<{else}>正使用<{/if}></div>
                            <div class="operation-list list-float" style="width: 15%; text-align: center">
                                <a href="/article/manage.html?id=<{$l['id']}>">修改</a>
                                <a href="javascript:;" class="js-btn-changeStatus" data-id="<{$l['id']}>"><{if $l['status']}><b data-status="1">禁用</b><{else}><b data-status="0">启用</b><{/if}>
                                </a>
                            </div>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
                <{else}>
                <div style="padding-top:30px; font-size:18px; color:red">
                    暂无相关数据
                </div>
                <{/if}>
                <p class="new-commodity-button clearfix">
                    <input class="new-commodity-common-input js-url-btn" data-url="/article/add.html?tag_id=<{$data['tag_info']['id']}>" type="button" value="添加新文章" />
                    <input class="new-commodity-common-input js-url-btn" data-url="/category/add.html" type="button" value="查看所有文章" />
                </p>
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
        $('.js-btn-changeStatus').on('click', function () {
            var _this = $(this);
            var id = $(this).attr('data-id'),
                    status = $(this).find('b').attr('data-status'),
                    url = "/article/changeStatus.html";
            var data = {id: id, status: status};
            $.getJSON(url, data, function (res) {
                if(res['code'] === 0) {
                    var op_status = status == 0 ? '禁用' : '启用',
                        status_show = status == 0 ? '正使用' : '禁用';
                    _this.find('b').text(op_status).attr('data-status', 1- status);
                    _this.parents('li').find('div.js-status-show').text(status_show);
                } else {
                    alert(res['msg']);
                }
            });
        })
    });
</script>
</body>
</html>