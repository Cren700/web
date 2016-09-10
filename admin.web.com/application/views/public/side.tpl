<div class="wrap-left">
    <div class="wrap-left-content">
        <ul>
            <li class="menu-left-block1<{if $class eq 'stat'}> current<{/if}>">
                <div class="menu-left-home<{if $class eq 'stat'}> current<{/if}>"><a href="/stat">首页</a></div>
            </li>
            <li class="menu-left-block2<{if $url|strstr:'category'}> cur<{/if}>">
                <div<{if $class eq "category"}> class="cur"<{/if}>>文章管理</div>
                <dl<{if $url|strstr:'category'}> style='display:block'<{/if}>>
                    <dd<{if $url eq 'category'}> class="current"<{/if}>><a href="/category">栏目管理</a></dd>
                    <{if isset($cate['cate_list'])}>
                        <{foreach $cate['cate_list'] as $l}>
                            <{assign var='tmp' value="category/catetag/"|cat:$l['id']}>
                            <dd<{if $url eq $tmp}> class="current"<{/if}>><a href="/category/catetag/<{$l['id']}>"><{$l['cate_name']}></a></dd>
                        <{/foreach}>
                    <{/if}>
                </dl>
            </li>
            <li class="menu-left-block3<{if $class eq 'banner'}> cur<{/if}>">
                <div<{if $class eq "banner"}> class="cur"<{/if}>>Banner管理</div>
                <dl<{if $class eq "banner"}> style='display:block'<{/if}>>
                    <dd<{if $url eq 'banner'}> class="current"<{/if}>><a href="/banner">Banner管理</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>