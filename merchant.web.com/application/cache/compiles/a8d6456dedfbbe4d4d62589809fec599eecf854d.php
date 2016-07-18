<?php /* Smarty version Smarty-3.1.19, created on 2016-07-13 23:35:45
         compiled from "application/views/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38770671857865e8dda2556-39097314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8305ba9d24a667d65ff40f555c1324e820bb1d' => 
    array (
      0 => 'application/views/footer.tpl',
      1 => 1468424106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38770671857865e8dda2556-39097314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57865e8ddb3534_54008944',
  'variables' => 
  array (
    'htmlJsArr' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57865e8ddb3534_54008944')) {function content_57865e8ddb3534_54008944($_smarty_tpl) {?><!--footer start-->

<!--footer end -->
<?php if (isset($_smarty_tpl->tpl_vars['htmlJsArr']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['htmlJsArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js']->value['src'];?>
"></script>
    <?php } ?>
<?php }?>

<?php }} ?>
