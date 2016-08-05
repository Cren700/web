<?php /* Smarty version Smarty-3.1.19, created on 2016-07-31 11:33:27
         compiled from "application/views/product/inc/productList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:851788951579b5e7877a5f2-72265622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14d379f187909c72d0d919e2a2c138b1c4bd2d03' => 
    array (
      0 => 'application/views/product/inc/productList.tpl',
      1 => 1469936005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '851788951579b5e7877a5f2-72265622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_579b5e787af701_34140371',
  'variables' => 
  array (
    'productList' => 0,
    'key' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579b5e787af701_34140371')) {function content_579b5e787af701_34140371($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['productList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
<tr>
    <td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['sale_price'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['market_price'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['original_price'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['view_cnt'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['order_cnt'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['status'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['promotion_tag'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['priority'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['protocol'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['product_tag'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['list']->value['detail'];?>
</td>
    <td data-pid="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" data-op-status="<?php echo $_smarty_tpl->tpl_vars['list']->value['op_status'];?>
">
        <a href="" title="点击进行<?php if ($_smarty_tpl->tpl_vars['list']->value['op_status']==0) {?>审核<?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==1&&$_smarty_tpl->tpl_vars['list']->value['status']==0) {?>上架<?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==1&&$_smarty_tpl->tpl_vars['list']->value['status']==1) {?>下架<?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==2) {?>审核中<?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==3) {?>审核不通过<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['list']->value['op_status']==0) {?>
        未审核
        <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==1&&$_smarty_tpl->tpl_vars['list']->value['status']==0) {?>
        未上架
        <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==1&&$_smarty_tpl->tpl_vars['list']->value['status']==1) {?>
        上架
        <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==2) {?>
        审核中
        <?php } elseif ($_smarty_tpl->tpl_vars['list']->value['op_status']==3) {?>
        审核不通过
        <?php }?>
        </a>
        <a href="javascript:void(0)" class="js-alter">修改</a>
        <a href="javascript:void(0)" class="js-del">删除</a>
    </td>
</tr>

<?php } ?><?php }} ?>
