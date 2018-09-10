(function ($) {
    var requiredChecked = 0;
    var totalChecked = 0;
    if ($("#total-builder").html() === 0) {
        $("#first-builder").html(0);
        $("#last-builder").html(0);
    }

    //select builder after searching
    $(".list-builder-item input").click(function() {
        var td = $(this).closest('td');
        var previousTd =  $(td).prev();
        var spans = $(previousTd).find('span');
        if ($(spans[0]).hasClass('obligate')) {
            if ($(this).is(":checked")) {
                $(td).find("input[type=hidden]").prop('disabled', false);
                requiredChecked += 1;
                totalChecked += 1;
            } else {
                $(td).find("input[type=hidden]").prop('disabled', true);
                requiredChecked -= 1;
                totalChecked -= 1;
            }
        } else {
            if ($(this).is(":checked")) {
                $(td).find("input[type=hidden]").prop('disabled', false);
                totalChecked += 1;
            } else {
                $(td).find("input[type=hidden]").prop('disabled', true);
                totalChecked -= 1;
            }
        }
    });
    $(".list-builder-item input[type=checkbox]").each(function(){
        var td = $(this).closest('td');
        var previousTd =  $(td).prev();
        var spans = $(previousTd).find('span');
        if ($(spans[0]).hasClass('obligate')) {
            if ($(this).is(":checked")) {
                $(td).find("input[type=hidden]").prop('disabled', false);
                requiredChecked += 1;
                totalChecked += 1;
            } else {
                $(td).find("input[type=hidden]").prop('disabled', true);
                requiredChecked -= 1;
                totalChecked -= 1;
            }
        } else {
            if ($(this).is(":checked")) {
                $(td).find("input[type=hidden]").prop('disabled', false);
                totalChecked += 1;
            } else {
                $(td).find("input[type=hidden]").prop('disabled', true);
                totalChecked -= 1;
            }
        }
    });
    //pagination
    $("[id*=page-number]").click(function() {
        var id = $(this).attr('id');
        var page = id.substr(11);
        var totalItems = $("#total-items").val();
        var itemsPerPage = $("#items-per-page").val();
        var firstBuilder = (page - 1) * itemsPerPage + 1;
        var lastBuilder = totalItems > page * itemsPerPage ? page * itemsPerPage : totalItems;
        $(".first-builder").html(firstBuilder);
        $(".last-builder").html(lastBuilder);        
    });
    $("[id*=bottom-page-number]").click(function() {
        var id = $(this).attr('id');
        var page = id.substr(7, id.length - 1);
        $("#" + page).click();
          
    });
    $("#page-number1").click();     
    $("#bottom-page-number1").click();     
    $("#districts").val($("#district").val()).trigger('change');
})(jQuery);

$(document).ready(function () {
    $("[id*=page-number]").click(function () {
        var id = $(this).attr('id');
        $(".custom-pagination-bottom").find("li").removeClass('active');
        $("#bottom-" + id).parent("li").addClass('active');
        $('html, body').animate({
            scrollTop: $("#list-builder-header").offset().top
        }, 800);
    });
});
