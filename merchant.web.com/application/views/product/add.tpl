<!doctype html>
<html lang="en">
<{include file='header.tpl'}>
</head>
<body>
<div style="float:left; width: 200px;">
    <{include file="public/menu.tpl"}>
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
<{include file='footer.tpl'}>
</body>
</html>
