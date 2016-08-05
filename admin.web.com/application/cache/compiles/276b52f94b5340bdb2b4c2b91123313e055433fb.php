<?php /* Smarty version Smarty-3.1.19, created on 2016-08-04 00:07:06
         compiled from "application/views/public/side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:372501156579e21816615b1-61439362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92aff525d46473afbc53e02ca3a2adc8ca2160f2' => 
    array (
      0 => 'application/views/public/side.tpl',
      1 => 1470240423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '372501156579e21816615b1-61439362',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_579e21816a6077_49990307',
  'variables' => 
  array (
    'class' => 0,
    'url' => 0,
    'category' => 0,
    'l' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579e21816a6077_49990307')) {function content_579e21816a6077_49990307($_smarty_tpl) {?><div class="wrap-left">
    <div class="wrap-left-content">
        <ul>
            <li class="menu-left-block1<?php if ($_smarty_tpl->tpl_vars['class']->value=='stat') {?> current<?php }?>">
                <div class="menu-left-home<?php if ($_smarty_tpl->tpl_vars['class']->value=='stat') {?> current<?php }?>"><a href="/stat">首页</a></div>
            </li>
            <li class="menu-left-block2<?php if ($_smarty_tpl->tpl_vars['class']->value=='product') {?> cur<?php }?>">
                <div<?php if ($_smarty_tpl->tpl_vars['class']->value=="product") {?> class="cur"<?php }?>>文章管理</div>
                <dl<?php if ($_smarty_tpl->tpl_vars['class']->value=="category") {?> style='display:block'<?php }?>>
                    <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='category') {?> class="current"<?php }?>><a href="/category.html">栏目管理</a></dd>
                <?php if (isset($_smarty_tpl->tpl_vars['category']->value['cate_list'])) {?>
                    <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value['cate_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
                        <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='category') {?> class="current"<?php }?>><a href="/category/catetag.html?cate_id=<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['l']->value['cate_name'];?>
</a></dd>
                    <?php } ?>
                <?php }?>
                </dl>
            </li>
            <li class="menu-left-block3<?php if ($_smarty_tpl->tpl_vars['class']->value=='order') {?> cur<?php }?>">
                <div<?php if ($_smarty_tpl->tpl_vars['class']->value=='order') {?> class="cur"<?php }?>>订单管理</div>
                <dl<?php if ($_smarty_tpl->tpl_vars['class']->value=="order") {?> style='display:block'<?php }?>>
                    <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='order/undeal') {?> class="current"<?php }?>><a href="/order/undeal">未处理订单</a></dd>
                    <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='order') {?> class="current"<?php }?>><a href="/order">查看所有订单</a></dd>
                </dl>
            </li>
            <li class="menu-left-block4<?php if ($_smarty_tpl->tpl_vars['class']->value=='service') {?> cur<?php }?>">
                <div<?php if ($_smarty_tpl->tpl_vars['class']->value=='service') {?> class="cur"<?php }?>>客服管理</div>
                <dl<?php if ($_smarty_tpl->tpl_vars['class']->value=="service") {?> style='display:block'<?php }?>>
                    <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='service/lists'||$_smarty_tpl->tpl_vars['url']->value=='service/serv') {?> class="current"<?php }?>><a href="/service/lists?stat=1">售后问题</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div><?php }} ?>
