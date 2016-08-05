<{foreach $productList as $key => $list}>
<tr>
    <td><{$key+1}></td>
    <td><{$list['name']}></td>
    <td><{$list['sale_price']}></td>
    <td><{$list['market_price']}></td>
    <td><{$list['original_price']}></td>
    <td><{$list['view_cnt']}></td>
    <td><{$list['order_cnt']}></td>
    <td><{$list['description']}></td>
    <td><{$list['status']}></td>
    <td><{$list['promotion_tag']}></td>
    <td><{$list['priority']}></td>
    <td><{$list['protocol']}></td>
    <td><{$list['product_tag']}></td>
    <td><{$list['detail']}></td>
    <td data-pid="<{$list['id']}>" data-op-status="<{$list['op_status']}>">
        <a href="" title="点击进行<{if $list['op_status'] eq 0}>审核<{elseif $list['op_status'] eq 1 && $list['status'] eq 0}>上架<{elseif $list['op_status'] eq 1 && $list['status'] eq 1}>下架<{elseif $list['op_status'] eq 2}>审核中<{elseif $list['op_status'] eq 3}>审核不通过<{/if}>">
        <{if $list['op_status'] eq 0}>
        未审核
        <{elseif $list['op_status'] eq 1 && $list['status'] eq 0}>
        未上架
        <{elseif $list['op_status'] eq 1 && $list['status'] eq 1}>
        上架
        <{elseif $list['op_status'] eq 2}>
        审核中
        <{elseif $list['op_status'] eq 3}>
        审核不通过
        <{/if}>
        </a>
        <a href="javascript:void(0)" class="js-alter">修改</a>
        <a href="javascript:void(0)" class="js-del">删除</a>
    </td>
</tr>

<{/foreach}>