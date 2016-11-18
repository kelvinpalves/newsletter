/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {



    var table = $('#tabela').DataTable({
        "ajax": {
            "url": "/newsletter/contato/carregarTabelaPrincipal",
            "dataSrc": "listaPrincipal"
        },
        "order": [1, "asc"],
        "columns": [
            {"data": "id"},
            {"data": "email",
                "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                    $(nTd).parent().attr('id', sData);
                    $(nTd).attr('style', 'text-align: left;')
                }
            }
        ]
    });

    $('#tabela tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
        $('#totalSelecionado').html($('#tabela').DataTable().$('tr.selected').length);
    });

});

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
                var listaEmail = new Array();

                $.each($('#tabela').DataTable().$('tr.selected'), function (i, d) {
                    listaEmail.push($(this).attr('id'));
                });
                $.ajax({
                    url: $('#formulario').attr('action'),
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        "template_id": $('#templates option:selected').val(),
                        "emails": listaEmail
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
                            toastr["success"](data.msg);
                            if ($('#id').val() == null) {
                                $('#formulario').trigger('reset');
                            }
                        } else {
                            if (data.msg !== 'undefined') {
                                toastr["error"](data.msg);
                            } else {
                                toastr["error"]('Ocorreu um erro ao iniciar o envio.');
                            }

                        }

                    },
                    error: function () {
                        $.unblockUI();
                        toastr["error"]('Ocorreu um erro ao iniciar o envio.');
                    }
                });
            }
        });
    });

});

var marcado = false;

function marcar() {

    $.each($('#tabela').DataTable().$('tr'), function (i, d) {
        if (marcado) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });

    setTimeout(function () {
        marcado = !marcado;
        $('#totalSelecionado').html($('#tabela').DataTable().$('tr.selected').length);
    }, 200);
}