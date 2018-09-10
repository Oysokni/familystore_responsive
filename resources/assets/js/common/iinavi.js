$(document).ready(function () {
    var isClick = false;
    $(document).on('click', '#update-info-iinavi', function () {
        var url = $(this).data('url');
        var button = $('<div class="custom-close pull-right"><button type="button" data-dismiss="modal"><i class="close"></i></button></div>');
        $("#infor-iinavi .modal-body").load(url, function (responseTxt, statusTxt, xhr) {
            $("#infor-iinavi .modal-body").prepend(button);
        });
    });
    
    $("#infor-iinavi").on('hidden.bs.modal', function () {
        var linkopen = 'http://www.biz-lixil.com/service/proptool/planning/';
        $.ajax({
            type: 'get',
            url: $(this).data('url'),
            data: {},
            success: function (data) {
                window.open(linkopen, '_blank');
            }
        });
    });

});


