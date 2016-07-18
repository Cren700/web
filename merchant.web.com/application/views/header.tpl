<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="<{$seo['keywords']}>">
    <meta name="description" content="<{$seo['description']}>">
    <link rel="stylesheet" href="<{'base.css'|baseCssUrl}>">
    <{if isset($htmlCssArr)}>
        <{foreach $htmlCssArr as $css}>
            <link rel="stylesheet" href="<{$css['href']}>">
    <{/foreach}>
    <{/if}>
    <script type="text/javascript" src="/assets/js/jquery-2.1.4.min.js"></script>
    <title><{$seo['title']}></title>
</head>