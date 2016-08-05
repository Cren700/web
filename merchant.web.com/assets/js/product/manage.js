$(function () {
    _init();

    function _init(){
        // 条件
        var data = {};
        $.ajax({
            type: 'POST',
            url : '/product/getProducts.html',
            data: data,
            dataType: 'html',
            success: function (res) {
                $('#js-tbody').html(res);
            },
            error: function (){
                alert('Ajax is wrong!!!');
            }
        })
    }
})