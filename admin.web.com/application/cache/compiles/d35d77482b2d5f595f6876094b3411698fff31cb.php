<?php /* Smarty version Smarty-3.1.19, created on 2016-01-19 17:52:11
         compiled from "application/views/zh_cn/product/detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1319273893569e074b5a4693-75400408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9407763f84f15acb9fb0fca0dbbef404969f9a39' => 
    array (
      0 => 'application/views/zh_cn/product/detail.tpl',
      1 => 1451978366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1319273893569e074b5a4693-75400408',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'catalog' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569e074b5cbe37_40819009',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569e074b5cbe37_40819009')) {function content_569e074b5cbe37_40819009($_smarty_tpl) {?><html>
<head>
	<meta charset="utf-8">
	<title>添加新商品</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/jquery.mCustomScrollbar.css">
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/jquery.mCustomScrollbar.js"></script>
	<script type="text/javascript" src="/js/jquery.form.js"></script>
    <link rel="stylesheet" href="/css/kindeditor/default/default.css" />
</head>
<body>

	<!-- 主内容 start-->
	<div class="wrapper">
		<!-- 公用头部 start-->
		<?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- 公用头部 end-->
		<!-- 左边导航 start-->
		<?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!-- 左边导航 end-->
		<!-- 添加新商品 start -->
		<div class="wrap-right">
				<div class="wrap-right-content">
					<div class="wrap-right-title">
						<h2>添加新商品</h2>
						<ul class="clearfix">
							<li class="current"><a href="javascript:;">新商品</a></li>
						</ul>
					</div>
					<form method="post" action="/product/addhandle" id="addproduct">
						<div class="new-commodity-wrap">
							<div class="new-commodity-block1 new-commodity-common">
								<h2>基本信息</h2>
								<div class="new-commodity-inner">
									<div class="clearfix new-commodity-input">
										<span>商品名称</span>
										<input type="text" name="name" autocomplete="off" />
									</div>
									<div class="clearfix new-commodity-input">
										<span>商品标签</span>
										<input type="text" name="tag" autocomplete="off" />
									</div>
									<div class="clearfix new-commodity-radio">
										<span>商品品类</span>
										<p class="clearfix">
											<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catalog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
	                                        <label><input type="radio" name="catalog" class="catalog" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</label>
											<?php } ?>
										</p>
									</div>
									<div class="clearfix new-commodity-radio detail" style="display:none;">
										<span>详细分类</span>
										<p></p>
									</div>
                                    <div class="clearfix new-commodity-radio">
                                        <span>投放平台</span>
                                        <p class="clearfix">
                                            <label><input type="checkbox" name="device[]" value="1" checked>Android</label>
                                            <label><input type="checkbox" name="device[]" value="2" checked>iPhone</label>
                                            <label><input type="checkbox" name="device[]" value="3" checked>iPad</label>
                                            <label><input type="checkbox" name="device[]" value="7" checked>Mobile</label>
                                            <label><input type="checkbox" name="device[]" value="10" checked>www</label>
                                        </p>
                                    </div>
                                    <div class="clearfix">
                                        <span>提示消息</span>
                                        <input type="text" name="descText" autocomplete="off">
                                    </div>
								</div>
							</div>
							<div class="new-commodity-block2 new-commodity-common">
								<h2>尺寸&颜色</h2>
								<div class="new-commodity-inner">
									<div class="new-commodity-size new-commodity-size-color clearfix">
										<h3>尺&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;寸</h3>
										<div class="new_commodity-list">
											<ul class="clearfix"></ul>
											<p class="new-commodity-button clearfix">
												<input type="text" placeholder="输入新内存" autocomplete="off" />
												<input class="new-commodity-common-input" type="button" value="添加" />
											</p>
											<!-- <p class="new-commodity-history clearfix">
												<span>最近添加：</span>
												<label><input type="checkbox">16G</label>
												<label><input type="checkbox">32G</label>
												<label><input type="checkbox">64G</label>
											</p> -->
										</div>
									</div>
									<div class="new-commodity-color new-commodity-size-color clearfix">
										<h3>颜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色</h3>
										<div class="new_commodity-list">
											<ul class="clearfix">
												<li class="clearfix">
													<label><input type="checkbox" /><span style="background:#ffffff;"></span><label class="com">White</label></label>
												</li>
												<li class="clearfix">
													<label><input type="checkbox" /><span style="background:#000000;"></span><label class="com">Black</label></label>
												</li>
												<li class="clearfix">
													<label><input type="checkbox" /><span style="background:#ff0000;"></span><label class="com">Red</label></label>
												</li>
											</ul>
											<div class="new-commodity-button new_commodity-input-color clearfix">
												<input type="text" placeholder="输入新颜色" autocomplete="off" />
												<input class="new-commodity-common-input" type="button" value="添加" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="new-commodity-block3 new-commodity-common" style="display:none;">
								<h2>商品变量</h2>
								<div class="new-commodity-inner sku"></div>
							</div>
							<div class="new-commodity-block4 new-commodity-common">
								<h2>上传图片</h2>
								<div class="new-commodity-inner">
									<h3>主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;图</h3>
									<div class="new-block4-wrap">
										<div class="new-block4-inner1">
											<dl class="clearfix">
												<dt class="mainimg" style="width: 280px;height: 280px;"></dt>
												<dd>
													<p>配有多张高质量图片的产品往往销售情况最好。<br>添加像素至少为 800 x 800 的图片。<br>不得盗取其他商户的图片，否则您的产品将被删除。</p>
													<span id="cont">
														<label>（<span id="upnum">0</span>/5）</label><br/>
														<input type="button" id="btn" value="添加本地图片" />
													</span>
												</dd>
											</dl>
										</div>
										<div><ul class="clearfix subimg"></ul></div>
									</div>
								</div>
							</div>
							<!-- <div class="new-commodity-block5 new-commodity-common">
								<h2>配送信息</h2>
								<div class="new-commodity-inner">
									<div class="new-block5-list clearfix">
										<span>配送费用</span>
										<input type="text" name="deliveryFee" value="0.00" autocomplete="off" />
									</div>
									<div class="new-block5-list clearfix">
										<span>配送时间</span>
										<div>
											<p class="clearfix">
												<label><input type="radio" name="deliverTime" value="1" checked="checked" />5-10</label>
												<label><input type="radio" name="deliverTime" value="2" />7-14</label>
												<label><input type="radio" name="deliverTime" value="3" />10-15</label>
												<label><input type="radio" name="deliverTime" value="4" />14-21</label>
												<label><input type="radio" name="deliverTime" value="5" />21-28</label>
											<br>
												<label class="new-block5-other"><input type="radio" name="deliverTime" value="6" />其他：</label>
												<a>最小预估数<br><input type="text" autocomplete="off" name="mid" /></a>
												<a class="new-block5-line"></a>
												<a>最大预估数<br><input type="text" autocomplete="off" name="max" /></a>
											</p>
										</div>
									</div>
								</div>
							</div> -->
							<div class="new-commodity-block6 new-commodity-common">
								<h2>商品介绍</h2>
								<div class="new-commodity-inner">
									<div class="commodity-block-introduction">
										<h3 class="clearfix">
											<span>电脑端</span>
											<span>手机端</span>
										</h3>
										<div class="commodity-introduction-wrap">
											<div class="commodity-introduction-device commodity-introduction-pc">
												<textarea name="description" cols="30" rows="10"></textarea>
												<p>
													<span>（每5分钟保存一次）</span>
													<input type="button" value="预览">
													<input type="button" value="保存">
												</p>
											</div>
											<div class="commodity-introduction-device commodity-introduction-mobile">
												<div class="commodity-introduction-mobile-box clearfix">
													<textarea name="descriptionApp" cols="30" rows="10"></textarea>
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
												<div class="clearfix">
													<input type="text" name="stdname[]" autocomplete="off" class="commedity-specification-left" />
													<label for="">:</label>
													<input type="text" name="stdcontent[]" autocomplete="off" />
												</div>
											</div>
											<input type="button" class="new-commodity-common-input addstd" value="添加新参数">
										</div>
									</div>
								</div>
							</div>
							<div class="new-commodity-block7 new-commodity-common">
								<h2>提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交</h2>
								<div class="new-commodity-inner">
									<p>所有订单必须于7日内履行完毕，否则将自动退款。</p>
									<input type="submit" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
								</div>
							</div>
						</div>
					</form>
				</div>
		</div>
		<!-- 添加新商品 end -->
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
                        //console.log(file);
                    });
                },
                'BeforeUpload': function(up, file)
                {
                    // 每个文件上传前,处理相关的事情
                },
                'UploadProgress': function(up, file){},
                'FileUploaded': function(up, file, info)
                {
                    var num = parseInt($('#upnum').text());
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
                        		$('#addproduct').append('<input type="hidden" name="image[]" value="' + res.data.saveKey + '" />');
		                        $('#upnum').text(num + 1);
		                        if(num == 0)
		                        {
		                            $('.mainimg').html('<img src="' + res.data.url + '">');
		                        }
		                        else
		                        {
		                            $('.subimg').append('<li><img src="' + res.data.url + '" /></li>');
		                        }
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
		// 点击商品品类
		$('.catalog').change(function()
        {
            $.get('/product/category', {id: $(this).val()}, function (data)
            {
                $('.clearfix.detail p').html(data.data);
                $('.clearfix.detail').show();
            }, 'json');
        });
		// 点击添加尺寸、颜色
		$('.new-commodity-common-input').click(function()
        {
            var txt = $.trim($(this).parents('.new-commodity-button').find('input[type="text"]').val());
            if(txt != '')
            {
                $(this).parents('.new_commodity-list').find('ul').append('<li class="clearfix"><label><input type="checkbox" /><label class="com">' + txt + '</label></label></li>');
                $(this).parents('.new-commodity-button').find('input[type="text"]').val('');
            }
        });
        // 选择尺寸、颜色
        $('body').on('change', '.new_commodity-list li input', function()
        {
            var ids = ids1 = ids2 = '';
            var title = title1 = title2 = '';
            $('.new-commodity-size li input[type="checkbox"]:checked').each(function (i, v)
            {
            	if(ids1 == '')
                {
                    ids1 += $(v).parents('label').find('.com').text();
                }
                else
                {
                    ids1 += ',' + $(v).parents('label').find('.com').text();
                }
	            title1 = 'Size';
            });

            $('.new-commodity-color li input[type="checkbox"]:checked').each(function (i, v)
            {
                if(ids2 == '')
                {
                    ids2 += $(v).parents('label').find('.com').text();
                }
                else
                {
                    ids2 += ',' + $(v).parents('label').find('.com').text();
                }
                title2 = 'Color';
            });
            if(ids1 == '')
            {
                ids = ids2;
                title = title2;
            }
            else if(ids2 == '')
            {
                ids = ids1;
                title = title1;
            }
            else
            {
                ids = ids1 + '|' + ids2;
                title = title1 + ',' + title2;
            }

            $.get('/product/getskuform', {ids: ids, title: title}, function (data)
            {
            	//alert(data.data);
                $('.new-commodity-inner.sku').html(data.data);
                if(data.data != '')
                {
                    $('.new-commodity-inner.sku').parents('div.new-commodity-block3.new-commodity-common').show();
                }
                else
                {
                    $('.new-commodity-inner.sku').parents('div.new-commodity-block3.new-commodity-common').hide();
                }
            }, 'json');
        });
		// 点击商品变量的删除按钮
		$('body').on('click', '.one-delete', function()
        {
            $(this).parents('li.clearfix').remove();
        });
        // 添加规格选项
        $('.addstd').click(function()
        {
            $('.commedity-specification-inner').append('<div class="clearfix"><input type="text" name="stdname[]" autocomplete="off" class="commedity-specification-left"><label for="">:</label><input type="text" autocomplete="off" name="stdcontent[]" ></div>');
        });
		//tab切换
		$(".commodity-block-introduction h3 span").on("click",function()
		{
			var n = $(this).index();
			$(this).addClass("current").siblings().removeClass("current");
			$(".commodity-introduction-device").eq(n).addClass("current").siblings().removeClass("current");
		}).eq(0).trigger("click");
        // 异步提交
        $("#addproduct").submit(function()
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

	});
	</script>
</body>
</html>
<?php }} ?>
