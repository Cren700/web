<div class="wrap-left">
    <div class="wrap-left-content">
        <ul>
            <li class="menu-left-block1<{if $class eq 'stat'}> current<{/if}>">
                <div class="menu-left-home<{if $class eq 'stat'}> current<{/if}>"><a href="/stat">首页</a></div>
            </li>
            <li class="menu-left-block2<{if $class eq 'product'}> cur<{/if}>">
                <div<{if $class eq "product"}> class="cur"<{/if}>>文章管理</div>
                <dl<{if $class eq "category"}> style='display:block'<{/if}>>
                    <dd<{if $url eq 'category'}> class="current"<{/if}>><a href="/category.html">栏目管理</a></dd>
                <{if isset($cate['cate_list'])}>
                    <{foreach $cate['cate_list'] as $l}>
                        <dd<{if $url eq 'category'}> class="current"<{/if}>><a href="/category/catetag.html?cate_id=<{$l['id']}>"><{$l['cate_name']}></a></dd>
                    <{/foreach}>
                <{/if}>
                </dl>
            </li>
            <li class="menu-left-block3<{if $class eq 'order'}> cur<{/if}>">
                <div<{if $class eq 'order'}> class="cur"<{/if}>>订单管理</div>
                <dl<{if $class eq "order"}> style='display:block'<{/if}>>
                    <dd<{if $url eq 'order/undeal'}> class="current"<{/if}>><a href="/order/undeal">未处理订单</a></dd>
                    <dd<{if $url eq 'order'}> class="current"<{/if}>><a href="/order">查看所有订单</a></dd>
                </dl>
            </li>
            <li class="menu-left-block4<{if $class eq 'service'}> cur<{/if}>">
                <div<{if $class eq 'service'}> class="cur"<{/if}>>客服管理</div>
                <dl<{if $class eq "service"}> style='display:block'<{/if}>>
                    <dd<{if $url eq 'service/lists' or $url eq 'service/serv'}> class="current"<{/if}>><a href="/service/lists?stat=1">售后问题</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>