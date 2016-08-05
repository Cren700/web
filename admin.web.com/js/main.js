$(function(){

	//元素高度计算，最小为屏幕高度

	function adaptiveHeight(){
		var winH = $(window).height(),
			leftH = $(".wrap-left").height(),
			rightH = $(".wrap-right").height(),
			oH = leftH > rightH ? leftH : rightH;

		if((oH+80) < winH){
			$(".wrap-left,.wrap-right").height(winH-105);
		}else{
			$(".wrap-left,.wrap-right").height(oH);
		}
	}
	adaptiveHeight();


	//右边内容模块适应屏幕

	function widthAdaptive(){

		var winW = adaptiveScreen().x;

		$(".wrap-right").width(winW - 240);
	}
	widthAdaptive();

	//监听窗口变化适应屏幕

	$(window).on("resize",function(){

		widthAdaptive();
		adaptiveHeight();
		hideWindow();
	});

	//隐藏的弹窗元素高度适应屏幕高度

	function hideWindow(){
		var winH = adaptiveScreen().y,
			wrap = $(".window-wrap");

		wrap.css("height",winH);
	}

	//改变侧边菜单栏状态并显示下拉列表

	$(".wrap-left-content li div").on("click",function(){

		var _this = $(this);

		if(_this.hasClass("current")){
			_this.removeClass("current");
		}else{
			_this.addClass("current");
		}

		if(_this.next("dl").css("display") == "block"){
			_this.next("dl").stop(true,true).slideUp(200);

		}else{
			_this.next("dl").stop(true,true).slideDown(200);
		}
	});

	$(".menu-left-home").unbind();

	//弹窗显示

	$("li[data-flag=true],span[data-flag=true]").on("click",function(){
		var _this = $(this),
			dataText = _this.text(),
			dataNum = _this.attr("data-num");
			orderid = _this.parent().parent().parent("li").attr('id');
        if(dataNum == '3')
        {
            var street_line1 = $(this).parents('li.clearfix').find('input[name="street_line1"]').val();
            var street_line2 = $(this).parents('li.clearfix').find('input[name="street_line2"]').val();
            var city = $(this).parents('li.clearfix').find('input[name="city"]').val();
            var state = $(this).parents('li.clearfix').find('input[name="state"]').val();
            var country = $(this).parents('li.clearfix').find('input[name="country"]').val();
            var postal_code = $(this).parents('li.clearfix').find('input[name="postal_code"]').val();
            var first_name = $(this).parents('li.clearfix').find('input[name="first_name"]').val();
            var last_name = $(this).parents('li.clearfix').find('input[name="last_name"]').val();
            var phone_number = $(this).parents('li.clearfix').find('input[name="phone_number"]').val();
            //console.log(street_line1, street_line2,phone_number, $('#street_line1').val());

            $('input[name=street_line1]').val(street_line1);
            $('input[name=street_line2]').val(street_line2);
            $('input[name=city]').val(city);
            $('input[name=state]').val(state);
            $('input[name=country]').val(country);
            $('input[name=postal_code]').val(postal_code);
            $('input[name=first_name]').val(first_name);
            $('input[name=last_name]').val(last_name);
            $('input[name=phone_number]').val(phone_number);
        }
		alertWindow({
			"text" : dataText,
			"num"  : dataNum,
			"orderid"	: orderid
		});
	});

	//显示下拉列表

	$(".page-numbles-counter").parent().parent().hover(function(){

		var _this = $(".page-numbles-counter");

		_this.parent().next().stop(true,true).slideDown(200);

		_this.addClass("current");

	},function(){

		var _this = $(".page-numbles-counter");

		_this.parent().next().stop(true,true).delay(100).slideUp(200);

		_this.removeClass("current");

	}).find("li").on("click",function(){
		var _this = $(this),
			text = _this.text();

		_this.parent().stop(true,true).slideUp(200);

		$(".page-numbles-counter").text(text);
	});

	//商品类型下拉
	$(".wrap-page-common").each(function(){
		var _this = $(this);

		_this.parent().hover(function(){

			_this.addClass("current");

			_this.next().stop(true,true).slideDown(200);

		},function(){

			_this.removeClass("current");

			_this.next().stop(true,true).delay(100).slideUp(200);

		});

	}).next().find("li").on("click",function(){
		var _this = $(this),
			text = _this.find("a").html();

		if(_this.parent().prev().hasClass("wrap-id-show") || _this.parent().prev().hasClass("delivery-order-select") || _this.parent().prev().hasClass("change-choose-address")){
			_this.parent().prev().html(text);
		}

	});

	//发货
    $("#dodelivery").submit(function()
    {
        var opt = {
            dataType: 'json',
            type: 'post',
            success: function (data)
            {
                if(data.code == 0)
                {
                    alert("更新成功");
                }
                else
                {
                    alert(data.msg);
                }
                window.location.reload();
            }
        };
        $(this).ajaxSubmit(opt);
        return false;
    });

    //退款
    $("#refund").submit(function()
    {
        var opt = {
            dataType: 'json',
            type: 'post',
            success: function (data)
            {
                if(data.code == 0)
                {
                    alert("退款成功");
                }
                else alert(data.msg);
                window.location.reload();
            }
        };
        $(this).ajaxSubmit(opt);
        return false;
    });

    // 改变订单状态
    $("#dochangestatus").submit(function()
    {
        if($('#dochangestatus input[name="reason"]').val() == '')
        {
            alert('请填写修改状态原因');
            return false;
        }
        var opt = {
            dataType: 'json',
            type: 'post',
            success: function (data)
            {
                if(data.code == 0)
                {
                    alert("修改成功");
                }
                else alert(data.msg);
                window.location.reload();
            }
        };
        $(this).ajaxSubmit(opt);
        return false;
    });

//编辑地址

    $("#editadd").submit(function()
    {
        var opt = {
            dataType: 'json',
            type: 'post',
            success: function (data)
            {
                if(data.code == 0)
                {
                    alert("更新成功");
                }
                else alert(data.msg);
                window.location.reload();
            }
        };
        $(this).ajaxSubmit(opt);
        return false;
    });

});


	//订单详情修改 tag

    $("#changeOrderLableForm").submit(function()
    {
        var opt = {
            dataType: 'json',
            type: 'post',
            success: function (data)
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
        };
        $(this).ajaxSubmit(opt);
        return false;
    });



//弹窗

function alertWindow(json){
	var winH = adaptiveScreen().y,
		wrap = $(".window-wrap"),
		oH = 0,
		wrapHead = $(".window-wrap-head"),
		wrapFoot = $(".window-wrap-foot"),
		content = $(".window-wrap-common"),
		wrapBody = $(".window-body-common");
		orderid = json.orderid;

	wrapBody.eq(json.num-1).stop(true,true).show().siblings().stop(true,true).hide();

	wrap.css({"height" : winH}).show();


	//关闭弹窗

	$(".window-button-btnLeft,.window-close").on("click",function(){
		wrap.hide();
		content.hide().css({top : "50%"}).parent().css({"position":"fixed","height":$(".wrap-right").height()+80});
		$("html,body").css("height",$(".wrap-right").height()+80);
	});

	//内容垂直居中

	oH = parseInt(content.height()+content.css("padding"));


	content.show().css("margin-top",-oH/2);

	if(oH > winH){
		$("html,body").css("height",oH);
		content.css({"margin-top":"80px",top : 0}).parent().css({"position":"absolute","height":oH+160});
	}

	//配置信息
	if(json.num == 1)
	{
		$("#dodelivery input[name='orderid']").val(orderid);
	}
	else if(json.num == 2)
	{
		$("#refund input[name='orderid']").val(orderid);
	}
	else if (json.num == 3)
	{
		$("#editadd input[name='orderid']").val(orderid);
		$("#editadd input[name='address1']").val($("#"+orderid+" input[name='address1']").val());
		$("#editadd input[name='address2']").val($("#"+orderid+" input[name='address2']").val());
		$("#editadd input[name='city']").val($("#"+orderid+" input[name='city']").val());
		$("#editadd input[name='state']").val($("#"+orderid+" input[name='state']").val());
		$("#editadd input[name='zipCode']").val($("#"+orderid+" input[name='zipCode']").val());
		$("#editadd input[name='country']").val($("#"+orderid+" input[name='country']").val());
		$("#editadd input[name='firstName']").val($("#"+orderid+" input[name='firstName']").val());
		$("#editadd input[name='lastName']").val($("#"+orderid+" input[name='lastName']").val());
		$("#editadd input[name='phone']").val($("#"+orderid+" input[name='phone']").val());
	}
    else if(json.num == 4)
    {
        $("#dochangestatus input[name='orderid']").val(orderid);
    }
	$("input[name='subtype']").val(json.num);
	wrapHead.find("span").html(json.text);


}

//元素宽高适应屏幕

function adaptiveScreen(){
	var size = {"x" : 0,"y" : 0},
		x,
		y;

	x = window.innerWidth || document.body.clientWidth || document.documentElement.clientWidth;
	y = window.innerHeight || document.body.clientHeight || document.documentElement.clientHeight;

	size.x = x;
	size.y = y;

	return size;
}

//显示下拉列表

function showSelect(){

	$(".wrap-page-show").on("click",function(){

		var obj = $(".wrap-page-list");

		if(obj.hasClass("current")){

			obj.removeClass("current");

			$(this).removeClass("current");

		}else{

			obj.addClass("current");

			$(this).addClass("current");
		}
	}).next().find("li").on("click",function(){

		$(".wrap-page-list").prev().removeClass("current");

		var obj = $(".wrap-page-list"),
			_this = $(this),
			text = _this.find("a").html();

		obj.removeClass("current");

		$(".wrap-page-show").find("code").html(text);

		showPage();

	}).parent().mCustomScrollbar().find(".mCSB_scrollTools").css("width","5px").find(".mCSB_dragger_bar").css({"width":"4px","background":"#d0d0d0"}).parent().next().css("background","#fff");
}
