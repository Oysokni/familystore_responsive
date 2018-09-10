(function () {   
    var token = $('input[name="_token"]').val();    
    $(document).on('click', '.open-link', function () {
        var form;
        var token1;
        var token2;
        var linkUrl;
        var linkGoto = $(this).data('link') ;
        
        $.ajax({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: 'GET',
            url: $(this).data('url'),
            data: {},
            success: function (data) {
                if (data.success == 0) {
                    return;
                } else if (data.success == 1) {
                    token1 = data.response.token1;
                    token2 = data.response.token2;
                    linkUrl = data.url;                    
                    
                    form = laravel.createForm(token, token1, token2, linkUrl, linkGoto);
                    form.submit();
                }
            }
        });
    });
    
    var laravel = {        
        createForm: function (csrf_token, token1, token2, linkUrl, linkGoto) {
            var form =
                    $('<form>', {
                        'method': 'POST',
                        'action': linkUrl,
                        'target': '_blank'
                    });
            var token =
                    $('<input>', {
                        'type': 'hidden',
                        'name': '_token',
                        'value': csrf_token,
                    });
            var hiddenInput1 =
                    $('<input>', {
                        'name': 'IDToken1',
                        'type': 'text',
                        'value': token1
                    });
            var hiddenInput2 =
                    $('<input>', {
                        'name': 'IDToken2',
                        'type': 'text',
                        'value': token2
                    });
            var hiddenInput3 =
                    $('<input>', {
                        'name': 'goto',
                        'type': 'text',
                        'value': linkGoto,
                    });
            return form.append(token, hiddenInput1, hiddenInput2, hiddenInput3).appendTo('body');
        }
    };
    
})();
