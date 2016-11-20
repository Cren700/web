<?php /* Smarty version Smarty-3.1.19, created on 2016-10-19 21:36:02
         compiled from "application/views/account/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185762538057ef19b5f3ea95-74964270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd6f4bd8a3f32d092e41c28dd5304c038b5ba419' => 
    array (
      0 => 'application/views/account/login.tpl',
      1 => 1476884157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185762538057ef19b5f3ea95-74964270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57ef19b6029597_35608079',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ef19b6029597_35608079')) {function content_57ef19b6029597_35608079($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<h1>用户登录</h1>
<form id="form" action="/login/loginHandel.html" method="post">
    <label for="">手机号码:<input type="text" value="13631255371" name='phone'></label>
    <label for="">密码:<input type="password" value="123456" name='pwd'></label>

    <label for="">验证码:<input type="text" value="" name="vc"></label><button id="js-get-VC" >获取验证码</button>
    <img id="vc-img" src="" alt="" style="border: 1px solid #000;">
    <input type="submit" value="Submit">
</form>
</body>
<?php echo $_smarty_tpl->getSubTemplate ("public/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</html><?php }} ?>
