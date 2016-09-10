<html>
<head>
    <meta charset="utf-8">
    <title>栏目标签</title>
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/uploadify/jquery.uploadify.js"></script>
</head>
<body>
<form action="/welcome/doUpload" method="post" enctype="multipart/form-data">

    <input id="file_upload" name="file_upload" type="file" multiple="true">
    <input id="token" name="token" type="hidden" /> 
    <input type="submit" value="提交" />
</form>
<script type="text/javascript">
    //    $(function() {
    //        $('#file_upload').uploadify({
    //            'buttonClass' : 'some-class',
    //            'buttonText' : '选择文件',
    ////            'auto':false,//是否立即上传
    //            'progressData' : 'percentage',
    //            'swf'         : '/js/uploadify/uploadify.swf',
    //            'uploader'    : '/upload/upload',//请求路径
    ////            'debug':true,//调试模式是否开启
    //            'fileObjName':'file_name',//文件对象的名称
    //            'fileExt': '*.jpg;*.jpeg;*.gif;*.png',//可上传的文件类型
    //            'removeCompleted':true,//是否将已完成任务从队列中删除
    //            'onUploadSuccess' : function(file, data, response) {
    //                console.log(data);
    //                alert('文件 ' + file + ' 上传成功.详细信息： ' + response+data);
    //            }
    //        });
    //    });
</script>
</body>
</html>