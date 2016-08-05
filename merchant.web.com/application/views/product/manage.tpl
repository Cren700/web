<!doctype html>
<html lang="en">
<{include file='header.tpl'}>
<style>
    table{
        table-layout:fixed;
        empty-cells:show;
        border-collapse: collapse;
        margin:0 auto;
    }
    td{
        height:30px;
    }
    .table{
        border:1px solid #cad9ea;
        color:#666;
    }
    .table th {
        background-repeat:repeat-x;
        height:30px;
    }
    .table td,.table th{
        border:1px solid #cad9ea;
        padding:0 1em 0;
    }
    .table tr.alter{
        background-color:#f5fafe;
    }
</style>
</head>
<body>
<div style="float:left; width: 200px;">
    <{include file="public/menu.tpl"}>
</div>
<div style="float: right; width: 1000px;">
    <h2>查询产品</h2>
    <table class="table">
        <thead>
            <tr>
                <th>序号</th>
                <th>产品名称</th>
                <th>售价</th>
                <th>市场价</th>
                <th>产品成本价</th>
                <th>浏览数量</th>
                <th>交易数量</th>
                <th>产品简绍</th>
                <th>上下架</th>
                <th>优先级</th>
                <th>支持协议</th>
                <th>营销标签</th>
                <th>产品标签</th>
                <th>产品详情</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="js-tbody">

        </tbody>
    </table>
</div>
<{include file='footer.tpl'}>
</body>
</html>
