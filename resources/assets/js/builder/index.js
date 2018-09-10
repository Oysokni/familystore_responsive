$(document).ready(function () {
    //Maphilight initial
    $('.map-area').maphilight();

    //select district in step 1
    $('#district-label').text("都道府県：");
    $("#search-builder").prop('disabled', true);
    $("#search-builder").addClass('disabled');
    $(".to-top-box").css({'position': 'relative'});
    $(".to-top-box").css({'display': 'inline-block'});
    $(".to-top-box").css({'right': '50px'});
    $(".last-step").hide();

    $("#districts").change(function(){
        if($(this).val() !== ''){
            $('#district-label').text("都道府県：" + $(this).children(":selected").text());
            $('#district').val($(this).val());
            $('#district-name').val($("#districts option:selected").text());

            var id = $(this).val();
            $('map area').each(function() {
                var hData = $(this).data('maphilight') || {}; // get
                hData.alwaysOn = $(this).attr("key") == id; // modify
                $(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
            });
        } else {
            $('#district-label').text("都道府県：");
            $('#district').val("");
            $('#district-name').val("");
            $('map area').each(function() {
                var hData = $(this).data('maphilight') || {}; // get
                hData.alwaysOn = false; // modify
                $(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
            });
        }
    });

    $('map area').click(function(e) {
        e.preventDefault();
        $('#district-label').text("都道府県：" + $(this).attr('data'));
        $('#district').val($(this).attr('key'));
        $('#district-name').val($(this).attr('data'));
        $('#districts').val($(this).attr('key'));
        //keep selected district after click
        var clickedArea = $(this); // remember clicked area
        // foreach area
        $('map area').each(function() {
            var hData = $(this).data('maphilight') || {}; // get
            hData.alwaysOn = $(this).is(clickedArea); // modify
            $(this).data('maphilight', hData ).trigger('alwaysOn.maphilight'); // set
        });
    });
    
//    //select house type in step 2
    $("input[name='radio-house-type']").change(function(){
        var string = '';
        if ($(this).is(':checked')) {
            $(".first-option").find("[type=checkbox]").prop('disabled', false);  
            $("#checkbox-house-option-1").prop('checked', true).trigger('click').prop('disabled', true);            
            if ($("#radio-mansion").is(':checked')) {
                string = $("label[for='" + $("#radio-house").attr('id') + "']").text() + ', ' + $("label[for='" + $("#radio-mansion").attr('id') + "']").text();
                $("#type").val(6);
            } else {
               string = $("label[for='" + $("#radio-house").attr('id') + "']").text(); 
               $("#type").val(1);
            }
        } else {
            $(".first-option").find("#checkbox-house-option-1").prop('disabled', true);
            $("#checkbox-house-option-1").prop('checked', true);
            $("#checkbox-house-option-2").prop('checked', false);
            $("#checkbox-house-option-3").prop('checked', false);
            if ($("#radio-mansion").is(':checked')) {
                string = $("label[for='" + $('#radio-mansion').attr('id') + "']").text();
                $("#type").val(5);
            } else {
                $("#type").val(0);
            }
        }
        $('#type-label').text("希望案件種別: " + string);
    });
    
    $("input[name='radio-house-type-2']").change(function(){
        var value = 0;
        var string = '';
        if ($(this).is(':checked')) {            
            value = 5;
            if ($("#checkbox-house-option-1").prop('checked')) {
                value = 5;
            };
            if ($("#radio-house").is(':checked')) {
                string = $("label[for='" + $("#radio-house").attr('id') + "']").text() + ', ' + $("label[for='" + $("#radio-mansion").attr('id') + "']").text();
                value = 6;
            } else {
                string = $("label[for='" + $("#radio-mansion").attr('id') + "']").text();
                
            }
            if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-2").prop('checked')) {            
                value = 7;            
            }
            if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-3").prop('checked')) {
                value = 8;                
            }
            if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-2").prop('checked') && $("#checkbox-house-option-3").prop('checked')) {
                value = 9;                
            }
            
        } else {
            if ($("#radio-house").is(':checked')) {
                string = $("label[for='" + $("#radio-house").attr('id') + "']").text();
                value = 1;
            } else {
                value = 0;
            } 
            if ($("#checkbox-house-option-1").prop('checked')) {
                value = 1;
            };
            if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-2").prop('checked')) {            
                value = 2;            
            }
            if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-3").prop('checked')) {
                value = 3;                
            }
            if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-2").prop('checked') && $("#checkbox-house-option-3").prop('checked')) {
                value = 4;                
            }            
        }
        $('#type-label').text("希望案件種別: " + string);
        $("#type").val(value);
    });

    $(".first-option").find("[type=checkbox]").click(function () {
        if (this === $(".first-option").find("[type=checkbox]")[0]) {
            $("#checkbox-house-option-1").prop('checked', true);
        }
        var string = $("label[for='" + $("#radio-house").attr('id') + "']").text();
        var value = 0;
        if ($("#checkbox-house-option-1").prop('checked')) {
            value = 1;
            if ($("#radio-mansion").is(':checked')) {
                value = 6;
            }
        }
        if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-2").prop('checked')) {
            value = 2;
            
            if (!$("#radio-house").is(':checked')) {
                $("#radio-house").prop('checked', true);                
            }            
            if ($("#radio-mansion").is(':checked')) {
                value = 7;
                string = $("label[for='" + $("#radio-house").attr('id') + "']").text() + ', ' + $("label[for='" + $("#radio-mansion").attr('id') + "']").text();
            }
           
           
        }
        if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-3").prop('checked')) {
            value = 3;
            if (!$("#radio-house").is(':checked')) {
                $("#radio-house").prop('checked', true);                  
            }   
            if ($("#radio-mansion").is(':checked')) {
                value = 8;
                string = $("label[for='" + $("#radio-house").attr('id') + "']").text() + ', ' + $("label[for='" + $("#radio-mansion").attr('id') + "']").text();
            }
           
        }
        if ($("#checkbox-house-option-1").prop('checked') && $("#checkbox-house-option-2").prop('checked') && $("#checkbox-house-option-3").prop('checked')) {
            value = 4;
            if ($("#radio-mansion").is(':checked')) {
                value = 9;
            }
        }
        $("#type").val(value);
        $('#type-label').text("希望案件種別: " + string);
    });
    
    if($("#type").val() == 1){
        $("input[name='radio-house-type']").prop('checked', true);
        $("#checkbox-house-option-1").prop('checked', true).trigger('click').prop('disabled', true);
        $('#type-label').text("希望案件種別: " + $("label[for='" + $("#radio-house").attr('id') + "']").text());
    }
    
    if ($(".error-mess").hasClass("error-check-builder")) {        
        $("input[name='radio-house-type']").prop('checked', false);
        $(".first-option").find("#checkbox-house-option-1").prop('disabled', true);
        $("#checkbox-house-option-1").prop('checked', true);
    }
    
//    if(($("#type").val() > 1 && $("#type").val() <= 4)) {
//        $('#radio-house').click();
//        $("#checkbox-house-option-1").prop('checked', true);
//        $("#checkbox-house-option-1").prop('disabled', true);
//    }
    
    if ($("#type").val() == 0){        
        $("input[name='radio-house-type']").prop('checked', false);
        $("#checkbox-house-option-1").prop('checked', true).trigger('click').prop('disabled', true);
    }
    
    if ($("#type").val() == '') {
        $("input[name='radio-house-type']").prop('checked', true);
        $('#type-label').text("希望案件種別: " + $("label[for='" + $("#radio-house").attr('id') + "']").text());
    }
    if($("#type").val() == 2) {
        $("#checkbox-house-option-2").prop('checked', true);
    } else if($("#type").val() == 3) {
        $("#checkbox-house-option-3").prop('checked', true);
    } else if($("#type").val() == 4) {
        $("#checkbox-house-option-2").prop('checked', true);
        $("#checkbox-house-option-3").prop('checked', true);
    } else if($("#type").val() == 6 ) {
        $("#checkbox-house-option-1").prop('checked', true);
        $("#radio-mansion").prop('checked', true);
    } else if($("#type").val() == 7 ) {
        $("#checkbox-house-option-2").prop('checked', true);
        $("#radio-mansion").prop('checked', true);
    } else if($("#type").val() == 8 ) {
        $("#checkbox-house-option-3").prop('checked', true);
        $("#radio-mansion").prop('checked', true);
    } else if($("#type").val() == 9 ) {
        $("#checkbox-house-option-2").prop('checked', true);
        $("#checkbox-house-option-3").prop('checked', true);
        $("#radio-mansion").prop('checked', true);
    }
    
    if($("#type").val() == 5) {        
        $('#radio-mansion').click().trigger('change');
         $('#type-label').text("希望案件種別: " + $("label[for='" + $("#radio-mansion").attr('id') + "']").text()); 
    } else {
        $("input[name='radio-house-type']").prop('checked', true);
        $('#type-label').text("希望案件種別: " + $("label[for='" + $("#radio-house").attr('id') + "']").text());    
    }
    
    if ($("#type").val() >= 6 && $("#type").val() <= 9) {
        var string = $("label[for='" + $("#radio-house").attr('id') + "']").text() + ', ' + $("label[for='" + $("#radio-mansion").attr('id') + "']").text();
        $('#type-label').text("希望案件種別: " + string);
    }
    
    $('#districts').val($('#district').val()).trigger('change');
    //click search button in step 3
    if($(".list-builder").length) {
        $(".last-step").show();
        $("html, body").animate({
            scrollTop: parseInt($("#search-result").offset().top)
        }, 1000);
    }

    $("#contract-popup").click(function(){
        var url = $(this).attr('url');
        var button = $('<div class="custom-close pull-right"><button type="button" data-dismiss="modal"><i class="close"></i></button></div>');
        $("#policiesModal .modal-body").load(url, function(responseTxt, statusTxt, xhr){
            $("#policiesModal .modal-body").prepend(button);
        });
    });
});
window.onload = function () {
    $("#checkbox-house-option-1").prop('checked', true).trigger('click').prop('disabled', true);    
    if ($(".error-mess").hasClass("error-check-builder")) {        
        $("input[name='radio-house-type']").prop('checked', false);
        $(".first-option").find("#checkbox-house-option-1").prop('disabled', true);
        $("#checkbox-house-option-1").prop('checked', true);
        $('#type-label').text('');
    }
};