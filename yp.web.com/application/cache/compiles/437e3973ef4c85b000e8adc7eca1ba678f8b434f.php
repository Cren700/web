<?php /* Smarty version Smarty-3.1.19, created on 2016-10-01 10:00:22
         compiled from "application/views/account/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204120167757e5570479cdf7-86029018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8ca9653a8468c7f24adc7d8a5821084724612f3' => 
    array (
      0 => 'application/views/account/register.tpl',
      1 => 1475286995,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204120167757e5570479cdf7-86029018',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57e557047deb34_25473045',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e557047deb34_25473045')) {function content_57e557047deb34_25473045($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<body>
<h1>注册用户</h1>
<form id="form" action="/account/registerHandel.html" method="post">
    <label for="">手机号码:<input type="text" value="" name='phone'></label>
    <label for="">密码:<input type="password" value="" name='pwd'></label>
    <input type="submit" value="Submit">
</form>
</body>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</html><?php }} ?>
