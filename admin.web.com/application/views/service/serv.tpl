<html>
<head>
    <meta charset="utf-8">
    <title>问题详情</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>
</head>
<style>
    .mCSB_container{margin-right:0;}
</style>
<body>
    <!-- 主内容 start-->
    <div class="wrapper">
        <div class="wrappper-block clearfix">
            <!-- 公用头部 start-->
            <{include file="public/header.tpl"}>
            <!-- 公用头部 end-->
            <!-- 左边导航 start-->
            <{include file="public/side.tpl"}>
            <!-- 左边导航 end-->
            <!-- 问题详情 start -->
            <div class="wrap-right">
                <div class="wrap-right-content">
                    <div class="details-content-title">
                        <h2>问题详情</h2>
                    </div>
                    <div class="details-content-inner">
                        <div class="details-inner-block1 problem-details-common">
                            <h3 class="clearfix">
                                <a href="javascript:history.go(-1)">未处理</a>
                                <span>/问题详情</span>
                            </h3>
                            <div>
                                <h4>商品详情</h4>
                                <ul>
                                    <li><span>问题&nbsp;&nbsp;ID：</span><{$question.id}></li>
                                    <li><span>创建时间：</span><script>document.write(showTime(<{$question.time}>));</script></li>
                                    <li><span>售后类型：</span><{if $question.serviceType eq 1}>退货<{else}>退款<{/if}></li>
                                    <li><span>标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签：</span><{$question.reason}></li>
                                    <li><span>状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：</span><{if $question.status eq 1}>等待客服回复<{else if $question.status eq 2}>客服已回复<{else if $question.status eq 3}>拒绝售后<{else}>已关闭<{/if}></li>
                                    <li class="problem-details-block1 clearfix">
                                        <span>收货地址：</span>
                                        <label><{if $orderInfo.shoppingAddr.address1 and $orderInfo.shoppingAddr.address2}><{$orderInfo.shoppingAddr.address1}><br /><{$orderInfo.shoppingAddr.address2}><{else if $orderInfo.shoppingAddr.address1}><{$orderInfo.shoppingAddr.address1}><{else}><{$orderInfo.shoppingAddr.address2}><{/if}><br /><{$orderInfo.shoppingAddr.city}>,&nbsp;<{$orderInfo.shoppingAddr.state}>&nbsp;<{$orderInfo.shoppingAddr.zipCode}><br /><{$orderInfo.shoppingAddr.country}></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="problem-details-block2 problem-details-common">
                            <h4>订单详情</h4>
                            <ul class="clearfix">
                                <li class="problem-details-block2-title clearfix">
                                    <div class="problem-details-order-common">商品(SKU)</div>
                                    <div>特性</div>
                                    <div>价格</div>
                                    <div>数量</div>
                                    <div>配送费用</div>
                                    <div class="problem-details-order-common">订单ID</div>
                                    <div>订单状态</div>
                                    <div>交易日期</div>
                                    <div>用户支付</div>
                                    <div>更新时间</div>
                                    <{if $question.status eq 1 or $question.status eq 2}>
                                    <div class="problem-details-order-operate">操作</div>
                                    <{/if}>
                                </li>
                                <li class="problem-details-block2-content clearfix">
                                    <{foreach $orderInfo.productList as $productList}>
                                    <{if $productList.id eq $question.pskuid}>
                                    <div class="problem-details-order-sku1 problem-details-order-common clearfix">
                                        <img src="<{$productList.image}>">
                                        <p>
                                            <span><{$productList.name}></span>
                                            <label>(<{$productList.uniq}>)</label>
                                        </p>
                                    </div>
                                    <div>
                                        <{foreach $productList.sku as $sku}>
                                        <p><{$sku}></p>
                                        <{/foreach}>
                                    </div>
                                    <div>$ <{$productList.price|number_format:2}></div>
                                    <div>1</div>
                                    <div><{$orderInfo.shipping|number_format:2}></div>
                                    <div class="problem-details-order-id1 problem-details-order-common"><{$orderInfo.orderId}></div>
                                    <div class="problem-details-order-status1"><{$orderInfo.status|getOrderStatus}></div>
                                    <div><script>document.write(showTime(<{$orderInfo.payTime}>));</script></div>
                                    <div><{if $orderInfo.status eq 1}>未付款<{else if $orderInfo.status eq 2}>待审核<{else}>$ <{$productList.price|number_format:2}><{/if}></div>
                                    <div><script>document.write(showTime(<{$orderInfo.updateTime}>));</script></div>
                                    <{if $question.status eq 1 or $question.status eq 2}>
                                    <div>
                                        <ul>
                                            <!-- <li data-num=1 data-flag=true><a href="javascript:;">退款</a></li> -->
                                            <li><a href="/service/status?servId=<{$question.id}>&stat=3">拒绝售后</a></li>
                                            <li><a href="/service/status?servId=<{$question.id}>&stat=0">关闭问题</a></li>
                                        </ul>
                                    </div>
                                    <{/if}>
                                    <{/if}>
                                    <{/foreach}>
                                </li>
                            </ul>
                        </div>
                        <div class="problem-details-block3 problem-details-common clearfix">
                            <div class="problem-details-block3-left">
                                <h4 class="clearfix">
                                    <span class="problem-block3-inner-left">问题详情</span>
                                    <span class="problem-block3-inner-right">问题标签：<{$question.reason}></span>
                                </h4>
                                <ul>
                                    <{foreach $list as $lis}>
                                    <{if $lis.merchantInfo}>
                                    <!-- 商家 -->
                                    <li>
                                        <h5 class="clearfix">
                                            <span class="problem-block3-message-left">from&nbsp;<label><{$merchantInfo.name}></label></span>
                                            <span class="problem-block3-message-right"><script>document.write(showTime(<{$lis.time}>));</script></span>
                                        </h5>
                                        <p><{$lis.content}></p>
                                    </li>
                                    <{else}>
                                    <!-- 用户 -->
                                    <li>
                                        <h5 class="clearfix">
                                            <span class="problem-block3-message-left">from&nbsp;<label><{$userInfo.nickname}></label></span>
                                            <span class="problem-block3-message-right"><script>document.write(showTime(<{$lis.time}>));</script></span>
                                        </h5>
                                        <p><{$lis.content}></p>
                                    </li>
                                    <{/if}>
                                    <{/foreach}>
                                </ul>
                                <{if $question.status eq 1 or $question.status eq 2}>
                                <div class="problem-details-block3-textarea">
                                    <textarea placeholder="Enter your message..." maxlength="200" class="servcontent"></textarea>
                                    <p class="clearfix">
                                        <span><span id="text-len">0</span>/2000</span>
                                        <input type="button" value="发&nbsp;&nbsp;&nbsp;送" class="send-msg">
                                    </p>
                                </div>
                                <{/if}>
                            </div>
                            <div class="problem-details-block3-right">
                                <h4>客服跟踪标签：</h4>
                                <div class="problem-block3-message-list">
                                    <ul>
                                        <{foreach $tag as $t}>
                                        <li class="clearfix">
                                            <span></span>
                                            <p><{$t.content}></p>
                                        </li>
                                        <{/foreach}>
                                    </ul>
                                </div>
                                <{if $question.status eq 1 or $question.status eq 2}>
                                <div class="problem-block3-message-input clearfix">
                                    <input type="text" placeholder="输入标签内容（16字）" class="problem-block3-input-left tagcontent" maxlength="16" />
                                    <input type="button" value="添加" class="problem-block3-input-right add-tag">
                                </div>
                                <{/if}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 问题详情 end -->
        </div>
    </div>
    <!-- 主内容 end-->
    <!-- 弹窗 start-->
    <div class="window-wrap">
        <div class="window-wrap-common">
        <div class="window-wrap-head clearfix">
            <span>配送订单</span>
            <a href="javascript:;" class="window-close"><img src="../images/common/icon-close.png" alt=""></a>
        </div>
        <div class="window-wrap-body">
            <!-- 订单退款 -->
            <div class="window-body-common delivery-refound">
                <form>
                    <div class="delivery-refound-inner">
                        <h2>填写退款原因</h2>
                        <div class="clearfix">
                            <span>退款原因</span>
                            <input type="text">
                            <select>
                                <option>货物有破损</option>
                                <option>货物有破损</option>
                                <option>货物有破损</option>
                                <option>货物有破损</option>
                                <option>货物有破损</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="window-wrap-foot">
            <div class="window-wrap-button clearfix">
                <span class="window-button-btnLeft">取消</span>
                <span class="window-button-btnRight"><input type="button" value="提交"></span>
            </div>
        </div>
        </div>
    </div>
    <!-- 弹窗 end-->
    <script type="text/javascript">
    $(function()
    {
        //隔行变色
        $(".problem-details-block3-left ul li:odd").css("background","#f9f9f9");
        $(".problem-details-block3-left ul li:even").css("background","#f5fbf3");

        $('.content').keydown(function(event)
        {
            if(event.keyCode == 13)
            {
                $('.add-tag').click();
            }
        });

        $('.add-tag').click(function()
        {
            var content = $('.tagcontent').val();
            content = $.trim(content);
            if(content != '')
            {
                $.post('/service/tag', {servId: '<{$question.id}>', content: content}, function (data)
                {
                    if(data.code == 0)
                    {
                        var html = '<li class="clearfix"><span></span><p>' + content + '</p></li>';
                        $('.problem-block3-message-list ul').append(html);
                        $('.tagcontent').val('');
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }, 'json');
            }
        });
        $('.servcontent').keyup(function()
        {
            getServContentLen();
        });

        $('.send-msg').click(function()
        {
            var content = $('.servcontent').val();
            content = $.trim(content);
            if(content != '')
            {
                $.post('/service/publishMessage', {servId: '<{$question.id}>', content: content}, function (data)
                {
                    if(data.code == 0)
                    {
                        var html = '<li><h5 class="clearfix"><span class="problem-block3-message-left">from&nbsp;<label><{$merchantInfo.name}></label></span><span class="problem-block3-message-right">' + showTime(data.data) + '</span></h5><p>' + content + '</p></li>';
                        $('.problem-details-block3-left ul').append(html);
                        $('.servcontent').val('');
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }, 'json');
            }
        });

        function getServContentLen()
        {
            var content = $('.servcontent').val();
            content = $.trim(content);
            $('#text-len').text(content.length);
        }
    });
    </script>
</body>
</html>