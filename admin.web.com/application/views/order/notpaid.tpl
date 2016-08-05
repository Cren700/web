<html>
<head>
    <meta charset="utf-8">
    <title>等待买家付款</title>
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
            <!-- 右边列表信息 start -->
            <div class="wrap-table-content">
                <div class="wrap-right">
                    <div class="wrap-right-parent">
                        <div class="wrap-right-content">
                            <div class="wrap-right-title">
                                <h2>等待买家付款</h2>
                                <ul class="clearfix">
                                    <li><a href="/order" >所有订单</a></li>
                                    <li <{if $type eq "unpaid" }>class='current'<{/if}>><a href="/order?type=unpaid">等待买家付款</a></li>
                                    <li><a href="/order?type=waitDelivery">等待发货</a></li>
                                    <li><a href="/order?type=delivered">已发货</a></li>
                                    <li><a href="/order?type=successOrder">成功订单</a></li>
                                    <li><a href="/order?type=closeOrder">关闭订单</a></li>
                                    <li><a href="/order/undeal">未处理订单</a></li>
                                </ul>
                            </div>
                            <div class="wrap-right-word clearfix">
                                <!-- <div class="wrap-word-left">
                                    <span><{$data|@count}>个订单</span>
                                    <p>导出选中的单</p>
                                </div> -->
                                <div class="wrap-word-right">
                                    <div class="wrap-word-page clearfix">
                                        <div class="wrap-word-pagechange">
                                            <div class="wrap-page-show"><code><{$page}></code>/<span><{$totalPage}></span>页</div>
                                            <ul class="wrap-page-list">
                                                <{section name=foo start=1 loop=$totalPage + 1 step=1}>
                                                <li><a href="/order?type=unpaid&p=<{$smarty.section.foo.index}>"><{$smarty.section.foo.index}></a></li>
                                                <{/section}>
                                            </ul>
                                        </div>
                                        <div class="wrap-word-pagetap">
                                            <a href="<{if $page eq 1}>javascript:;<{else}>/order?type=unpaid&p=<{$page - 1}><{/if}>" class="word-pagetap-prev">上一页</a>
                                            <a href="/order?type=unpaid&p=<{$page + 1}>" class="word-pagetap-next">下一页</a>
                                        </div>
                                    </div>
                                    <form action="/order" method='get' id="search">
                                        <div class="wrap-word-search clearfix">
                                            <div class="wrap-search-id">
                                                <select name='stype' class="wrap-id-show wrap-page-common">
                                                    <option value='orderid' <{if $stype eq "" || $stype eq 'orderid'}>selected<{/if}>>订单ID</option>
                                                    <option value='email' <{if $stype eq "email" }>selected<{/if}>>邮箱</option>
                                                    <option value='transactionid' <{if $stype eq "transactionid" }>selected<{/if}>>交易号</option>
                                                    <option value='uid' <{if $stype eq "uid" }>selected<{/if}>>买家ID</option>
                                                    <option value='username' <{if $stype eq "username"}>selected<{/if}>>姓名</option>
                                                    <option value='logistics' <{if $stype eq "logistics"}>selected<{/if}>>跟踪号</option>
                                                </select>
                                            </div>
                                            <div class="wrap-search-type">
                                                <button type='submit'><img src="/images/common/icon-search1.png" alt=""></button>
                                                <input type="text" name='search' placeholder="" value='<{$search}>'>
                                                <input type="hidden" name='type' value="<{$type}>">
                                                <input type="hidden" name='submit' value='true'>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        	<{if $data|@count neq 0}>
                            <div class="wrap-right-list">
                                <form action="">
                                    <ul>
                                        <li class="thead clearfix">
                                            <div class="trade-date">交易日期</div>
                                            <div class="order-id">订单ID</div>
                                            <div>订单状态</div>
                                            <div style="width:10%;">SKU</div>
                                            <div style="width:10%;">姓名</div>
                                            <div style="width:12%;">邮箱</div>
                                            <div style="width:10%;">电话</div>
                                            <div>国家</div>
                                            <div>标签</div>
                                            <div>总价</div>
                                            <div>付款类型</div>
                                            <div class="">交易日期</div>
                                            <div class="operatione-thead">操作</div>
                                        </li>
                                        <{foreach $data as $value}>
                                        <li class="clearfix" id='<{$value.orderId}>'>
                                            <div class="trade-time trade-date list-float">
                                                <label for=""><{$value.createTime|date_format:'%Y/%m/%d %H:%M:%S'}></label>
                                            </div>
                                            <div class="order-number order-id list-float" style="text-align: center;"><a href="/order/details?orderid=<{$value.orderId}>" style="color:#21aeff;"><{$value.orderId}></a></div>
                                            <div class="order-status1 list-float"><{$value.status|getOrderStatus}></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><{$value.skus}></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><{$value.shoppingAddr.firstName}>&nbsp;<{$value.shoppingAddr.lastName}></div>
                                            <div class="list-float" style="width:12%;word-break:break-all;text-align: center;"><a href="/order?stype=email&search=<{$value.shoppingAddr.email}>&type=unpaid&submit=true"><{$value.shoppingAddr.email|default:"-"}></a></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><{$value.shoppingAddr.phone}></div>
                                            <div class="list-float" style="text-align: center;"><{$value.shoppingAddr.country}></div>
                                            <div class="list-float" style="text-align: center;"><{$value.lable|default:"-"}></div>
                                            <div class="list-float" style="text-align: center;">$ <{$value.totalPrice|number_format:2}></div>
                                            <div class="list-float" style="text-align: center;"><{if $value.payType eq 1}>Paypal<{else if $value.payType eq 2}>信用卡<{else}>-<{/if}></div>
                                            <div class="list-float" style="text-align: center;">
                                                <label for=""><{if $value.payTime}><{$value.payTime|date_format:'%Y/%m/%d %H:%M:%S'}><{else}>-<{/if}></label>
                                            </div>
                                            <div class="operation-list list-float">
                                                <div class="wrap-page-common">操作</div>
                                                <ul class="window-btn">
                                                    <li><a href="/order/details?orderid=<{$value.orderId}>">查看</a></li>
                                                    <li><a href="/order/linkmer?orderid=<{$value.orderId}>">联系买家</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <{/foreach}>
                                    </ul>
                                </form>
                            </div>
	                        <{else}>
							<div style="padding-top:30px; font-size:18px; color:red">
								暂无相关数据
							</div>
                        	<{/if}>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 右边列表信息 end -->
        </div>
    </div>
    <!-- 主内容 end-->
    <script type="text/javascript">
    $(function(){
        //显示下拉列表
        showSelect();
    });
    </script>
</body>
</html>