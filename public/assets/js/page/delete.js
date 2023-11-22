$(document).on('submit', '#deleteCategory', function (e) {
    e.preventDefault();
    var form = $(this);
    if (form.valid()) {
        buttonDisabled('.deleteBtn');
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
                    buttonEnabled('.deleteBtn', 'Delete');
                }
            }
        });
    }
});
