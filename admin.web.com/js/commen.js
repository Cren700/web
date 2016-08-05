//返回UTC时间
function showDate(time)
{
    var date = new Date(parseInt(time) * 1000);
    var dateStr = '';
    dateStr += date.getFullYear() + '年';   //返回年份
    dateStr += date.getMonth() + 1 + '月';    //返回月份，因为返回值是0开始，表示1月，所以做+1处理
    dateStr += date.getDate() + '日 ';        //返回日期
    return dateStr;
}
function showTime(time)
{
    var str = '-';
    if(time > 0)
    {
        var date = new Date(parseInt(time) * 1000);

        var year = date.getFullYear();   //返回年份

        var month = date.getMonth() + 1;    //返回月份，因为返回值是0开始，表示1月，所以做+1处理
        month = month < 10 ? '0' + month : month;

        var day = date.getDate();        //返回日期
        day = day < 10 ? '0' + day : day;

        var hours = date.getHours();
        hours = hours < 10 ? '0' + hours : hours;

        var minutes = date.getMinutes();
        minutes = minutes < 10 ? '0' + minutes : minutes;

        var seconds = date.getSeconds();
        seconds = seconds < 10 ? '0' + seconds : seconds;

        str = year + '/' + month + '/' + day + ' ' + hours + ':' + month + ':' + seconds;
    }
    return str;
}


//订单表中的操作选项
function orderSelect(value, orderid)
{
    if(value == "check")
    {
        window.location.href = "/order/checkorder?orderid="+orderid;
    }
    else if(value == "delivery")
    {
        window.location.href = "/order/deliveryorder?orderid="+orderid;
    }
    else if(value == "refund")
    {
        window.location.href = "/order/refundorder?orderid="+orderid;
    }
    else if(value == "link")
    {
        window.location.href = "/order/linkmer?orderid="+orderid;
    }
    else if(value == "editadd")
    {
        window.location.href = "/order/editadd?orderid="+orderid;
    }
    else
        return false;
}

// $(function()
// {
//     //每间隔30秒获取一次消息数量
//     setInterval("getCount()", 30000);
// })
// function getCount()
// {
//     var url = '/sysmassage/getmsgcount';
//     $.ajax(
//     {
//         url:url,
//         type:"get",
//         data:null,
//         dataType:"json",
//         error:function(XMLHttpRequest, textStatus, errorThorwn)
//         {
//             // console.log(textStatus);
//         },
//         success:function(data, textStatus)
//         {
//             $("#order_count").text(data.orderCount);
//             $("#customer_count").text(data.customerCount);
//             $("#sale_count").text(data.saleCount);
//             if($("#sysmassage_count").size() == 0)
//             {
//                 if(data.sysmassageCount != 0)
//                 {
//                     var str = "<label id='sysmassage_count'>"+data.sysmassageCount+"</label>";
//                     $(".wrap-online-message").append(str);
//                 }
//             }
//             else
//             {
//                 if(data.saleCount == 0)
//                 {
//                     $("#sysmassage_count").remove();
//                 }
//
//             }
//         }
//     })
// }