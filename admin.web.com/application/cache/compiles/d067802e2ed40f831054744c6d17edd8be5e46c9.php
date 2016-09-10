<?php /* Smarty version Smarty-3.1.19, created on 2016-08-27 23:47:08
         compiled from "application/views/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:557368513579deecd04f923-07023329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5ed96a03b1d372db5876dc6becfaaff6c3ff14d' => 
    array (
      0 => 'application/views/login/index.tpl',
      1 => 1463020602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '557368513579deecd04f923-07023329',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_579deecd083ac8_71539913',
  'variables' => 
  array (
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_579deecd083ac8_71539913')) {function content_579deecd083ac8_71539913($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商户登录</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-wrapper-content">
            <img src="/images/login/login-descrition.png" alt="" class="login-content-left">
            <div class="login-content-right">
                <div class="login-right-logo"><img src="/images/login/logo.png" alt=""></div>
                <form id="form" method="post" action="/login/dologin?url=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                    <div class="login-right-input">

                        <div class="login-right-user">
                            <input type="text" name="username" placeholder="用户名" autocomplete="off">
                        </div>
                        <div class="login-right-password">
                            <input type="password" name="password" placeholder="密码" autocomplete="off">
                        </div>
                        <a href="javascript:;">忘记密码？</a>
                    </div>
                    <div class="login-right-sign">
                        <input type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript">
    $(function(){
        //背景高度适应屏幕
        function backgroundAdaptiveScreen()
        {
            var winH = adaptiveScreen().y,
                login = $(".login-wrapper"),
                loginContent = $(".login-wrapper-content");

            login.css("height",winH);
            loginContent.css("marginTop",-loginContent.height()/2);
        }
        backgroundAdaptiveScreen();
        $(window).on("resize",function(){
            backgroundAdaptiveScreen();
        });
        $('#form').submit(function()
        {
            var opt = {
                dataType: 'json',
                type: 'post',
                success: function (data)
                {
                    if(data.code != 0)
                    {
                        alert(data.msg);
                    }
                    else
                    {
                        window.location.replace(data.data);
                    }
                }
            };
            $(this).ajaxSubmit(opt);
            return false;
        });
    });
    </script>
</body>
</html><?php }} ?>
