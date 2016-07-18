<?php /* Smarty version Smarty-3.1.19, created on 2016-07-15 00:13:45
         compiled from "application/views/account/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:469003949578256c2288522-18867928%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00acb73917ae3771d0d252ce8eff61bb7260d60d' => 
    array (
      0 => 'application/views/account/login.tpl',
      1 => 1468424450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '469003949578256c2288522-18867928',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578256c22c43c1_12873657',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578256c22c43c1_12873657')) {function content_578256c22c43c1_12873657($_smarty_tpl) {?><!doctype html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<form action="">
    <label for="">用户名:</label><input type="text" name="username" value="">
    <label for="">密码:</label><input type="password" name="pwd" value="">
    <input id='js-submit' type="button" value="Submit">
</form>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
