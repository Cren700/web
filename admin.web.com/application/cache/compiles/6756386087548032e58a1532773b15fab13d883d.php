<?php /* Smarty version Smarty-3.1.19, created on 2016-08-14 11:25:57
         compiled from "application/views/category/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124585782257a7326f7fef78-37655119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc6bf3546bc4bdc0b86850cff281c62bdfc25cad' => 
    array (
      0 => 'application/views/category/detail.tpl',
      1 => 1471103814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124585782257a7326f7fef78-37655119',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57a7326f85c959_66650928',
  'variables' => 
  array (
    'fun_name' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a7326f85c959_66650928')) {function content_57a7326f85c959_66650928($_smarty_tpl) {?><html>
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
        <?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 公用头部 end-->
        <!-- 左边导航 start-->
        <?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 左边导航 end-->
        <!-- 基本信息 start -->
        <div class="wrap-right">
            <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2><?php echo $_smarty_tpl->tpl_vars['fun_name']->value;?>
</h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">栏目信息</a></li>
                    </ul>
                </div>
                <div class="base-infor-wrap">
                    <form method="post" action="<?php if (!isset($_smarty_tpl->tpl_vars['data']->value)) {?>/category/doadd.html<?php } else { ?>/category/doupdate.html<?php }?>">
                        <ul>
                            <li class="clearfix">
                                <span>栏目名称</span>
                                <input type="text" name="cateName" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['cate_name'])===null||$tmp==='' ? '' : $tmp);?>
"  autocomplete="off"  />
                            </li>
                            <li class="clearfix">
                                <span>优&nbsp;&nbsp;先&nbsp;&nbsp;级</span>
                                <input type="text" name="priority" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['priority'])===null||$tmp==='' ? '' : $tmp);?>
"  autocomplete="off" />
                            </li>
                            <?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?>
                            <li class="clearfix">
                                <span>是否使用</span>
                                <label for="">使用:<input style="float: none;" type="radio" name="status" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['status']==1) {?>checked<?php }?>></label>
                                <label for="">禁用:<input style="float: none;"  type="radio" name="status" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['status']==0) {?>checked<?php }?>></label>
                            </li>
                            <?php }?>
                        </ul>
                        <div>
                            <input type="submit" value="<?php if (!isset($_smarty_tpl->tpl_vars['data']->value)) {?>添&nbsp;&nbsp;&nbsp;加<?php } else { ?>修&nbsp;&nbsp;&nbsp;改<?php }?>">
                            <input type="button" id="js-return-list" value="返回栏目列表">
                        </div>
                        <?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?>
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
                        <?php }?>
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
</html><?php }} ?>
