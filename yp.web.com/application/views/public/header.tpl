<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<{$seo_description}>">
    <meta name="keywords" content="<{$seo_keywords}>">
    <link href="<{''|getBaseUrl}>/static/css/common/base.css" rel="stylesheet" type="text/css">
    <link href="<{''|getBaseUrl}>/static/css/common/public.css" rel="stylesheet" type="text/css">
    <{foreach $cssArr as $css}>
        <link href="<{$css['url']|getBaseUrl}>" rel="stylesheet" type="text/css">
    <{/foreach}>
    <title><{$seo_title}></title>
</head>
<body>
<div>
    <a href="<{''|getBaseUrl}>">首页</a>
    <{if !$uid}><a href="<{'/login.html'|getBaseUrl}>">登录</a><{/if}>
    <{if !$uid}><a href="<{'/account/register.html'|getBaseUrl}>">注册</a><{/if}>
</div>