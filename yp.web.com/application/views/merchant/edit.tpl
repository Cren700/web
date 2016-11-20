<{include file='public/header.tpl'}>
<form id="form" action="/merchant/editHandel.html" method="post">
    <h1>基本信息</h1>
    <label for="">公司简称<input type="text" value="<{$info['cp_sname']|default:''}>" name='cpSname' placeholder="请输入公司简称" autocomplete="off"></label>
    <label for="">公司全称<input type="text" value="<{$info['cp_fullname']|default:''}>" name='cpFullname' placeholder="需要与执照名称保持一致" autocomplete="off"></label>

    <label for="">公司地址<input type="text" value="<{$info['cp_add']|default:''}>" name="cpAdd" placeholder="请输入详细地址" autocomplete="off"></label>
    <label for="">公司简介<input type="text" value="<{$info['cp_detail']|default:''}>" name="cpDetail" placeholder="请输入公司简介内容" autocomplete="off"></label>
    <h1>联系方式</h1>
    <label for="">负责人姓名<input type="text" value="<{$info['charge_name']|default:''}>" name="chargeName" placeholder="请输入联系人" autocomplete="off"></label>
    <label for="">负责人电话<input type="text" value="<{$info['charge_phone']|default:''}>" name="chargePhone" placeholder="输入手机号码" autocomplete="off"></label>
    <label for="">公司邮箱<input type="text" value="<{$info['charge_email']|default:''}>" name="chargeEmail" placeholder="请输入邮箱" autocomplete="off"></label>
    <h1>企业LOGO</h1>
    <input type="button" value="上传图片"><img src="" alt="">
    <input type="submit" value="Submit">
</form>
</body>
<{include file="public/footer.tpl"}>
</html>