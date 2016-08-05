<?php /* Smarty version Smarty-3.1.19, created on 2016-01-19 17:45:00
         compiled from "application/views/zh_cn/public/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:346302486569e059ca69498-93025700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41587df4cc86d98ca5d93cee149dd02ae2ce3def' => 
    array (
      0 => 'application/views/zh_cn/public/header.tpl',
      1 => 1441768209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '346302486569e059ca69498-93025700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569e059ca71b06_65752521',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569e059ca71b06_65752521')) {function content_569e059ca71b06_65752521($_smarty_tpl) {?><div class="wrap-title">
    <div class="logo">
        <img src="/images/common/logo.png" alt="">
    </div>
    <div class="wrap-title-message">
        <ul>
            <li>
                <a href="javascript:;">
                    <div class="wrap-title-block1">
                        <p><?php echo $_smarty_tpl->tpl_vars['count']->value['orderCount'];?>
</p>
                        <span>待处理订单</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <div class="wrap-title-block2">
                        <p><?php echo $_smarty_tpl->tpl_vars['count']->value['customerCount'];?>
</p>
                        <span>客服问题</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <div class="wrap-title-block3">
                        <p><?php echo $_smarty_tpl->tpl_vars['count']->value['saleCount'];?>
</p>
                        <span>售后问题</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="wrap-title-online clearfix">
        <ul>
            <li class="wrap-online-server">万方客服<span></span></li>
            <li class="wrap-online-message"><a href="/sysmassage">系统消息</a><?php if ($_smarty_tpl->tpl_vars['count']->value['sysmassageCount']!=0) {?><label id="sysmassage_count"><?php echo $_smarty_tpl->tpl_vars['count']->value['sysmassageCount'];?>
</label><?php }?></li>
            <li class="wrap-online-server"><a href="/merchant">账号信息</a></li>
        </ul>
    </div>
</div><?php }} ?>
