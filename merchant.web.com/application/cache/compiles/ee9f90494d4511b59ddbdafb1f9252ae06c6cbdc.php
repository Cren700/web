<?php /* Smarty version Smarty-3.1.19, created on 2016-07-31 00:09:24
         compiled from "application/views/product/manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1182280483578f9c8b6d7ea9-96293869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90dd8d9960bad280c40017c9c0ab174629d9199b' => 
    array (
      0 => 'application/views/product/manage.tpl',
      1 => 1469894962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1182280483578f9c8b6d7ea9-96293869',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578f9c8b70a319_55331830',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578f9c8b70a319_55331830')) {function content_578f9c8b70a319_55331830($_smarty_tpl) {?><!doctype html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
    <?php echo $_smarty_tpl->getSubTemplate ("public/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
