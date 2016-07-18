$(function(){
    $("#js-submit").on('click', function () {
        var username = $("input[name='username']").val();
        var pwd = $("input[name='pwd']").val();
        var data = {'username':username, 'pwd':pwd};
        var url = '/account/handelLogin.html';
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