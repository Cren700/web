<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 23:15:03
         compiled from "application/views/public/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199457201757e68f54d132a5-20186912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e9fef8451a218172abf243b99a90e60823798ce' => 
    array (
      0 => 'application/views/public/header.tpl',
      1 => 1478704502,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199457201757e68f54d132a5-20186912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57e68f54d1e298_06268246',
  'variables' => 
  array (
    'seo_description' => 0,
    'seo_keywords' => 0,
    'cssArr' => 0,
    'css' => 0,
    'seo_title' => 0,
    'uid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e68f54d1e298_06268246')) {function content_57e68f54d1e298_06268246($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo_description']->value;?>
">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo_keywords']->value;?>
">
    <link href="<?php echo getBaseUrl('');?>
/static/css/common/base.css" rel="stylesheet" type="text/css">
    <link href="<?php echo getBaseUrl('');?>
/static/css/common/public.css" rel="stylesheet" type="text/css">
    <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cssArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
        <link href="<?php echo getBaseUrl($_smarty_tpl->tpl_vars['css']->value['url']);?>
" rel="stylesheet" type="text/css">
    <?php } ?>
    <title><?php echo $_smarty_tpl->tpl_vars['seo_title']->value;?>
</title>
</head>
<body>
<div>
    <a href="<?php echo getBaseUrl('');?>
">首页</a>
    <?php if (!$_smarty_tpl->tpl_vars['uid']->value) {?><a href="<?php echo getBaseUrl('/login.html');?>
">登录</a><?php }?>
    <?php if (!$_smarty_tpl->tpl_vars['uid']->value) {?><a href="<?php echo getBaseUrl('/account/register.html');?>
">注册</a><?php }?>
</div><?php }} ?>
