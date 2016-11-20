<?php /* Smarty version Smarty-3.1.19, created on 2016-11-07 21:44:30
         compiled from "application/views/merchant/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109675014658039df209a015-39999354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ec01352ff8f55782f8759b603ac959b96cd4b8e' => 
    array (
      0 => 'application/views/merchant/index.tpl',
      1 => 1478444690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109675014658039df209a015-39999354',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58039df20d4990_38588383',
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58039df20d4990_38588383')) {function content_58039df20d4990_38588383($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (!empty($_smarty_tpl->tpl_vars['info']->value)) {?>
<table>
    <thead>
        <tr>
            <th>公司简称</th>
            <th>公司全称</th>
            <th>公司地址</th>
            <th>公司简介</th>
            <th>负责人姓名</th>
            <th>负责人联系电话</th>
            <th>负责人邮件</th>
            <th>公司logo</th>
            <th>公司状态</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['cp_sname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['cp_fullname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['cp_add'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['cp_detail'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['charge_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['charge_phone'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['charge_email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['info']->value['cp_logo'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['info']->value['check_status']==0) {?><span>禁用</span><?php } elseif ($_smarty_tpl->tpl_vars['info']->value['check_status']==1) {?><span>过期</span><?php } elseif ($_smarty_tpl->tpl_vars['info']->value['check_status']==2) {?><span>审核中</span><?php } else { ?><span>通过审核</span><?php }?>
            </td>
            <td><span><a href="/merchant/edit.html">编辑</a></span></td>
        </tr>
    </tbody>
</table>
<div>
    <ul>
        <li><a href="" title="发布职位">发布职位</a></li>
        <li><a href="" title="公司信息">公司信息</a></li>
        <li><a href="" title="招聘信息">招聘信息</a></li>
    </ul>
</div>
<?php } else { ?>
你还没有添加商家信息哦!<a href="<?php echo getBaseUrl('/merchant/edit');?>
" title="填写商家信息">现在去填写</a>
<?php }?>
</body>
</html><?php }} ?>
