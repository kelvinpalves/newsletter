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

$(function () {
    $('#summernote').summernote({
        // unfortunately you can only rewrite
        // all the toolbar contents, on the bright side
        // you can place uploadcare button wherever you want
        toolbar: [
            ['uploadcare', ['uploadcare']], // here, for example
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['media', 'link', 'hr', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
        uploadcare: {
            // button name (default is Uploadcare)
            buttonLabel: 'Image / file',
            // font-awesome icon name (you need to include font awesome on the page)
            buttonIcon: 'picture-o',
            // text which will be shown in button tooltip
            tooltipText: 'Upload files or video or something',
            // uploadcare widget options, see https://uploadcare.com/documentation/widget/#configuration
            publicKey: 'demopublickey', // set your API key
            crop: 'free',
            tabs: 'all',
            multiple: true
        }
    });
});









$(document).ready(function () {
    $('.overlay').remove();

    $('#formulario').each(function (i, v) {
        $(v).validate({
            submitHandler: function () {

                $.ajax({
                    url: $('#formulario').attr('action'),
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        "assinatura_id": $('#id').val(),
                        "html_assinatura": $('#summernote').summernote('code')
                    },
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