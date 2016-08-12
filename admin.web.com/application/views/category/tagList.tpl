<html>
<head>
    <meta charset="utf-8">
    <title>栏目管理</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
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

            <div class="wrap-right-parent">
                <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2>标签管理</h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">基本信息</a></li>
                    </ul>
                </div>
                <{if $data|@count neq 0}>
                <div class="wrap-right-list">
                    <ul>
                        <li class="thead clearfix">
                            <div style="width: 15%;">栏目名称</div>
                            <div style="width: 15%;">标签名称</div>
                            <div style="width: 10%;">优先级</div>
                            <div style="width: 10%;">是否使用</div>
                            <div class="operatione-thead">操作</div>
                        </li>
                        <{foreach $data as $value}>
                        <li class="clearfix" id='<{$value['tag_id']}>'>
                            <div class="list-float" style="text-align: center; width: 15%;"><{$value['cate_name']}></div>
                            <div class="list-float" style="text-align: center; width: 15%;"><{$value['tag_name']}></div>
                            <div class="list-float" style="text-align: center; width: 10%;"><{$value['priority']}></div>
                            <div class="list-float js-status-show" style="text-align: center; width: 10%;"><{if $value['status'] eq 0}>禁用<{else}>正使用<{/if}></div>
                            <div class="operation-list list-float">
                                <a href="javascript:;" class="js-btn-update">修改</a>
                                <a href="javascript:;" class="js-btn-changeStatus"><{if $value[
                                    'status'] eq 0}><b data-status="0">开启</b><{else}><b data-status="1">禁用</b><{/if}></a>
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
            </div>
            </div>
        </div>
        <!-- 基本信息 end -->
    </div>
</div>
<!-- 主内容 end-->
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript">
    $(function () {
        $('.js-btn-update').on('click', function () {
            var tag_id = $(this).parent('div').parent('li').attr('id');
            location.href='/category/manageTag.html?tag_id='+tag_id;
        });

        $('.js-btn-changeStatus').on('click', function () {
            var _this = $(this);
            var tag_id = $(this).parent('div').parent('li').attr('id'),
                status = $(this).find('b').attr('data-status'),
                url = "/category/managetagstatus.html";
            var data = {tag_id: tag_id, status: status};
            $.getJSON(url, data, function (res) {
                if(res['code'] === 0) {
                    var op_status = 1 - status ? '禁用' : '开启',
                        status_show = 1- status ? '正使用' : '禁用';
                    _this.find('b').text(op_status).attr('data-status', 1- status);
                    _this.parents('li').find('div.js-status-show').text(status_show);
                } else {
                    alert('wrong1!');
                }
            });
        })
    });

</script>
</body>
</html>