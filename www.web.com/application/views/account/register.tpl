<{include file='public/header.tpl'}>
<body>
<h1>注册用户</h1>
<form id="form" action="/account/registerHandel.html" method="post">
    <label for="">手机号码:<input type="text" value="" name='phone'></label>
    <label for="">密码:<input type="password" value="" name='pwd'></label>
    <input type="submit" value="Submit">
</form>
</body>
<{include file="public/footer.tpl"}>
</html>