<{include file='public/header.tpl'}>

<h1>用户登录</h1>
<form id="form" action="/login/loginHandel.html" method="post">
    <label for="">手机号码:<input type="text" value="13631255371" name='phone'></label>
    <label for="">密码:<input type="password" value="123456" name='pwd'></label>

    <label for="">验证码:<input type="text" value="" name="vc"></label><button id="js-get-VC" >获取验证码</button>
    <img id="vc-img" src="" alt="" style="border: 1px solid #000;">
    <input type="submit" value="Submit">
</form>
</body>
<{include file="public/footer.tpl"}>
</html>