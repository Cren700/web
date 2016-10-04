<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<{$seo['description']}>">
    <meta name="keywords" content="<{$seo['keywords']}>">
    <link href="/static/css/common/base.css" rel="stylesheet" type="text/css">
    <{foreach $cssArr as $css}>
        <link href="<{$css['url']}>" rel="stylesheet" type="text/css">
    <{/foreach}>
    <title><{$seo['title']}></title>
</head>
