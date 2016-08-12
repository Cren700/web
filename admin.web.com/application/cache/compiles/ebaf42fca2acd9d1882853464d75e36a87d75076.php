<?php /* Smarty version Smarty-3.1.19, created on 2016-08-11 23:37:38
         compiled from "application/views/category/tagList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123339880757a746add5ec90-87213854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50f7671f89a68b17d098810d6e2c4cf4a433a277' => 
    array (
      0 => 'application/views/category/tagList.tpl',
      1 => 1470929439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123339880757a746add5ec90-87213854',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57a746addf1d57_58616219',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a746addf1d57_58616219')) {function content_57a746addf1d57_58616219($_smarty_tpl) {?><html>
<head>
    <meta charset="utf-8">
    <title>栏目管理</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/commen.js"></script>

    <style>.mCSB_container{margin-right:0;}</style>
</head>
<body>
<!-- 主内容 start-->
<div class="wrapper">
    <div class="wrappper-block clearfix">
        <!-- 公用头部 start-->
        <?php echo $_smarty_tpl->getSubTemplate ("public/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 公用头部 end-->
        <!-- 左边导航 start-->
        <?php echo $_smarty_tpl->getSubTemplate ("public/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <!-- 左边导航 end-->
        <!-- 基本信息 start -->
        <div class="wrap-right">

            <div class="wrap-right-parent">
                <div class="wrap-right-content">
                <div class="wrap-right-title">
                    <h2>标签管理</h2>
                    <ul class="clearfix">
                        <li class="current"><a href="javascript:;">基本信息</a></li>
                    </ul>
                </div>
                <?php if (count($_smarty_tpl->tpl_vars['data']->value)!=0) {?>
                <div class="wrap-right-list">
                    <ul>
                        <li class="thead clearfix">
                            <div style="width: 15%;">栏目名称</div>
                            <div style="width: 15%;">标签名称</div>
                            <div style="width: 10%;">优先级</div>
                            <div style="width: 10%;">是否使用</div>
                            <div class="operatione-thead">操作</div>
                        </li>
                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                        <li class="clearfix" id='<?php echo $_smarty_tpl->tpl_vars['value']->value['tag_id'];?>
'>
                            <div class="list-float" style="text-align: center; width: 15%;"><?php echo $_smarty_tpl->tpl_vars['value']->value['cate_name'];?>
</div>
                            <div class="list-float" style="text-align: center; width: 15%;"><?php echo $_smarty_tpl->tpl_vars['value']->value['tag_name'];?>
</div>
                            <div class="list-float" style="text-align: center; width: 10%;"><?php echo $_smarty_tpl->tpl_vars['value']->value['priority'];?>
</div>
                            <div class="list-float js-status-show" style="text-align: center; width: 10%;"><?php if ($_smarty_tpl->tpl_vars['value']->value['status']==0) {?>禁用<?php } else { ?>正使用<?php }?></div>
                            <div class="operation-list list-float">
                                <a href="javascript:;" class="js-btn-update">修改</a>
                                <a href="javascript:;" class="js-btn-changeStatus"><?php if ($_smarty_tpl->tpl_vars['value']->value['status']==0) {?><b data-status="0">开启</b><?php } else { ?><b data-status="1">禁用</b><?php }?></a>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } else { ?>
                <div style="padding-top:30px; font-size:18px; color:red">
                    暂无相关数据
                </div>
                <?php }?>
            </div>
            </div>
        </div>
        <!-- 基本信息 end -->
    </div>
</div>
<!-- 主内容 end-->
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript">
    $(function () {
        $('.js-btn-update').on('click', function () {
            var tag_id = $(this).parent('div').parent('li').attr('id');
            location.href='/category/manageTag.html?tag_id='+tag_id;
        });

        $('.js-btn-changeStatus').on('click', function () {
            var _this = $(this);
            var tag_id = $(this).parent('div').parent('li').attr('id'),
                status = $(this).find('b').attr('data-status'),
                url = "/category/managetagstatus.html";
            var data = {tag_id: tag_id, status: status};
            $.getJSON(url, data, function (res) {
                if(res['code'] === 0) {
                    var op_status = 1 - status ? '禁用' : '开启',
                        status_show = 1- status ? '正使用' : '禁用';
                    _this.find('b').text(op_status).attr('data-status', 1- status);
                    _this.parents('li').find('div.js-status-show').text(status_show);
                } else {
                    alert('wrong1!');
                }
            });
        })
    });

</script>
</body>
</html><?php }} ?>
