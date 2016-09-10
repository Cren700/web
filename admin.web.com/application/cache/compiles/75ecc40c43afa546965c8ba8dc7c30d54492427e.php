<?php /* Smarty version Smarty-3.1.19, created on 2016-08-14 22:28:23
         compiled from "application/views/category/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41082132557a21944a9e5c5-15242038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50ca1a549a408667533df733efedd36f62ba8f34' => 
    array (
      0 => 'application/views/category/index.tpl',
      1 => 1471168391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41082132557a21944a9e5c5-15242038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57a21944af91a3_31995641',
  'variables' => 
  array (
    'data' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a21944af91a3_31995641')) {function content_57a21944af91a3_31995641($_smarty_tpl) {?><html>
<head>
    <meta charset="utf-8">
    <title>栏目管理</title>
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
        <?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 公用头部 end-->
        <!-- 左边导航 start-->
        <?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 左边导航 end-->
        <!-- 基本信息 start -->
        <div class="wrap-right">
            <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2>栏目管理</h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">基本信息</a></li>
                    </ul>
                </div>
                <?php if (count($_smarty_tpl->tpl_vars['data']->value['cate_list'])!=0) {?>
                <div class="wrap-right-list">
                    <ul>
                        <li class="thead clearfix">
                            <div style="width: 15%;">栏目名称</div>
                            <div style="width: 10%;">优先级</div>
                            <div style="width: 10%;">是否使用</div>
                            <div class="operatione-thead" style="width: 15%;">操作</div>
                        </li>
                        <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['l']->key;
?>
                        <li class="clearfix" >
                            <div class="list-float" style="text-align: center; width: 15%;"><?php echo $_smarty_tpl->tpl_vars['l']->value['cate_name'];?>
</div>
                            <div class="list-float" style="text-align: center; width: 10%;"><?php echo $_smarty_tpl->tpl_vars['l']->value['priority'];?>
</div>
                            <div class="list-float js-status-show" style="text-align: center; width: 10%;"><?php if ($_smarty_tpl->tpl_vars['l']->value['status']==0) {?>禁用<?php } else { ?>正使用<?php }?></div>
                            <div class="operation-list list-float" style="width: 15%; text-align: center">
                                <a href="/category/update.html?id=<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
">修改</a>
                                <a href="javascript:;" class="js-btn-changeStatus" data-id="<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['l']->value['status']) {?><b data-status="1">禁用</b><?php } else { ?><b data-status="0">开启</b><?php }?>
                                </a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } else { ?>
                <div style="padding-top:30px; font-size:18px; color:red">
                    暂无相关数据
                </div>
                <?php }?>
                <p class="new-commodity-button clearfix"><input class="new-commodity-common-input js-url-btn" data-url="/category/add.html" type="button" value="添加新栏目" /></p>
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
            var cate_id = $(this).attr('data-id'),
                    status = $(this).find('b').attr('data-status'),
                    url = "/category/change.html";
            var data = {id: cate_id, status: status};
            $.getJSON(url, data, function (res) {
                if(res['code'] === 0) {
                    var op_status = 1 - status ? '禁用' : '开启',
                        status_show = 1- status ? '正使用' : '禁用';
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
</html><?php }} ?>
