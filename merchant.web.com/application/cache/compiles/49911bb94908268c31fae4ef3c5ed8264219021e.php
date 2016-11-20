<?php /* Smarty version Smarty-3.1.19, created on 2016-10-16 19:47:00
         compiled from "application/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13664139305789f9b34708f9-44953464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8590f0c16a3404d9733c0f3fd2e92c08d35a4da9' => 
    array (
      0 => 'application/views/index/index.tpl',
      1 => 1468660801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13664139305789f9b34708f9-44953464',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5789f9b34ad025_02993982',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5789f9b34ad025_02993982')) {function content_5789f9b34ad025_02993982($_smarty_tpl) {?><!doctype html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<div style="float:left; width: 200px;">
    <?php echo $_smarty_tpl->getSubTemplate ("public/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div style="float: right; width: 1000px;">
    <iframe src="/index/home.html" frameborder="0" id="">

    </iframe>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
