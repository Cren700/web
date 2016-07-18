$(function(){
    $("#js-submit").on('click', function () {
        var data = $('#form').formSerialize();
        var url = '/product/handelAdd.html';
        $.ajax({
            type: 'POST',
            url : url,
            data: data,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                if ( res['code'] !== 0) {
                    alert(res['msg']);
                } else {
                    location.href = res['url'];
                }
            },
            error: function (){
                alert('Ajax is wrong!!!');
            }
        })
    })
});