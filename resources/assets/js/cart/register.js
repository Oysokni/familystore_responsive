(function ($) {
    
    /*
     * radio/checkbox disable element
     */
    $('.check-disable').each(function (e) {
        var inputs = $(this).find('input[type="' + $(this).data('type') + '"]');
        var targetDisable = [];
        inputs.each(function () {
           if (typeof $(this).data('disable') != 'undefined') {
               targetDisable.push($(this).data('disable'));
           } 
        });
        var elmTargetArea = $(this).closest('.check-disable-area');
        //check each input has attribute disable
        inputs.on('click', function () {
            var inputDisable = $(this).data('disable');
            $(targetDisable.join(',')).prop('disabled', false);
            elmTargetArea.removeClass('disable');
            if ($(this).is(':checked')
                    && typeof inputDisable != 'undefined' 
                    && targetDisable.indexOf(inputDisable) > -1) {
                //disable input
                $(inputDisable).prop('disabled', true);
                //set class disable container
                elmTargetArea.addClass('disable');
                //set default value
                $(inputDisable).each(function () {
                   var valDefault = $(this).data('default');
                   $(this).removeClass('field-error');
                   $(this).val(valDefault);
                });
                //remove error message
                elmTargetArea.find('.error-mess').remove();
            }
        });
        //check init checked disable
        var inputChecked = $(this).find('input[type="' + $(this).data('type') + '"]:checked');
        if (inputChecked.length > 0 && typeof inputChecked.data('disable') != 'undefined') {
            var inputDisable = inputChecked.data('disable');
            $(inputDisable).prop('disabled', true);
            elmTargetArea.addClass('disable');
        }
    });
    
    /*
     *  button reset form input data 
     */
    $('.btn-reset-form').click(function (e) {
        e.preventDefault();
        var form = $(this).closest('form');
        form[0].reset();
    });
    
    /*
     *  button reset form input data 
     */
    $('.btn-reset-form').click(function (e) {
        e.preventDefault();
        var form = $(this).closest('form');
        form[0].reset();
    });

    /*
     * generate address form zipcode
     */
    $('.zipcode-gen-btn').click(function (e) {
        e.preventDefault();
        AjaxZip3.zip2addr('bkn_zip_no1', 'bkn_zip_no2', 'bkn_todouhuken_mei', 'bkn_sikutyouson_mei', 'bkn_tyoumei');
    });

})(jQuery);
