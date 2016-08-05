<?php /* Smarty version Smarty-3.1.19, created on 2016-07-19 23:56:01
         compiled from "application/views/account/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:729675010578e4d32555d92-21435025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd42264db02b7658d58902d403decd50c6860891f' => 
    array (
      0 => 'application/views/account/index.tpl',
      1 => 1468943759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '729675010578e4d32555d92-21435025',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578e4d3258c159_51568608',
  'variables' => 
  array (
    'username' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578e4d3258c159_51568608')) {function content_578e4d3258c159_51568608($_smarty_tpl) {?><!doctype html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<label for="">商户名:<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</label>

<label for="">地址:<?php echo $_smarty_tpl->tpl_vars['info']->value['address'];?>
</label>
<label for="">电话:<?php echo $_smarty_tpl->tpl_vars['info']->value['phone_number'];?>
</label>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
