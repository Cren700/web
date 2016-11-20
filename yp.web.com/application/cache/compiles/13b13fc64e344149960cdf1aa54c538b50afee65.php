<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 21:58:00
         compiled from "application/views/merchant/job.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2032387018581f4131a12e63-51620872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a792b596f2acd383eaa8077a2e59a8680147326f' => 
    array (
      0 => 'application/views/merchant/job.tpl',
      1 => 1478445067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2032387018581f4131a12e63-51620872',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_581f4131a61459_13255582',
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581f4131a61459_13255582')) {function content_581f4131a61459_13255582($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (empty($_smarty_tpl->tpl_vars['info']->value)) {?>
    <table>
        <thead>
        <tr>
            <th>招聘标题</th>
            <th>工作地址</th>
            <th>工资</th>
            <th>人数</th>
            <th>工作类型</th>
            <th>条件</th>
            <th>工作时间</th>
            <th>结算方式</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
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
            <?php } ?>
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
    你还没有添加招聘信息哦!<a href="<?php echo getBaseUrl('/merchant/addJob');?>
" title="填写商家信息">现在去添加</a>
    <?php }?>
</body>
</html><?php }} ?>
