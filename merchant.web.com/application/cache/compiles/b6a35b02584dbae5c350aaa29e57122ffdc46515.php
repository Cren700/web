<?php /* Smarty version Smarty-3.1.19, created on 2016-07-26 23:26:21
         compiled from "application/views/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55791409757851cbbdabe75-23304425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4e02b1d7a3e7c01f044684700ed998f558225b9' => 
    array (
      0 => 'application/views/header.tpl',
      1 => 1469546779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55791409757851cbbdabe75-23304425',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57851cbbddc8a7_98107835',
  'variables' => 
  array (
    'seo' => 0,
    'htmlCssArr' => 0,
    'css' => 0,
    'mid' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57851cbbddc8a7_98107835')) {function content_57851cbbddc8a7_98107835($_smarty_tpl) {?><head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keywords'];?>
">
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['description'];?>
">
    <link rel="stylesheet" href="<?php echo baseCssUrl('base.css');?>
">
    <?php if (isset($_smarty_tpl->tpl_vars['htmlCssArr']->value)) {?>
        <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['htmlCssArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
            <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css']->value['href'];?>
">
    <?php } ?>
    <?php }?>
    <script type="text/javascript" src="/assets/js/jquery-2.1.4.min.js"></script>
    <title><?php echo $_smarty_tpl->tpl_vars['seo']->value['title'];?>
</title>
</head>
<?php if (isset($_smarty_tpl->tpl_vars['mid']->value)&&$_smarty_tpl->tpl_vars['mid']->value) {?>
<div style="margin: 20px; font-size: 14px; color: #333;">
    <p>Hello, <a href="/account.html" style="color: #E13300;"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a></p>
</div>
<?php }?><?php }} ?>
