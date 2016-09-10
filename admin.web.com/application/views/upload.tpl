<html>
<head>
    <meta charset="utf-8">
    <title>栏目标签</title>
    <link rel="stylesheet" href="/js/uploadify/uploadify.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/uploadify/jquery.uploadify.js"></script>
</head>
<body>

<input type="file" id="file_upload" name="userfile" size="20" />
<div id="progress"></div>
<a href="javascript:$('#file_upload').uploadify('upload','*')">上传文件</a><br>

<script type="text/javascript">
    $(function() {
        $('#file_upload').uploadify({
            'buttonClass' : 'some-class',
            'buttonText' : '选择文件',
            'auto':false,//是否立即上传
            'progressData' : 'percentage',
            'swf'         : '/js/uploadify/uploadify.swf',
            'uploader'    : '/uploadify/doupload',//请求路径
//            'debug':true,//调试模式是否开启
            'fileObjName':'file_name',//文件对象的名称
            'fileExt': '*.jpg;*.jpeg;*.gif;*.png',//可上传的文件类型
            'removeCompleted':true,//是否将已完成任务从队列中删除
            'onUploadSuccess' : function(file, data, response) {
                console.log(data);
//                alert('文件 ' + file + ' 上传成功.详细信息： ' + response+data);
            }
        });
    });
</script>
</body>
</html>