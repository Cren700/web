<html>
<head>
    <meta charset="utf-8">
    <title>栏目标签</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <link rel="stylesheet" href="/jquery-ui/jquery-ui.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/uploadify/jquery.uploadify.js"></script>
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
        <!-- 基本信息 start -->
        <div class="wrap-right">
            <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2><{$tag_info['tag_name']}> -- <{$fun_name}></h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">文章信息</a></li>
                    </ul>
                </div>
                <form method="post" action="<{if !isset($article_info)}>/article/addhandle.html<{else}>/article/managehandle.html<{/if}>" id="articleHandel">
                    <div class="new-commodity-wrap">
                        <div class="new-commodity-block1 new-commodity-common">
                            <div class="new-commodity-inner">
                                <div class="clearfix new-commodity-input">
                                    <span>标题</span>
                                    <input type="text" name="title" autocomplete="off" value="<{$article_info['title']|default:''}>"/>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>子标题</span>
                                    <input type="text" name="subTitle" autocomplete="off" value="<{$article_info['sub_title']|default:''}>"/>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>作者</span>
                                    <input type="text" name="author" autocomplete="off" value="<{$article_info['author']|default:''}>"/>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>发布时间</span>
                                    <input type="text" name="issueTime" autocomplete="off" value="<{('Y-m-d'|date:$article_info['issue_time'])|default:''}>"  id="datepicker" readonly>
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>封面</span>
                                </div>

                                <div style="margin: -55px 0 0 125px;">
                                    <input type="hidden" name="coverImg" autocomplete="off" value="<{$article_info['cover_img']|default:''}>">
                                    <input type="file" id="file_upload" name="userfile" size="20" />
                                    <img src="<{$article_info['cover_img']|default:''}>" alt="" id="coverImg" style="<{(isset($article_info['cover_img']) && !empty($article_info['cover_img']))?'' : 'display: none' }>">
                                </div>
                                <div class="clearfix new-commodity-input">
                                    <span>文章内容</span>
                                    <textarea style="display: none" name="content" ><{($article_info['content'])|default:''}></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="new-commodity-block6 new-commodity-common"  id="ueditor"></div>
                        <div class="new-commodity-block7 new-commodity-common">
                            <div class="new-commodity-inner">
                                <input type="submit" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="tagId" value="<{$tag_id}>">
                    <{if isset($article_info)}><input type="hidden" name="articleId" value="<{$article_info['id']}>"><{/if}>
                </form>
            </div>
        </div>
        <!-- 基本信息 end -->
    </div>
</div>
<!-- 主内容 end-->
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript">
    $(function()
    {
        var $content = $('textarea[name=content]');
        var ue = UE.getEditor('ueditor', {
            initialFrameWidth: 1000,
            initialFrameHeight: 500,
            autoHeightEnabled:false
        });

        // 初始化数据
        ue.ready(function() {
            ue.setContent($content.text());
        });

        $("#articleHandel").submit(function() {
            // 获取数据
            $content.text(ue.getContent());
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

        $('#file_upload').uploadify({
            'buttonClass' : 'some-class',
            'buttonText' : '点击选择封面',
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
                    $('#coverImg').attr('src', data['file_data']).show();
                    $('input[name=coverImg]').val( data['file_data'] );
                }
            }
        });
    });
</script>
</body>
</html>