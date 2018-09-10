(function ($) {
    
    /*
     * animate scroll to element
     */
    $('.element-link a').click(function (e) {
        e.preventDefault();
        var element = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(element).offset().top
        }, 1000);
    });
    
    /*
     * animate scroll to top
     */
    $('.to-top-box a').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
    
    $('.data-single-click').click(function() {
        $(this).attr('disabled','disabled');
    });
    
    $("#password-field").keyup(function() {
        var pass = $(this).val();
        if (pass.trim().length == 0) {
            $(".toggle-password").hide();
        } else {
            $(".toggle-password").show();
        }
    });
    
    $(".toggle-password").click(function() {
        $(this).toggleClass("visibility visibility_off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });
    
    if ($("i").hasClass("error-icon-password")) {
        $(".field-icon").css("right", "38px");
    }
})(jQuery);


