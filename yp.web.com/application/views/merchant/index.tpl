<{include file="public/header.tpl"}>
<{if !empty($info)}>
<table>
    <thead>
        <tr>
            <th>公司简称</th>
            <th>公司全称</th>
            <th>公司地址</th>
            <th>公司简介</th>
            <th>负责人姓名</th>
            <th>负责人联系电话</th>
            <th>负责人邮件</th>
            <th>公司logo</th>
            <th>公司状态</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><{$info['cp_sname']}></td>
            <td><{$info['cp_fullname']}></td>
            <td><{$info['cp_add']}></td>
            <td><{$info['cp_detail']}></td>
            <td><{$info['charge_name']}></td>
            <td><{$info['charge_phone']}></td>
            <td><{$info['charge_email']}></td>
            <td><{$info['cp_logo']}></td>
            <td>
                <{if $info['check_status'] eq 0}><span>禁用</span><{elseif $info['check_status'] eq 1}><span>过期</span><{elseif $info['check_status'] eq 2}><span>审核中</span><{else}><span>通过审核</span><{/if}>
            </td>
            <td><span><a href="/merchant/edit.html">编辑</a></span></td>
        </tr>
    </tbody>
</table>
<div>
    <ul>
        <li><a href="" title="发布职位">发布职位</a></li>
        <li><a href="" title="公司信息">公司信息</a></li>
        <li><a href="" title="招聘信息">招聘信息</a></li>
    </ul>
</div>
<{else}>
你还没有添加商家信息哦!<a href="<{'/merchant/edit'|getBaseUrl}>" title="填写商家信息">现在去填写</a>
<{/if}>
</body>
</html>