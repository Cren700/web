<?php /* Smarty version Smarty-3.1.19, created on 2016-10-16 19:50:35
         compiled from "application/views/product/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162476124578a02a388d057-81380263%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a5e9128dbdc0a44a881c39a18b1173623a01b87' => 
    array (
      0 => 'application/views/product/add.tpl',
      1 => 1476618634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162476124578a02a388d057-81380263',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_578a02a38b91a8_33851081',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_578a02a38b91a8_33851081')) {function content_578a02a38b91a8_33851081($_smarty_tpl) {?><!doctype html>
<html lang="en">
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body>
<div style="float:left; width: 200px;">
    <?php echo $_smarty_tpl->getSubTemplate ("public/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div style="float: right; width: 1000px;">
    <h2>添加产品</h2>
    <form action="" id="form">
        <label for="">产品名字<input type="text" name="productName"></label>
        <label for="">产品描述<input type="text" name="productDescription"></label>
        <label for="">产品销售价<input type="text" name="salePrice"></label>
        <label for="">产品门市价<input type="text" name="marketPrice"></label>
        <label for="">支持协议: <span>支持退款</span> <input type="checkbox" name="productProtocol[]" value="1"><span>24小时服务</span> <input type="checkbox" name="productProtocol[]" value="2"></label>
        <label for="">
            营销标签:
            <input type="radio" name="promotionTag" value="1"><span>推荐</span>
            <input type="radio" name="promotionTag" value="2"><span>热门精选</span>
            <input type="radio" name="promotionTag" value="3"><span>大甩卖</span>
        </label>
        <label for="">产品标签: <span>周年庆</span><input type="radio" name="productTag" value="1"></label>
        <label for="">本单详情<input type="text" name="productDetail"></label>
        <label for=""><input type="button" id="js-submit" value="Submit"> <input type="reset" value="重置"></label>
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html>
<?php }} ?>
