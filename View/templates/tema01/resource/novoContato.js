
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "10000",
    "hideDuration": "10000",
    "timeOut": "10000",
    "extendedTimeOut": "10000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$.validator.setDefaults({
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$(document).ready(function () {

    $('#formulario').each(function (i, v) {
        $(v).validate({
            submitHandler: function () {

                $.ajax({
                    url: $('#formulario').attr('action'),
                    dataType: 'json',
                    type: 'POST',
                    data: $('#formulario').serialize(),
                    beforeSend: function () {
                        $.blockUI({
                            message: "enviando dados...",
                            css: {
                                border: 'none',
                                backgroundColor: '#55',
                                opacity: .5
                            }
                        });
                    },
                    success: function (data) {
                        $.unblockUI();
                        if (data.exec) {
                            toastr["success"]('Sucesso ao efetuar o registro');
                            if ($('#id').val() == null) {
                                $('#formulario').trigger('reset');
                            }
                        } else {
                            if (data.msg !== 'undefined') {
                                toastr["error"](data.msg);
                            } else {
                                toastr["error"]('Ocorreu um erro ao efetuar o registro.');
                            }
                            
                        }

                    },
                    error: function () {
                        $.unblockUI();
                        toastr["error"]('Ocorreu um erro ao efetuar o registro.');
                    }
                });
            }
        });
    });

});