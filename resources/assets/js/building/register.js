$(document).ready(function () {
    //change checkbox
    changeCheckbox("check_test", "check_role");
    changeCheckbox("check_role", "check_test");
    //disable item
    disableItemWhenCheck('syoukai_kbn_' + BUILDER_SYOUKAI_SELF);
    //paste text to value input
    applyValueToInputFrom('bkn_todouhuken_mei');

    $("#div-disable").find('.col-xs-3').css({'width' : '23%'});
    $("#div-disable").find('.col-xs-9').css({'width' : '77%'});
    // click button a_submit
    $('#a_submit').click(function () {
        window.location = window.location.protocol + '//' + window.location.hostname + '/builder/storeData';
    });

    // click button s_submit
    $('#s_submit').click(function() {
        window.location = window.location.protocol + '//' + window.location.hostname + '/top-page';
    });

});

function changeCheckbox(checkbox1, checkbox2) {
    $("#"+checkbox1).change(function () {
        var isCheck1 = $("#"+checkbox1).is(':checked');
        var isCheck2 = $("#"+checkbox2).is(':checked');
        if(isCheck1 && isCheck2) {
            $("#submit").prop('disabled', false);
        } else {
            $("#submit").prop('disabled', true);
        }
    })
}

function applyValueToInputFrom(nameId) {
    var value = $('#' + nameId).text();
    $("." + nameId).val(value);
}

function disableItemWhenCheck(radioButtonId) {
    $isCheckedFirst = $('#' + radioButtonId).is(':checked');
    if ($isCheckedFirst) {
        addData(true);
        $("#div-disable").addClass('div-disable');
        $("#div-disable").find('input[type=text], select, button, label').addClass('disableMouse');        
    }
    $("input[type=radio][name=syoukai_kbn]").change(function () {
        $isChecked = $('#' + radioButtonId).is(':checked');
        if ($isChecked) {
            addData(true);
            $("#div-disable").addClass('div-disable');
            $("#div-disable").find('input[type=text], select, button, label').addClass('disableMouse');
            $("#contract-popup").attr("href", linkPdfOfUser);
            $("#div-disable").find('.has-error').removeClass('has-error');
            $("#div-disable").find('i.error').remove();
            $("#div-disable").find('label.help-block').remove();
        } else {
            $("#div-disable").removeClass('div-disable');
            $("#div-disable").find('input[type=text], select, button, label').removeClass('disableMouse');
            $("#contract-popup").attr("href", linkPdfOther);
            addData(false);
        }
    });
}
$(function() {
    $('.js-button').click(function(){
        AjaxZip3.zip2addr('zip21','zip22','pref21','addr21','strt21');
    });
});

function addData(is_add) {
    if (is_add) {
        $("#s_sei_kana").val(inforUser.sei_kana);
        $("#s_mei_kana").val(inforUser.mei_kana);
        $("#s_sei_local").val(inforUser.sei_local);
        $("#s_mei_local").val(inforUser.mei_local);
        $("#s_idm_keitai_tel").val(inforUser.idm_keitai_tel);
        $("#s_idm_denwa_no").val(inforUser.idm_denwa_no);
        $("#s_mail").val(inforUser.mail);
        $("#pref21").val(inforUser.todouhuken_mei);
        $("#s_zip_no1").val(inforUser.zip_no.substr(0, 3));
        $("#s_zip_no2").val(inforUser.zip_no.substr(3, 6));
        $("#pref21").val(inforUser.todouhuken_mei);
        $(".addr21").val(inforUser.sikutyouson_mei);
        $(".strt21").val(inforUser.tyoumei);
        $("#s_tat_mei").val(inforUser.tat_mei);
    } else {
        $("#s_sei_kana").val('');
        $("#s_mei_kana").val('');
        $("#s_sei_local").val('');
        $("#s_mei_local").val('');
        $("#s_idm_keitai_tel").val('');
        $("#s_idm_denwa_no").val('');
        $("#s_mail").val('');
        $("#pref21").val('');
        $("#s_zip_no1").val('');
        $("#s_zip_no2").val('');
        $("#pref21").val('');
        $(".addr21").val('');
        $(".strt21").val('');
        $("#s_tat_mei").val('');
    }
}
window.onload = function() {
    if($('#syoukai_kbn_' + BUILDER_SYOUKAI_SELF).is(':checked')) {
        $("#contract-popup").attr("href", linkPdfOfUser);
    } else {
        $("#contract-popup").attr("href", linkPdfOther);
    }
};
