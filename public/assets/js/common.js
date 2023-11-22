jQuery.validator.addMethod("noSpace", function (value, element) {
    //return $.trim(value.indexOf(" ")) < 0 && value != "";
    if ($.trim(value) == '' && value != '') {
        //$(element).val("");
        return false;
    } else {
        return true;
    }
}, "Spaces should not be allowed");

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

function buttonDisabled(target) {
    $(target).attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
}

function buttonEnabled(target, html) {
    $(target).attr('disabled', false).html(html);
}
