<?php /* Smarty version Smarty-3.1.19, created on 2016-10-10 23:11:45
         compiled from "application/views/public/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57810966457e68f54d20e42-55429153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24229f69022d2cfd8067280694328221bc340a69' => 
    array (
      0 => 'application/views/public/footer.tpl',
      1 => 1476112296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57810966457e68f54d20e42-55429153',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57e68f54d22c94_43286776',
  'variables' => 
  array (
    'jsArr' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e68f54d22c94_43286776')) {function content_57e68f54d22c94_43286776($_smarty_tpl) {?><script src="<?php echo getBaseUrl('');?>
/static/js/common/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo getBaseUrl('');?>
/static/js/common/global.js"></script>
<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jsArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
    <script type="text/javascript" src="<?php echo getBaseUrl($_smarty_tpl->tpl_vars['js']->value['url']);?>
"></script>
<?php } ?>
<?php }} ?>
