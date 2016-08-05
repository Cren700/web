<?php /* Smarty version Smarty-3.1.19, created on 2016-08-04 23:15:52
         compiled from "application/views/category/tag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84899401157a218a2528979-89241070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b59ef2ac362ae584eff01445c3a9905ed965e363' => 
    array (
      0 => 'application/views/category/tag.tpl',
      1 => 1470322936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84899401157a218a2528979-89241070',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57a218a2569bc9_98268817',
  'variables' => 
  array (
    'data' => 0,
    'list' => 0,
    'cate_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a218a2569bc9_98268817')) {function content_57a218a2569bc9_98268817($_smarty_tpl) {?><html>
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
        <?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 公用头部 end-->
        <!-- 左边导航 start-->
        <?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                <?php if (isset($_smarty_tpl->tpl_vars['data']->value['tagList'])) {?>
                <div class="base-infor-wrap">
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['tagList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                        <li class="clearfix">
                            <button><?php echo $_smarty_tpl->tpl_vars['list']->value['tag_name'];?>
</button>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } else { ?>
                <p>暂无标签信息</p>
                <?php }?>
                <a href="/category/addtag.html?cate_id=<?php echo $_smarty_tpl->tpl_vars['cate_id']->value;?>
">添加新标签</a>
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
</html><?php }} ?>
