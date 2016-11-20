<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 23:48:02
         compiled from "application/views/merchant/addJob.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10005656495821ee13efd318-62267373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4219f3b690e08f300c98b3126d896dc830fd825' => 
    array (
      0 => 'application/views/merchant/addJob.tpl',
      1 => 1478706480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10005656495821ee13efd318-62267373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5821ee140302c2_19228449',
  'variables' => 
  array (
    'info' => 0,
    'work_type' => 0,
    'k' => 0,
    'j' => 0,
    'sex_limit' => 0,
    'work_time' => 0,
    'w' => 0,
    'settlement_method' => 0,
    's' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5821ee140302c2_19228449')) {function content_5821ee140302c2_19228449($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<form id="form" action="/merchant/saveJob.html" method="post">
    <label for="">招聘标题<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
" name='title' placeholder="请输入招聘标题" autocomplete="off"></label>
    <label for="">工作地址<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['address'])===null||$tmp==='' ? '' : $tmp);?>
" name='address' placeholder="请输入工作地址" autocomplete="off"></label>
    <label for="">工资<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['salary'])===null||$tmp==='' ? '' : $tmp);?>
" name="salary" placeholder="请输入工资" autocomplete="off"></label>
    <label for="">人数<input type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['count'])===null||$tmp==='' ? '' : $tmp);?>
" name="count" placeholder="请输入招聘人数" autocomplete="off"></label>
    <label for="">工作类型
        <select name="workType" id="">
            <option value="">请选择...</option>
            <?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['j']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['work_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['j']->key => $_smarty_tpl->tpl_vars['j']->value) {
$_smarty_tpl->tpl_vars['j']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['j']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value;?>
</option>
            <?php } ?>
        </select>
    </label>
    <label for="">条件
        <select name="sexLimit" id="">
            <option value="">请选择...</option>
            <?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['j']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sex_limit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['j']->key => $_smarty_tpl->tpl_vars['j']->value) {
$_smarty_tpl->tpl_vars['j']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['j']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['j']->value;?>
</option>
            <?php } ?>
        </select>
    </label>
    <label for="">工作时间
        <input type="radio" value="时间段" name="workTime">
        <select name="sexLimit" id="">
            <option value="">请选择...</option>
            <?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['work_time']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['w']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value;?>
</option>
            <?php } ?>
        </select>
        <input type="radio" value="描述" name="workTime">
        <input type="text" placeholder="请输入描述信息" name="workDesc">
    </label>
    <label for="">结算方式
        <select name="settlementMethod" id="">
            <option value="">请选择...</option>
            <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['settlement_method']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</option>
            <?php } ?>
        </select>
    </label>
    <label for="">
        描述:
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </label>
    <input type="submit" value="Submit">
</form>
</body>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</html><?php }} ?>
