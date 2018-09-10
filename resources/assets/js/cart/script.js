var isAjaxing = false;
$(document).ready(function () {
    $(document).on('click', '.clear', function () {
        if (isAjaxing)
            return;
        isAjaxing = true;
        var box_product = $(this).parents('.box-product');
        var shopping_id = box_product.find('.shopping_id').val();
        var url = $(this).data('url');

        $.ajax({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: 'POST',
            url: url,
            data: {
                'shopping_id': shopping_id,
            },
            success: function (data) {
                if (data.success == 1) {
                    if (data.number == 0) {
                        window.location.reload();
                    } else {
                        box_product.remove();
                    }
                }
                if (data.success == 0) {

                }
                isAjaxing = false;
                return false;
            }
        });

    });
    
    $(".login-enavi-popup").click(function () {
        var url = $(this).data('url');
        var button = $('<div class="custom-close pull-right"><button type="button" data-dismiss="modal"><i class="close"></i></button></div>');
        $("#login-enavi .modal-body").load(url, function (responseTxt, statusTxt, xhr) {
            $(".modal .modal-body").prepend(button);
        });
    });
    
    $(document).on('submit', '#form-login-iinavi', function (event) {
        event.preventDefault();
        if (isAjaxing)
            return;
        isAjaxing = true;
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var formData = $(this).serialize();
        $.ajax({
            type: method,
            url: url,
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            success: function (data) {
                isAjaxing = false;
                resetForm();
                if (data.success == 0) {
                    if (data.errors.email) {
                        $('#email-group').addClass('has-error');
                        $('#email-group').append('<i class="error form-control-feedback error-icon" data-bv-icon-for="email" style=""></i>\n\
                                                        <span class="error-mess"><p>' + data.errors.email + ' </p></span>');

                    }
                    if (data.errors.password) {
                        $('#password-group').addClass('has-error');
                        $('#password-group').append('<i class="error form-control-feedback error-icon" data-bv-icon-for="email" style=""></i>\n\
                                                        <span class="error-mess"><p>' + data.errors.password + ' </p></span>');
                    }
                    if (data.errors.server) {
                        $.each(data.errors.server, function (key, value) {
                            $('#form-login-iinavi').find('.alert-panel').append('<div>' + value + '</div>');
                        });
                        
                        $('#form-login-iinavi').find('.alert-panel').removeClass('hidden');
                    }
                } else if (data.success == 1) {
                    var button = $('<div class="custom-close pull-right"><button type="button" data-dismiss="modal"><i class="close"></i></button></div>');
                    $(".modal .modal-body").load(url, function (responseTxt, statusTxt, xhr) {
                        $(".modal .modal-body").prepend(button);
                    });
                }                
            }
        });

    });
    
    $(document).on('click', '.enavi-popup', function () {        
        var linkopen = 'http://www.biz-lixil.com/service/proptool/planning/';
        if (isAjaxing) {
            return false;
        }
        isAjaxing = true;
        $.ajax({
            type: 'get',
            url: $(this).data('url'),
            data: {},
            success: function (data) {
                isAjaxing = false;
                if(data.success == 1) {                    
                    window.open(linkopen, '_blank');
                } else if (data.success == 0) {
                    $("#infor-iinavi").on('shown.bs.modal', function () {
                        var button = $('<div class="custom-close pull-right"><button type="button" data-dismiss="modal"><i class="close"></i></button></div>');
                        $("#infor-iinavi .modal-body").load(data.url, function (responseTxt, statusTxt, xhr) {
                            $(".modal .modal-body").prepend(button);
                        });
                    }).modal('show');
                }
            }
        });
    });    
  
});
    
function resetForm() {
    $('#email-group').removeClass('has-error');
    $('#email-group').find('i.error').remove();
    $('#email-group').find('span.error-mess').remove();
    $('#password-group').removeClass('has-error');
    $('#password-group').find('i.error').remove();
    $('#password-group').find('span.error-mess').remove();
    $('#form-login-iinavi').find('.alert-panel div').remove();
    $('#form-login-iinavi').find('.alert-panel').addClass('hidden');
}
