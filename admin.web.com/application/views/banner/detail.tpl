<html>
<head>
    <meta charset="utf-8">
    <title>Banner管理</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/jquery-ui/jquery-ui.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>
    <script type="text/javascript" src="/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/uploadify/jquery.uploadify.js"></script>
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
        <!-- 基本信息 start -->
        <div class="wrap-right">
            <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2><{$fun_name}></h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">Banner信息</a></li>
                    </ul>
                </div>
                <form method="post" action="/banner/save.html" id="bannerHandel">
                    <div class="new-commodity-wrap">
                        <div class="new-commodity-block1 new-commodity-common">
                            <div class="new-commodity-inner">
                                <div class="clearfix new-commodity-input">
                                    <span>Banner名称</span>
                                    <input type="text" name="name" autocomplete="off" value="<{$banner_info['name']|default:''}>"/>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>优先级</span>
                                    <input type="text" name="priority" autocomplete="off" value="<{$banner_info['priority']|default:''}>"/>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>链接</span>
                                    <input type="text" name="url" autocomplete="off" value="<{$banner_info['url']|default:''}>"/>
                                </div>

                                <div class="clearfix new-commodity-input">
                                    <span>显示时间</span>
                                    <input type="text" name="showTime" autocomplete="off" value="<{$banner_info['show_time']|default:''}>" id="datepicker" readonly/>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>状态</span>
                                    <label for=""><input type="radio" style='width: 30px;' name="status" value="0" <{if !isset($banner_info['status']) || ( isset($banner_info['status']) && !$banner_info['status'] ) }>checked='checked'<{/if}>/>禁用</label>
                                    <label for=""><input type="radio" style='width: 30px;' name="status" value="1" <{if isset($banner_info['status']) && $banner_info['status']}>checked='checked'<{/if}>/>启用</label>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>图片</span>
                                </div>

                                <div style="margin: -55px 0 0 125px;">
                                    <input type="hidden" id="img" name="img" autocomplete="off" value="<{$banner_info['img']|default:''}>">
                                    <input type="file" id="file_upload" name="userfile" size="20" />
                                    <img src="<{$banner_info['img']|default:''}>" alt="" id="fileImg" style="<{(isset($article_info['cover_img']) && !empty($article_info['cover_img']))?'' : 'display: none' }>">
                                </div>
                            </div>
                        </div>
                        <div class="new-commodity-block6 new-commodity-common"  id="ueditor"></div>
                        <div class="new-commodity-block7 new-commodity-common">
                            <div class="new-commodity-inner">
                                <input type="submit" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
                                <input type="button" class="js-url-btn" data-url="/banner.html" value="返&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;回">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- 基本信息 end -->
    </div>
</div>
<!-- 主内容 end-->
</body>
<script>
    $(function () {

        $('#file_upload').uploadify({
            'buttonClass' : 'some-class',
            'buttonText' : '点击选择图片',
//            'fileObjName' : 'yourfiles', //文件上传key值
//            'auto':false,//是否立即上传
            'progressData' : 'percentage',
            'swf'         : '/js/uploadify/uploadify.swf',
            'uploader'    : '/uploadify/doupload',//请求路径
//            'debug':true,//调试模式是否开启
            'fileObjName':'file_name',//文件对象的名称
            'fileExt': '*.jpg;*.jpeg;*.gif;*.png',//可上传的文件类型
            'removeCompleted':true,//是否将已完成任务从队列中删除
            'onUploadSuccess' : function(file, data, response) {
                data = eval('(' + data + ')');
                if( data['code'] !== 0) {
                    alert( data['msg'] );
                } else {
                    $('#fileImg').attr('src', data['file_data']).show();
                    $('input[name=img]').val( data['file_data'] );
                }
            }
        });

        $("#bannerHandel").submit(function() {
            // 获取数据
            var opt = {
                dataType: 'json',
                type: 'post',
                success: function(res){
                    location.href = res.url;
                }
            };
            $(this).ajaxSubmit(opt);
            return false;
        });

        $("#datepicker").datepicker();

    })
</script>
</html>