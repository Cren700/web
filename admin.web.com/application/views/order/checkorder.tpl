<html>
<head>
    <meta charset="utf-8">
    <title>订单详情</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
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
            <!-- 订单详情 start -->

			<div class="wrap-right">
				<div class="wrap-right-content">
					<div class="details-content-title">
						<h2>订单详情</h2>
					</div>
					<div class="details-content-inner">
						<{if $code eq 0}>
						<div class="details-inner-block1 details-block-common">
							<h3 class="clearfix">
								<a href="javascript:history.go(-1)">所有订单</a>
								<span>/订单详情</span>
							</h3>
							<ul>
								<li><span>订单&nbsp;&nbsp;ID：</span><{$data.orderId}></li>
								<li><span>订单状态：</span><{$data.status|getOrderStatus}></li>
								<li><span>总&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价：</span>$<{$data.totalPrice|number_format:2}></li>
                                <li><span>配送费用：</span>$<{$data.shipping|number_format:2}></li>
								<li><span>transactionid：</span><{$data.transactionid}></li>
								<li><span>交易时间：</span><{$data.createTime|date_format:'%Y/%m/%d %H:%M:%S'}></li>
                                <li><span>付款时间：</span><{if $data.payTime}><{$data.payTime|date_format:'%Y/%m/%d %H:%M:%S'}><{else}>-<{/if}></li>
								<li>
                                    <form action='/order/changeOrderLable' method="post" id="changeOrderLableForm">
                                        <input type="hidden" name="orderid" value="<{$data.orderId}>">
                                        <span>订单标签：</span>
                                        <span>
                                            <select name="lable" style="height:32px;font-size:14px;border-radius:3px;">
                                                <option value="">-- 选择订单标签 --</option>
                                                <option value="Pending" <{if $data.lable eq 'Pending'}>selected<{/if}>>Pending</option>
                                                <option value="Review" <{if $data.lable eq 'Review'}>selected<{/if}>>Review</option>
                                                <option value="Paid" <{if $data.lable eq 'Paid'}>selected<{/if}>>Paid</option>
                                                <option value="3rd-System-Refunded" <{if $data.lable eq '3rd-System-Refunded'}>selected<{/if}>>3rd-System-Refunded</option>
                                                <option value="Trading-Frozen" <{if $data.lable eq 'Trading-Frozen'}>selected<{/if}>>Trading-Frozen</option>
                                                <option value="Trading-Closed" <{if $data.lable eq 'Trading-Closed'}>selected<{/if}>>Trading-Closed</option>
                                                <option value="Paypal-Canceled-Reversal" <{if $data.lable eq 'Paypal-Canceled-Reversal'}>selected<{/if}>>Paypal-Canceled-Reversal</option>
                                            </select>
                                        </span>
                                        <input type="button" value="修改" class="submit" style="height:32px;width:50px;" />
                                    </form>
                                    <script type="text/javascript">
                                        $('#changeOrderLableForm .submit').click(function(e){
                                            //alert(1);return;
                                            e.preventDefault();
                                            var lable = $('#changeOrderLableForm select[name="lable"]').val();
                                            if (lable == 'Select Lable')
                                            {
                                                alert('Please select lable');
                                                return false;
                                            };
                                            $.ajax({
                                                url:'/order/changeOrderLable',
                                                dataType:'json',
                                                type:'post',
                                                data:{'orderid':$('#changeOrderLableForm input[name="orderid"]').val(),'lable':lable},
                                                success:function(data)
                                                {
                                                    if(data.code == 0)
                                                    {
                                                        alert("更新成功");
                                                    }
                                                    else
                                                    {
                                                        alert(data.msg);
                                                    }
                                                    //window.location.reload();
                                                }
                                            });
                                            return false;
                                        })


                                    </script>
                                </li>
                                <li><span>添加备注：</span><textarea name="order-tips" id="" cols="50" rows="3" maxlength='120' placeholder='最大长度为100'><{$data.tips}></textarea><input type="button" value="添加" class="saved-btn" style="height:32px;width:50px; margin:10px;" /></li>
                                <script>
                                    $(".saved-btn").click(function(){
                                        var text = $.trim($('textarea[name=order-tips]').val());
                                        var url = '/order/savedOrderTips';
                                        $.post(url, {'tips': text, 'orderid':$('#changeOrderLableForm input[name="orderid"]').val()}, function(data){
                                            if(data.code)
                                            {
                                                alert(data.msg);
                                            }
                                            else
                                            {
                                                alert("添加备注成功.");
                                            }
                                        }, "JSON");
                                    })
                                </script>
							</ul>
						</div>

						<div class="details-inner-block2 details-block-common">
							<h4>商品详情</h4>
							<div class="details-block-pd">
								<{foreach $data.productList as $prolist}>
									<ul>
										<li class="clearfix">
											<span>商品名称：</span>
											<label><{$prolist.name}></label>
										</li>
										<li class="clearfix">
											<span>图&nbsp;&nbsp;&nbsp;片：</span>
											<img src="<{$prolist.image}>" alt="" width='200px'>
										</li>
										<li class="clearfix">
											<span>SKU：</span>
											<label><{$prolist.uniq}></label>
										</li>
										<li class="details-inner-info clearfix">
                                            <{foreach $prolist.sku as $sku}>
											<span>内存：<label><{$sku}></label></span>
                                            <{/foreach}>
											<span>单价：<label>$ <{$prolist.price|number_format:2}></label></span>
											<span>数量：<label><{$prolist.quantity}></label></span>
										</li>
									</ul>
								<{/foreach}>
							</div>
						</div>
						<div class="details-inner-block1 details-block-common">
							<h4>配送信息</h4>
							<div class="details-block-pd">
								<ul>
									<li><span>街道地址1：</span><{$data.shoppingAddr.address1}></li>
									<li><span>街道地址2：</span><{$data.shoppingAddr.address2}></li>
									<li><span>城市：</span><{$data.shoppingAddr.city}></li>
									<li><span>洲/省/地区：</span><{$data.shoppingAddr.state}></li>
									<li><span>国家：</span><{$data.shoppingAddr.country}></li>
									<li><span>邮编：</span><{$data.shoppingAddr.zipCode}></li>
									<li><span>收件人：</span><{$data.shoppingAddr.firstName}>&nbsp;<{$data.shoppingAddr.lastName}></li>
                                    <li><span>电话：</span><{$data.shoppingAddr.phone}></li>
									<li><span>邮箱：</span><{$data.shoppingAddr.email}></li>
								</ul>
							</div>
						</div>
                        <{if $data.logisticsInfo|@count neq 0}>
						<div class="details-inner-block1 details-block-common">
							<h4>物流信息</h4>
							<div class="details-block-pd">
								<ul>
									<li><span>配送服务提供商：</span><{$data.logisticsInfo.companyInfo.name}></li>
									<li><span>跟踪编号：</span><{$data.logisticsInfo.logisticsId}></li>
                                    <{foreach $data.logisticsInfo.logisticsDetail as $detail}>
                                    <li><{$detail.time}> - <{$detail.itemValue}></li>
                                    <{/foreach}>
								</ul>
							</div>
						</div>
                        <{/if}>
						<div class="details-inner-block3 details-block-common clearfix">
							<h4>操作：</h4>
							<ul class="window-btn clearfix">
								<{if $data.status gt 1 && $data.status lt 4}><li data-num=1 data-flag=true><a href="javascript:;">退款</a></li><{/if}>
								<!-- <li><a href="javascript:;">联系买家</a></li> -->
								<{if $data.status eq 2}><li data-num=2 data-flag=true><a href="javascript:;">编辑配送地址</a></li><{/if}>
							</ul>
						</div>
						<{else}>
						<div class="details-inner-block1 details-block-common">
							<h3 class="clearfix">
								<a href="javascript:history.go(-1)">所有订单</a>
								<span>/订单详情</span>
							</h3>
							<h4 style='color:red'><{$msg}></h4>
						</div>
						<{/if}>
					</div>
				</div>
			</div>

			<!-- 订单详情 end -->
        </div>
    </div>
    <!-- 主内容 end-->
    <!-- 弹窗 start-->
    <div class="window-wrap">
        <div class="window-wrap-common">
            <div class="window-wrap-head clearfix">
                <span>配送订单</span>
                <a href="javascript:;" class="window-close"><img src="/images/common/icon-close.png" alt=""></a>
            </div>
            <div class="window-wrap-body">
                <!-- 订单退款 -->
                <div class="window-body-common delivery-refound">
                    <form action="/order/dorefund" method="post" id="refund">
                        <div class="delivery-refound-inner">
                            <h2>填写退款原因</h2>
                            <div class="clearfix">
                                <span>退款金额</span>
                                <input type="text" name='refund_fee'>
                                <select name="refund_reason">
                                    <{foreach $reasonList as $reason}>
                                        <option value="<{$reason.name}>" ><{$reason.name}></option>
                                    <{/foreach}>
                                </select>
                            </div>
                            <input type="hidden" name='orderid' value='<{$data.orderId}>'>
                        </div>
                    </form>
                </div>
                <!-- 编辑送货地址 -->
                <div class="window-body-common delivery-address">
                    <form action="/order/doeditadd" method='post' id="editadd">
                        <div>
                            <span>街道地址1</span>
                            <input type="text" name='street_line1' value='<{$data.shoppingAddr.address1}>'>
                        </div>
                        <div>
                            <span>街道地址2</span>
                            <input type="text" name='street_line2' value='<{$data.shoppingAddr.address2}>'>
                        </div>
                        <div>
                            <span>城&nbsp;&nbsp;&nbsp;&nbsp;市</span>
                            <input type="text" name='city' value='<{$data.shoppingAddr.city}>'>
                        </div>
                        <div>
                            <span>洲/&nbsp;省/&nbsp;区</span>
                            <input type="text" name='state' value='<{$data.shoppingAddr.state}>'>
                        </div>
                        <div>
                            <span>国&nbsp;&nbsp;&nbsp;&nbsp;家</span>
                            <input type="text" name='country' value='<{$data.shoppingAddr.zipCode}>'>
                        </div>
                        <div>
                            <span>邮&nbsp;&nbsp;&nbsp;&nbsp;编</span>
                            <input type="text" name='postal_code' value='<{$data.shoppingAddr.country}>'>
                        </div>
                        <div>
                            <span>收件人名</span>
                            <input type="text" name='first_name' value='<{$data.shoppingAddr.firstName}>'>
                        </div>
                        <div>
                            <span>收件人姓</span>
                            <input type="text" name='last_name' value='<{$data.shoppingAddr.lastName}>'>
                        </div>
                        <div>
                            <span>电&nbsp;&nbsp;&nbsp;&nbsp;话</span>
                            <input type="text" name='phone_number' value='<{$data.shoppingAddr.phone}>'>
                        </div>
                        <input type="hidden" name='orderid' value="<{$data.orderId}>">
                    </form>
                </div>

            </div>
            <div class="window-wrap-foot">
                <div class="window-wrap-button clearfix">
                    <span class="window-button-btnLeft">取消</span>
                    <span class="window-button-btnRight"><input type="button" name='sub' value="提交"></span>
                </div>
            </div>
            <input type="hidden" name='subtype'>
        </div>
    </div>

    <!-- 弹窗 end-->
    <script>
    //弹框表单提交

    $("input[name='sub']").click(function()
    {
        var type = $("input[name='subtype']").val();
        if(type == 1)
        {
            $("#refund").trigger("submit");
        }
        else if(type == 2)
        {
            $("#editadd").trigger("submit");
        }
    });
    </script>
</body>
</html>