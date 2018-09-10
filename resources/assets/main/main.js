$(document).ready(function () {
    /**
     * disable button in form confirm information
     */
    $('#confirm-information').attr('disabled', 'disabled');
    $('#agree').change(function () {

        if ($(this).is(':checked')) {

            $('#confirm-information').prop('disabled', false);

        } else {

            $('#confirm-information').prop('disabled', true);

        }
    });

    // show model on click button rand code intive

    $('#random-code').click(function () {


        var x = Math.floor((Math.random() * 10000000000) + 1);

        $('#code-intive').val(x);
    });

    // show modal
    $('#show-modal').click(function () {

        $('#myModal').modal('show');

        $('#code-intive').val("");
    });
    
    $('#pdf_viewer').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            $('#agree').removeAttr("disabled");
        }
    });

});