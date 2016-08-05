<?php /* Smarty version Smarty-3.1.19, created on 2016-01-19 17:45:00
         compiled from "application/views/zh_cn/public/side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:936793256569e059ca72b00-71928287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7be7ba3b48708859f6fecede6e1acf62de8d1c36' => 
    array (
      0 => 'application/views/zh_cn/public/side.tpl',
      1 => 1440678192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '936793256569e059ca72b00-71928287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569e059ca8f291_37989841',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569e059ca8f291_37989841')) {function content_569e059ca8f291_37989841($_smarty_tpl) {?><div class="wrap-left">
    <div class="wrap-left-content">
        <ul>
            <li class="menu-left-block1<?php if ($_smarty_tpl->tpl_vars['class']->value=='stat') {?> current<?php }?>">
                <div class="menu-left-home<?php if ($_smarty_tpl->tpl_vars['class']->value=='stat') {?> current<?php }?>"><a href="/stat">首页</a></div>
            </li>
            <li class="menu-left-block2<?php if ($_smarty_tpl->tpl_vars['class']->value=='product') {?> cur<?php }?>">
                <div<?php if ($_smarty_tpl->tpl_vars['class']->value=="product") {?> class="cur"<?php }?>>商品管理</div>
                <dl<?php if ($_smarty_tpl->tpl_vars['class']->value=="product") {?> style='display:block'<?php }?>>
                    <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='product/add') {?> class="current"<?php }?>><a href="/product/add">添加新商品</a></dd>
                    <dd<?php if ($_smarty_tpl->tpl_vars['url']->value=='product/lists') {?> class="current"<?php }?>><a href="/product/lists">查看所有商品</a></dd>
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
                    <!-- <dd><a href="javascript:;">客服消息</a></dd> -->
                </dl>
            </li>
        </ul>
    </div>
</div><?php }} ?>
