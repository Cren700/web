<html>
<head>
    <meta charset="utf-8">
    <title>未处理订单</title>
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
                                <h2>未处理订单</h2>
                                <ul class="clearfix">
                                     <li><a href="/order" >所有订单</a></li>
                                    <li><a href="/order?type=unpaid">等待买家付款</a></li>
                                    <li><a href="/order?type=waitDelivery">等待发货</a></li>
                                    <li><a href="/order?type=delivered">已发货</a></li>
                                    <li><a href="/order?type=successOrder">成功订单</a></li>
                                    <li><a href="/order?type=closeOrder">关闭订单</a></li>
                                    <li <{if $type eq "undeal" }>class='current'<{/if}>><a href="/order/undeal">未处理订单</a></li>
                                </ul>
                            </div>
                            <div class="wrap-right-word clearfix">
                                <!-- <div class="wrap-word-left">
                                    <span><{$data|@count}>个订单未处理</span>
                                    <p>导出选中的单</p>
                                </div> -->
                                <div class="wrap-word-right">
                                    <div class="wrap-word-page clearfix">
                                        <div class="wrap-word-pagechange">
                                            <div class="wrap-page-show"><code><{$page}></code>/<span><{$totalPage}></span>页</div>
                                            <ul class="wrap-page-list">
                                                <{section name=foo start=1 loop=$totalPage + 1 step=1}>
                                                <li><a href="/order/undeal?p=<{$smarty.section.foo.index}>"><{$smarty.section.foo.index}></a></li>
                                                <{/section}>
                                            </ul>
                                        </div>
                                        <div class="wrap-word-pagetap">
                                            <a href="<{if $page eq 1}>javascript:;<{else}>/order/undeal?p=<{$page - 1}><{/if}>" class="word-pagetap-prev">上一页</a>
                                            <a href="/order/undeal?p=<{$page + 1}>" class="word-pagetap-next">下一页</a>
                                        </div>
                                    </div>
                                    <form action="/order/undeal" method='get' id="search">
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
                                        <li class="clearfix" id='<{$value.orderId}>' data-para="221">
                                            <div class="trade-time trade-date list-float" style="text-align: center;">
                                                <label for=""><{$value.createTime|date_format:'%Y/%m/%d %H:%M:%S'}></label>
                                            </div>
                                            <div class="order-number order-id list-float"><a href="/order/details?orderid=<{$value.orderId}>" style="color:#21aeff;"><{$value.orderId}></a></div>
                                            <div class="order-status1 list-float"><{$value.status|getOrderStatus}></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><{$value.skus}></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><{$value.shoppingAddr.firstName}>&nbsp;<{$value.shoppingAddr.lastName}></div>
                                            <div class="list-float" style="width:12%;word-break:break-all;text-align: center;"><a href="/order/undeal?stype=email&search=<{$value.shoppingAddr.email}>&type=&submit=true"><{$value.shoppingAddr.email|default:"-"}></a></div>
                                            <div class="list-float" style="width:10%;word-break:break-all;text-align: center;"><{$value.shoppingAddr.phone}></div>
                                            <div class="list-float" style="text-align: center;"><{$value.shoppingAddr.country}></div>
                                            <div class="list-float" style="text-align: center;"><{$value.lable|default:"-"}></div>
                                            <div class="list-float" style="text-align: center;">$ <{$value.totalPrice|number_format:2}></div>
                                            <div class="list-float" style="text-align: center;"><{if $value.payType eq 1}>Paypal<{else if $value.payType eq 2}>信用卡<{else}>-<{/if}></div>
                                            <div class="list-float" style="text-align: center;">
                                                <label for=""><{$value.payTime|date_format:'%Y/%m/%d %H:%M:%S'}></label>
                                            </div>
                                            <div class="operation-list list-float">
                                                <div class="wrap-page-common">操作</div>
                                                <ul class="window-btn">
                                                    <li><a href="/order/details?orderid=<{$value.orderId}>">查看</a></li>
                                                    <li data-num=1 data-flag=true class='<{$value.orderId}>'><a href="javascript:;">发货</a>
                                                    <li data-num=2 data-flag=true class='<{$value.orderId}>'><a href="javascript:;">退款</a></li>
                                                    <li><a href="/order/linkmer?orderid=<{$value.orderId}>">联系买家</a></li>
                                                    <li data-num=3 data-flag=true class='<{$value.orderId}>'><a href="javascript:;">编辑发货地址</a></li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name='street_line1' value='<{$value.shoppingAddr.address1}>'>
                                            <input type="hidden" name='street_line2' value='<{$value.shoppingAddr.address2}>'>
                                            <input type="hidden" name='city' value='<{$value.shoppingAddr.city}>'>
                                            <input type="hidden" name='state' value='<{$value.shoppingAddr.state}>'>
                                            <input type="hidden" name='postal_code' value='<{$value.shoppingAddr.zipCode}>'>
                                            <input type="hidden" name='country' value='<{$value.shoppingAddr.country}>'>
                                            <input type="hidden" name='first_name' value='<{$value.shoppingAddr.firstName}>'>
                                            <input type="hidden" name='last_name' value='<{$value.shoppingAddr.lastName}>'>
                                            <input type="hidden" name='phone_number' value='<{$value.shoppingAddr.phone}>'>
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
    <!-- 弹窗 start-->
    <div class="window-wrap">
        <div class="window-wrap-common">
            <div class="window-wrap-head clearfix">
                <span>配送订单</span>
                <a href="javascript:;" class="window-close"><img src="../images/common/icon-close.png" alt=""></a>
            </div>
            <div class="window-wrap-body">

                <!-- 发货 -->

                <div class="window-body-common delivery-goods">
                    <form action="/order/dodeliveryorder" method="post" id='dodelivery'>
                        <div class="delivery-goods-block1 clearfix">
                            <span>配送服务提供商</span>
                            <div class="delivery-goods-server">
                                <select class="delivery-order-select" name='logistics_co_id'>
                                    <{foreach $logistics as $v}>
                                        <option value='<{$v.id}>'><{$v.comName}></option>
                                    <{/foreach}>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix">
                            <span>跟踪编号</span>
                            <input type="text" name='logistics_id'>
                        </div>
                        <input type="hidden" name='orderid'>
                    </form>
                </div>

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
                            <input type="hidden" name='orderid'>
                        </div>
                    </form>
                </div>

                <!-- 编辑送货地址 -->
                <div class="window-body-common delivery-address">
                    <form action="/order/doeditadd" method='post' id="editadd">
                        <div>
                            <span>街道地址1</span>
                            <input type="text" name='street_line1' id="street_line1" />
                        </div>
                        <div>
                            <span>街道地址2</span>
                            <input type="text" name='street_line2' id="street_line2" />
                        </div>
                        <div>
                            <span>城&nbsp;&nbsp;&nbsp;&nbsp;市</span>
                            <input type="text" name='city' id="city" />
                        </div>
                        <div>
                            <span>洲/&nbsp;省/&nbsp;区</span>
                            <input type="text" name='state' id="state" />
                        </div>
                        <div>
                            <span>国&nbsp;&nbsp;&nbsp;&nbsp;家</span>
                            <input type="text" name='country' id="country" />
                        </div>
                        <div>
                            <span>邮&nbsp;&nbsp;&nbsp;&nbsp;编</span>
                            <input type="text" name='postal_code' id="postal_code" />
                        </div>
                        <div>
                            <span>名</span>
                            <input type="text" name='first_name' id="first_name" />
                        </div>
                        <div>
                            <span>姓</span>
                            <input type="text" name='last_name' id="last_name" />
                        </div>
                        <div>
                            <span>电&nbsp;&nbsp;&nbsp;&nbsp;话</span>
                            <input type="text" name='phone_number' id="phone_number" />
                        </div>
                        <input type="hidden" name='orderid'>
                    </form>
                </div>
                <!-- 配送订单 -->
                <div class="window-body-common delivery-order">
                    <table>
                        <thead>
                            <tr>
                                <th>订单ID</th>
                                <th>配送服务提供商</th>
                                <th>跟踪编号</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>654613131321316313615</td>
                                <td class="delivery-server-business">
                                    <div class="delivery-order-select wrap-page-common">USPD</div>
                                    <ul>
                                        <li><a href="javascript:;">USPD1</a></li>
                                        <li><a href="javascript:;">USPD2</a></li>
                                        <li><a href="javascript:;">USPD3</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <input type="text">
                                </td>
                            </tr>
                            <tr>
                                <td>654613131321316313615</td>
                                <td class="delivery-server-business">
                                    <div class="delivery-order-select wrap-page-common">USPD</div>
                                    <ul>
                                        <li><a href="javascript:;">USPD1</a></li>
                                        <li><a href="javascript:;">USPD2</a></li>
                                        <li><a href="javascript:;">USPD3</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <input type="text">
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    <script type="text/javascript">
    $(function(){

        //弹框表单提交

        $("input[name='sub']").click(function()
        {
            var type = $("input[name='subtype']").val();
            if(type == 1)
            {
                $("#dodelivery").trigger("submit");
            }
            else if(type == 2)
            {
                $("#refund").trigger("submit");
            }
            else if(type == 3)
            {
                $("#editadd").trigger("submit");
            }
        });

        //显示下拉列表
        showSelect();
    });
    </script>
</body>
</html>