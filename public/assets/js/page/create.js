$(document).ready(function () {

    $('#categoryCreate').validate({
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

$('#categoryCreate').submit(function () {
    if ($('#categoryCreate').valid()) {
        buttonDisabled('.saveBtn')
    }
});


$(document).on('submit', '#categoryCreate', function (e) {
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
