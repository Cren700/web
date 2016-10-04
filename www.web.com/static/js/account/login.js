$(function () {
    $('#js-get-VC, #vc-img').on('click', function (e) {
        e.preventDefault();
        var now = new Date();
        $("#vc-img").attr('src', "/login/getVC.html?="+ now.getTime());
    });
    //
    // $('input[name=vc]').on('blur', function () {
    //     $.ajax({
    //         url: "/login/checkVC.html?vc=" + $(this).val(),
    //         dataType: 'json',
    //         type: 'post',
    //         success: function (res) {
    //             if (res.code !== 0) {
    //                 YPAPP.Dialog.showMsg({
    //                     type: 'warm',
    //                     msg: res.msg
    //                 });
    //                 return false;
    //             }
    //         },
    //         error: function (){
    //             YPAPP.Dialog.showMsg({
    //                 type: 'warm',
    //                 msg: "都是程序员的锅!抱歉,出错了!"
    //             });
    //         }
    //     })
    // })
})