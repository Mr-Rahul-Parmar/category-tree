$(document).ready(function () {

    $('#categoryEdit').validate({
        ignore: [],
        rules: {

        },
        messages: {

        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-error').append(error);
        }
    });
});

$('#categoryEdit').submit(function () {
    if ($('#categoryEdit').valid()) {
        buttonDisabled('.saveBtn')
    }
});


$(document).on('submit', '#categoryEdit', function (e) {
    e.preventDefault();
    var form = $(this);
    if (form.valid()) {
        buttonDisabled('.saveBtn');
        $.ajax({
            method: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                if (response.status === 1) {
                    window.location.href = response.redirect;
                } else {
                    $('#idAlertErrorMsg').show()
                    $('#idScriptErrorMsg').html(response.message)
                    buttonEnabled('.saveBtn', 'Submit');
                }
            }
        });
    }
});
