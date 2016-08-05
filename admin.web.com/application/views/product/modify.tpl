<html>
<head>
	<meta charset="utf-8">
	<title>编辑商品</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="/js/jquery.form.js"></script>
    <link rel="stylesheet" href="/css/kindeditor/default/default.css" />
    <style type="text/css">
      img:hover{cursor: pointer;}
    </style>
</head>
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
			<!-- 编辑商品 start -->
			<div class="wrap-right">
				<div class="wrap-right-content">
					<div class="details-content-title">
						<h2>商品管理</h2>
					</div>
					<div class="details-content-inner">
						<div class="details-inner-block1">
							<h3 class="clearfix">
								<a href="javascript:history.go(-1)">商品管理</a>
								<span>/编辑商品</span>
							</h3>
						</div>
						<form action="/product/modifyhandle" method="post" id="modifyproduct">
							<div class="edit-commodity-content">
								<div class="commedity-edit">
									<div class="commedity-edit-block1 commodity-edit-common">
									<div class="clearfix">
										<span>商品名称</span>
										<input type="text" name="name" value="<{$info.name}>" autocomplete="off" />
									</div>
									<div class="clearfix">
										<span>商品标签</span>
										<input type="text" name="tag" value="<{$info.tag}>" autocomplete="off" />
									</div>
									<div class="clearfix">
										<span>seo:Keyword</span>
										<input type="text" name="seoKeyword" value="<{$info.seoKeywords}>" autocomplete="off" />
									</div>
									<div class="clearfix">
										<span>seo:Description</span>
										<input type="text" name="seoDescription" value="<{$info.seoDescription}>" autocomplete="off" />
									</div>
                                    <div class="clearfix new-commodity-radio">
                                        <span>投放平台</span>
                                        <p class="clearfix">
                                            <label class="put-platform"><input type="checkbox" name="device[]" value="1" <{if in_array(1, $info.device)}> checked<{/if}> class="put-in">Android</label>
                                            <label class="put-platform"><input type="checkbox" name="device[]" value="2" <{if in_array(2, $info.device)}> checked<{/if}> class="put-in">iPhone</label>
                                            <label class="put-platform"><input type="checkbox" name="device[]" value="3" <{if in_array(3, $info.device)}> checked<{/if}> class="put-in">iPad</label>
                                            <label class="put-platform"><input type="checkbox" name="device[]" value="7" <{if in_array(7, $info.device)}> checked<{/if}> class="put-in">Mobile</label>
                                            <label class="put-platform"><input type="checkbox" name="device[]" value="10" <{if in_array(10, $info.device)}> checked<{/if}> class="put-in">www</label>
                                        </p>
                                    </div>
									<div class="clearfix">
										<span>提示消息</span>
										<input type="text" name="descText" value="<{$info.descText}>" autocomplete="off">
									</div>
                                        <div class="clearfix">
                                            <span>赠品预览</span>
                                            <input type="text"
                                                   name="preGiftSkuIds" value="<{$info.preGiftSkuIds}>" autocomplete="off"
                                                   placeholder="请输入赠品预览的SKU"
                                                    >
                                        </div>
                                        <div class="clearfix">
                                            <span>赠品</span>
                                            <input type="text"
                                                   name="giftSkuIds" value="<{$info.giftSkuIds}>" autocomplete="off"
                                                   placeholder="请输入赠品SKU">
                                        </div>
									<!-- <div class="clearfix">
										<span>配送时间</span>
										<div class="commodity-delivery-time clearfix">
											<label for="">
												最小预估数
												<input type="text" name="min" value="<{$info.min}>" />
											</label>
											<label for="" class="commodity-delivery-line"></label>
											<label for="">
												最大预估数
												<input type="text" name="max" value="<{$info.max}>" />
											</label>
										</div>
									</div> -->
									</div>
									<div class="commedity-edit-block2 commodity-edit-common">
									<h2>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;图</h2>
									<div class="commodity-block-figure commodity-block-inner">
										<div class="commodity-choose-picture">
											<dl class="clearfix">
												<dt id="cont"><input type="button" id="btn" value="添加本地图片" class="add-local-picture"></dt>
												<dd id="imgconner">
													<{foreach $info.imageFull as $i => $img}>
													<div id="divImg<{$i}>" class="commodity-background-floor commodity-background-floor<{if $img@first}>2<{else}>1<{/if}>">
														<img id="Img<{$i}>" src="<{$img}>" data-id="<{$i}>" alt="" style="<{if $img@first}>width:140px;height:140px;<{else}>width:80px;height:80px;<{/if}>" class="commodity-block2-<{if $img@first}>change<{else}>picture<{/if}> commodity-block2-<{if $img@first}>picture1<{else}>change<{/if}>">
													</div>
													<{/foreach}>
												</dd>
											</dl>
										</div>
									</div>
									</div>
									<div class="commedity-edit-block3 commodity-edit-common">
										<h2>商品变量</h2>
										<{foreach $list as $i => $li}>
										<div class="commodity-block-variable commodity-block-inner">
											<div class="commodity-variable-list">
												<h3><span>唯一ID（SKU）：</span><{$li.uniq}></h3>
												<div class="commodity-add-variable clearfix" id="cont<{$i}>">
													<span id="imgyu<{$i}>"><{if isset($li.image[0])}><img src="<{$li.imageFull[0]}>" /><{/if}></span>
													<input type="button" id="btn<{$i}>" value="添加本地图片" class="add-local-picture">
												</div>
												<div class="commodity-message-variable">
													<ul>
														<li class="clearfix">
                                                            <{foreach $info.skuType as $i=> $skuType}>
															<label for=""><{$skuType}>：<input type="text" name="<{$skuType|strtolower}>[]" value="<{$li.sku[$i]}>"></label>
                                                            <{/foreach}>
                                                            <label for="">数量：<input type="text" name="stock[]" value="<{$li.stock}>"></label>
														</li>
														<li class="clearfix">
															<label for="">原价：<input type="text" name="price[]" value="<{$li.price}>"></label>
															<label for="">现价：<input type="text" name="discountPrice[]" value="<{$li.discountPrice}>"></label>
															<label for="">促销价：<input type="text" name="recommendPrice[]" value="<{$li.recommendPrice}>" disabled></label>
															<label for="">专享价：<input type="text" name="appDiscountPrice[]" value="<{$li.appDiscountPrice}>"></label>
															<input type="hidden" name="discountPrice[]" value="<{$li.discountPrice}>">
														</li>
													</ul>
												</div>
											</div>
										</div>
										<{/foreach}>
									</div>
									<div class="commedity-edit-block4 commodity-edit-common">
										<h2>商品介绍</h2>
										<div class="commodity-block-introduction commodity-block-inner">
											<h3 class="clearfix">
												<span>电脑端</span>
												<span>手机端</span>
											</h3>
											<div class="commodity-introduction-wrap">
												<div class="commodity-introduction-device commodity-introduction-pc">
													<textarea name="description" cols="30" rows="10"><{$info.description}></textarea>
													<p>
														<span>（每5分钟保存一次）</span>
														<input type="button" value="预览">
														<input type="button" value="保存">
													</p>
												</div>
												<div class="commodity-introduction-device commodity-introduction-mobile">
													<div class="commodity-introduction-mobile-box clearfix">
														<textarea name="descriptionApp" cols="30" rows="10"><{$info.descriptionApp}></textarea>
														<div class="commodity-introduction-mobile-message">
															<input type="button" value="导入电脑端详情">
															<span>（每5分钟保存一次）</span>
															<div>
																<input type="button" value="预&nbsp;&nbsp;&nbsp;览">
																<input type="button" value="保&nbsp;&nbsp;&nbsp;存">
															</div>
														</div>
													</div>
												</div>
											</div>
											<h4>商品规格</h4>
											<div class="commodity-specification-wrap">
												<div class="commedity-specification-inner">
													<{foreach $info.standard as $standard}>
													<div>
														<input type="text" name="stdname[]" value="<{$standard.name}>" class="commedity-specification-left" />
														<label for="">:</label>
														<input type="text" name="stdcontent[]" value="<{$standard.content}>" />
													</div>
													<{/foreach}>
												</div>
												<input type="button" value="添加新参数" class="add-new-parameter addstd">
											</div>
										</div>
									</div>
									<div class="new-commodity-block7 new-commodity-common">
										<!-- <h2>提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交</h2> -->
										<div class="new-commodity-inner" style="margin-bottom:10px;margin-left:106px;">
											<!-- <p>所有订单必须于7日内履行完毕，否则将自动退款。</p> -->
											<input type="submit" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
										</div>
									</div>
								</div>
							</div>
							<{foreach $info.image as $i => $image}>
							<input type="hidden" data-id="img<{$i}>" name="cover[<{$i}>]" value="<{$image}>" />
							<{/foreach}>
							<{foreach $list as $i => $li}>
							<{foreach $li.image as $ii => $image}>
							<input type="hidden" name="proimg[<{$i}>][<{$ii}>]" value="<{$image}>" />
							<{/foreach}>
							<{/foreach}>
							<input type="hidden" id="upnum" value="<{$info.image|count}>" />
                            <input type="hidden" name="id" value="<{$info.id}>" />
                            <{foreach $list as $li}>
                            <input type="hidden" name="skuid[]" value="<{$li.id}>" />
                            <{/foreach}>
						</form>
					</div>
				</div>
			</div>
			<!-- 编辑商品 end -->
		</div>
	</div>
	<!-- 主内容 end-->
	<script type="text/javascript" src="/js/plupload.full.min.js"></script>
    <script type="text/javascript" src="/js/i18n/zh_CN.js"></script>
    <script type="text/javascript" src="/js/qiniu.min.js"></script>
	<script charset="utf-8" src="/js/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="/js/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="/js/kindeditor/plugins/code/prettify.js"></script>
	<script type="text/javascript">
	$(function()
	{
		//tab切换
		$(".commodity-block-introduction h3 span").on("click",function(){
			var n = $(this).index();
			$(this).addClass("current").siblings().removeClass("current");
			$(".commodity-introduction-device").eq(n).addClass("current").siblings().removeClass("current");
		}).eq(0).trigger("click");
		// 富文本编辑器
        KindEditor.ready(function(K)
        {
            var editor1 = K.create('textarea[name="description"],textarea[name="descriptionApp"]',
            {
                cssPath : '',
                uploadJson : '/upload/kindeditor',
                fileManagerJson : '',
                allowFileManager : true,
                afterCreate : function()
                {
                    var self = this;
                },
                afterBlur: function()
                {
                	this.sync();
                }
            });
        });
        // 添加规格选项
        $('.addstd').click(function()
        {
            $('.commedity-specification-inner').append('<div class="clearfix"><input type="text" name="stdname[]" autocomplete="off" class="commedity-specification-left"><label for="">:</label><input type="text" autocomplete="off" name="stdcontent[]" ></div>');
        });
        // 异步提交
        $("#modifyproduct").submit(function()
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

        /* 七牛上传插件js初始化 */
        var uploader = Qiniu.uploader(
        {
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'btn',       //上传选择的点选按钮，**必需**
            uptoken_url: '/upload/token?type=productcover',
            // 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
            save_key: true,
            // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
            domain: 'http://testimage.qiniudn.com/',
            //bucket 域名，下载资源时用到，**必需**
            container: 'cont',           //上传区域DOM ID，默认是browser_button的父元素，
            max_file_size: '100mb',           //最大文件体积限制
            flash_swf_url: '../js/plupload/Moxie.swf',  //引入flash,相对路径
            max_retries: 3,                   //上传失败最大重试次数
            dragdrop: false,                   //开启可拖曳上传
            drop_element: 'cont',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
            chunk_size: '4mb',                //分块上传时，每片的体积
            auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
            init:
            {
                 'FilesAdded': function(up, files)
                 {
                    plupload.each(files, function (file)
                    {
                        // 文件添加进队列后,处理相关的事情
                    });
                },
                'BeforeUpload': function(up, file)
                {
                    // 每个文件上传前,处理相关的事情
                },
                'UploadProgress': function(up, file){},
                'FileUploaded': function(up, file, info)
                {
                    var num = parseInt($('#upnum').val());

                    if(num < 5)
                    {
                        // 每个文件上传成功后,处理相关的事情
                        var domain = up.getOption('domain');
                        var res = $.parseJSON(info);
                        var sourceLink = res.data.url; // 获取上传成功后的文件的Url
                        var imgResLink = res.data.url+"?imageInfo";
                        $.get(imgResLink, "", function(data){
                        	if(data.width != data.height)
                        	{
                        		console.log(data);
                        		alert('请选择宽高相等的图片进行上传.');
                        	}
                        	else
                        	{

		                        $('#modifyproduct').append('<input type="hidden" name="cover[' + num + ']" value="' + res.data.saveKey + '" />');

		                        if(num == 0)
		                        {
		                            $('#imgconner').html('<div class="commodity-background-floor commodity-background-floor2"><img src="' + res.data.url + '" alt="" style="width:140px;height:140px;" class="commodity-block2-change commodity-block2-picture1"></div>');
		                        }
		                        else
		                        {
		                            $('#imgconner').append('<div class="commodity-background-floor commodity-background-floor1"><img src="' + res.data.url + '" alt="" style="width:80px;height:80px;" class="commodity-block2-picture commodity-block2-change"></div>');
		                        }
		                        $('#upnum').val(num + 1);
		                    }
                        }, "JSON")
                    }
                },
                'UploadComplete': function(){},
                'Error': function(up, err, errTip){},
                'Key': function(up, file)
                {
                    // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    // 该配置必须要在 unique_names: false , save_key: false 时才生效
                    var key = "";
                    // do something with key here
                    return key
                }
            }
        });
        <{foreach $list as $i => $li}>
		/* 七牛上传插件js初始化 */
        var uploader = Qiniu.uploader(
        {
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'btn<{$i}>',       //上传选择的点选按钮，**必需**
            uptoken_url: '/upload/token?type=productcover',
            // 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
            save_key: true,
            // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
            domain: 'http://testimage.qiniudn.com/',
            //bucket 域名，下载资源时用到，**必需**
            container: 'cont<{$i}>',           //上传区域DOM ID，默认是browser_button的父元素，
            max_file_size: '100mb',           //最大文件体积限制
            flash_swf_url: '../js/plupload/Moxie.swf',  //引入flash,相对路径
            max_retries: 3,                   //上传失败最大重试次数
            dragdrop: false,                   //开启可拖曳上传
            drop_element: 'cont<{$i}>',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
            chunk_size: '4mb',                //分块上传时，每片的体积
            auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
            init:
            {
                 'FilesAdded': function(up, files)
                 {
                    plupload.each(files, function (file)
                    {
                        // 文件添加进队列后,处理相关的事情
                    });
                },
                'BeforeUpload': function(up, file)
                {
                    // 每个文件上传前,处理相关的事情
                },
                'UploadProgress': function(up, file){},
                'FileUploaded': function(up, file, info)
                {
                    // 每个文件上传成功后,处理相关的事情
                    var domain = up.getOption('domain');
                    var res = $.parseJSON(info);
                    var sourceLink = res.data.url; // 获取上传成功后的文件的Url
                    $('input[name="proimg[<{$i}>][]"]').remove();
                    $('#modifyproduct').append('<input type="hidden" name="proimg[<{$i}>][]" value="' + res.data.saveKey + '" />');
                    $('#imgyu<{$i}>').html('<img src="' + res.data.url + '">');
                },
                'UploadComplete': function(){},
                'Error': function(up, err, errTip){},
                'Key': function(up, file)
                {
                    // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    // 该配置必须要在 unique_names: false , save_key: false 时才生效
                    var key = "";
                    // do something with key here
                    return key
                }
            }
        });
		<{/foreach}>
        <{foreach $info.imageFull as $i => $img}>
        /* 七牛上传插件js初始化 */
        var uploader<{$i}> = Qiniu.uploader(
        {
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'Img<{$i}>',       //上传选择的点选按钮，**必需**
            uptoken_url: '/upload/token?type=productcover',
            // 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
            save_key: true,
            // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
            domain: 'http://testimage.qiniudn.com/',
            //bucket 域名，下载资源时用到，**必需**
            container: 'divImg<{$i}>',           //上传区域DOM ID，默认是browser_button的父元素，
            max_file_size: '100mb',           //最大文件体积限制
            flash_swf_url: '../js/plupload/Moxie.swf',  //引入flash,相对路径
            max_retries: 3,                   //上传失败最大重试次数
            dragdrop: false,                   //开启可拖曳上传
            drop_element: 'divImg<{$i}>',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
            chunk_size: '4mb',                //分块上传时，每片的体积
            auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
            init:
            {
                 'FilesAdded': function(up, files)
                 {
                    plupload.each(files, function (file)
                    {
                        // 文件添加进队列后,处理相关的事情
                    });
                },
                'BeforeUpload': function(up, file)
                {
                    // 每个文件上传前,处理相关的事情
                },
                'UploadProgress': function(up, file){},
                'FileUploaded': function(up, file, info)
                {
                    // 每个文件上传成功后,处理相关的事情
                    var domain = up.getOption('domain');
                    var res = $.parseJSON(info);
                    var sourceLink = res.data.url; // 获取上传成功后的文件的Url
                    $('#Img<{$i}>').attr('src', res.data.url);
                    $('input[data-id="img<{$i}>"]').val(res.data.saveKey);
                },
                'UploadComplete': function(){},
                'Error': function(up, err, errTip){},
                'Key': function(up, file)
                {
                    // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    // 该配置必须要在 unique_names: false , save_key: false 时才生效
                    var key = "";
                    // do something with key here
                    return key
                }
            }
        });
        <{/foreach}>
	});
	</script>
</body>
</html>