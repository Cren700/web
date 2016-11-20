if (typeof (YPAPP) == "undefined" || !YPAPP) {
    var YPAPP = {}
}
YPAPP.Login = (function () {

    function _init() {
        $('#js-get-VC, #vc-img').on('click', function (e) {
            e.preventDefault();
            $(this).hide();
            showVC();
        });

        $('input[name=vc]').on('focus', function (e) {
            if(!$('#vc-img').attr('src')) {
                $('#js-get-VC').hide();
                showVC();
            }
        });
    }

    function showVC()
    {
        var now = new Date();
        $("#vc-img").attr('src', "/login/getVC.html?="+ now.getTime());
    }

    return {
        init: _init
    }
})();

$(document).ready(function(){
    YPAPP.Login.init();
})
