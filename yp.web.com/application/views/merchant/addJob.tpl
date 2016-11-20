<{include file='public/header.tpl'}>

<form id="form" action="/merchant/saveJob.html" method="post">
    <label for="">招聘标题<input type="text" value="<{$info['title']|default:''}>" name='title' placeholder="请输入招聘标题" autocomplete="off"></label>
    <label for="">工作地址<input type="text" value="<{$info['address']|default:''}>" name='address' placeholder="请输入工作地址" autocomplete="off"></label>
    <label for="">工资<input type="text" value="<{$info['salary']|default:''}>" name="salary" placeholder="请输入工资" autocomplete="off"></label>
    <label for="">人数<input type="text" value="<{$info['count']|default:''}>" name="count" placeholder="请输入招聘人数" autocomplete="off"></label>
    <label for="">工作类型
        <select name="workType" id="">
            <option value="">请选择...</option>
            <{foreach $work_type as $k => $j}>
                <option value="<{$k}>"><{$j}></option>
            <{/foreach}>
        </select>
    </label>
    <label for="">条件
        <select name="sexLimit" id="">
            <option value="">请选择...</option>
            <{foreach $sex_limit as $k => $j}>
                <option value="<{$k}>"><{$j}></option>
            <{/foreach}>
        </select>
    </label>
    <label for="">工作时间
        <input type="radio" value="时间段" name="workTime">
        <select name="sexLimit" id="">
            <option value="">请选择...</option>
            <{foreach $work_time as $k => $w}>
                <option value="<{$k}>"><{$w}></option>
            <{/foreach}>
        </select>
        <input type="radio" value="描述" name="workTime">
        <input type="text" placeholder="请输入描述信息" name="workDesc">
    </label>
    <label for="">结算方式
        <select name="settlementMethod" id="">
            <option value="">请选择...</option>
            <{foreach $settlement_method as $k => $s}>
                <option value="<{$k}>"><{$s}></option>
            <{/foreach}>
        </select>
    </label>
    <label for="">
        描述:
        <textarea name="" id="" cols="30" rows="10"></textarea>
    </label>
    <input type="submit" value="Submit">
</form>
</body>
<{include file="public/footer.tpl"}>
</html>