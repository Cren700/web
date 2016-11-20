<?php /* Smarty version Smarty-3.1.19, created on 2016-10-19 22:31:06
         compiled from "application/views/merchant/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46422273957fbb94d0b5b57-20955845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22ee626141238c4de5d45de1c3750d81b61d859d' => 
    array (
      0 => 'application/views/merchant/edit.tpl',
      1 => 1476887387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46422273957fbb94d0b5b57-20955845',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57fbb94d0e64b0_20533052',
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fbb94d0e64b0_20533052')) {function content_57fbb94d0e64b0_20533052($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<form id="form" action="/merchant/editHandel.html" method="post">
    <h1>基本信息</h1>
    <label for="">公司简称<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['cp_sname'])===null||$tmp==='' ? '' : $tmp);?>
" name='cpSname' placeholder="请输入公司简称" autocomplete="off"></label>
    <label for="">公司全称<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['cp_fullname'])===null||$tmp==='' ? '' : $tmp);?>
" name='cpFullname' placeholder="需要与执照名称保持一致" autocomplete="off"></label>

    <label for="">公司地址<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['cp_add'])===null||$tmp==='' ? '' : $tmp);?>
" name="cpAdd" placeholder="请输入详细地址" autocomplete="off"></label>
    <label for="">公司简介<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['cp_detail'])===null||$tmp==='' ? '' : $tmp);?>
" name="cpDetail" placeholder="请输入公司简介内容" autocomplete="off"></label>
    <h1>联系方式</h1>
    <label for="">负责人姓名<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['charge_name'])===null||$tmp==='' ? '' : $tmp);?>
" name="chargeName" placeholder="请输入联系人" autocomplete="off"></label>
    <label for="">负责人电话<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['charge_phone'])===null||$tmp==='' ? '' : $tmp);?>
" name="chargePhone" placeholder="输入手机号码" autocomplete="off"></label>
    <label for="">公司邮箱<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['charge_email'])===null||$tmp==='' ? '' : $tmp);?>
" name="chargeEmail" placeholder="请输入邮箱" autocomplete="off"></label>
    <h1>企业LOGO</h1>
    <input type="button" value="上传图片"><img src="" alt="">
    <input type="submit" value="Submit">
</form>
</body>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</html><?php }} ?>
