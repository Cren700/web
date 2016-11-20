<{include file="public/header.tpl"}>
<{if empty($info)}>
    <table>
        <thead>
        <tr>
            <th>招聘标题</th>
            <th>工作地址</th>
            <th>工资</th>
            <th>人数</th>
            <th>工作类型</th>
            <th>条件</th>
            <th>工作时间</th>
            <th>结算方式</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <{foreach $info as $i}>
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
            <{/foreach}>
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
    你还没有添加招聘信息哦!<a href="<{'/merchant/addJob'|getBaseUrl}>" title="填写商家信息">现在去添加</a>
    <{/if}>
</body>
</html>