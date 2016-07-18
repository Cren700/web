<!--footer start-->

<!--footer end -->
<{if isset($htmlJsArr)}>
    <{foreach $htmlJsArr as $js}>
        <script type="text/javascript" src="<{$js.src}>"></script>
    <{/foreach}>
<{/if}>

