 <!DOCTYPE html>
 <html>
 <head>
 	<title>设置运费</title>
 	<style type="text/css">
 	td{padding: 5px 10px;text-align: center;}
 	.td1{text-align: left;}
 	</style>
 </head>
 <body>
 <table>
 	<tr class="th">
 		<td class="td1">国家</td>
 		<td class="td2">配送费</td>
 		<td class="td3">启用</td>
 		<td class="td4"></td>
 		<td class="td5"></td>
 	</tr>
 	<tr class="tr">
 		<input type="hidden" name="id" value="0">
 		<td class="td1">
 			<select name="country">
 				<{foreach from=$data.country.list item=cLists}>
 				<option value="<{$cLists.countryName}>"><{$cLists.countryName}></option>
 				<{/foreach}>
 			</select>
 		</td>
 		<td class="td2"><input type="text" placeholder="0.0" name="price"></td>
 		<td class="td3"><input type="checkbox" name="status" checked="checked"></td>
 		<td class="td4"><button class="add_btn">添加</button></td>
 	</tr>
 	<{foreach from=$data.Express.list item=eLists}>
 	<tr class="tr">
 		<input type="hidden" name="id" value="<{$eLists.id}>">
 		<td class="td1">
 			<select name="country">
 				<option value="<{$eLists.country}>"><{$eLists.country}></option>
 				<{foreach from=$data.country.list item=cLists}>
 				<option value="<{$cLists.countryName}>"><{$cLists.countryName}></option>
 				<{/foreach}>
 			</select>
 		</td>
 		<td class="td2"><input type="text" placeholder="0.0" name="price" value="<{$eLists.price}>"></td>
 		<td class="td3"><input type="checkbox" name="status" <{if $eLists.status eq 1}>checked<{/if}>></td>
 		<td class="td4"><button class="update_btn">更新</button></td>
 		<td class="td5"><button class="delete_btn">删除</button></td>
 	</tr>
 	<{/foreach}>
 	<tr class="clone-obj"  style="display:none">
 		<input type="hidden" name="id" value="0">
 		<td class="td1">
 			<select name="country">
 				<{foreach from=$data.country.list item=cLists}>
 				<option value="<{$cLists.countryName}>"><{$cLists.countryName}></option>
 				<{/foreach}>
 			</select>
 		</td>
 		<td class="td2"><input type="text" placeholder="0.0" name="price" value=""></td>
 		<td class="td3"><input type="checkbox" name="status" checked="checked"></td>
 		<td class="td4"><button class="update_btn">更新</button></td>
 		<td class="td5"><button class="delete_btn">删除</button></td>
 	</tr>
 </table>
 </body>
 </html>
 <script type="text/javascript" src="/js/jquery-2.1.1.js"></script>
 <script type="text/javascript">
 $(function(){

 	var add_btn = $('.add_btn');
 	var update_btn = $('.update_btn');
 	var delete_btn = $('.delete_btn');
 	
 	add_btn.click(function(){
 		var box = $(this).parents('tr');
 		console('add',box);
 	})
 	delete_btn.click(function(){
 		var box = $(this).parents('tr');
 		console('delete',box);
 	})
 	update_btn.click(function(){
 		var box = $(this).parents('tr');
 		console('update',box);
 	})

 	//获取表单值
 	function getVal(box)
 	{
 		var id = box.find('input[name="id"]').val();
 		var country = box.find('select[name="country"]').val();
 		var price = box.find('input[name="price"]').val();
 		var status = box.find('input[name="status"]').is(':checked')? 1 : 0 ;
 		var temp=/^\d+(\.\d+)?$/;
 		if (!price || !temp.test(price)) 
 		{
 			alert('Price Error');
 			return false;
 		};
 		return {'id':id,'country':country,'price':price,'status':status};
 	}

 	/**
 	* @action string 操作类型
 	* @box	  父元素
 	*
 	*/
 	function console(action,box)
 	{

 		var opt = getVal(box);
 		if (!opt) 
 		{
 			return false;
 		};
	 	$.ajax({
	 		url: '/express/' + action,
	 		type: 'post',
	 		dataType: 'json',
	 		data: opt,
	 		success:function(data)
	 		{
	 			if (data.code) 
	 			{
	 				alert(data.msg);
	 			}
	 			else
	 			{
	 				alert('success');
	 				if (action == 'delete') 
	 				{
	 					//删除一条记录
	 					box.remove();
	 				}
	 				else if (action == 'add') 
	 				{
	 					//添加一条记录
	 					var tr = $('.clone-obj').clone();
	 					tr.addClass('tr').removeClass('clone-obj');
	 					tr.show();
	 					tr.find('input[name="price"]').val(opt.price);
	 					if (!opt.status) 
	 					{
	 						tr.find('input[name="status"]').attr("checked",false);
	 					};
	 					$('table').append(tr);
	 				};
	 			}
	 		}
	 	})
 	}

 	
 })
 </script>