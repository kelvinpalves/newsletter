/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#tabela').DataTable({
    "ajax": {
        "url": "/newsletter/template/carregarTabelaPrincipal",
        "dataSrc": "listaPrincipal"
    },
    "order": [1, "asc"],
    "columns": [
        {"data": "id"},
        {"data": "titulo"},
        {"data": "id",
            "mRender": function (data) {
                return '<i class="fa fa-edit" style="cursor: pointer;" onclick="window.location.href=\'/newsletter/template/novo/' + data + '\';" ></i>\n\
                        &nbsp;<i class="fa fa-trash" style="cursor: pointer;" onclick="remover(\'template_id\', ' + data + ', \'tabela\');"></i>';
            },
            "bSortable": false,
            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                $(nTd).parent().attr('id', sData);
            }
        }
    ]
});

function remover(obj, id, tabela, td) {

    $.confirm({
        text: "Você tem certeza que deseja remover o registro?",
        title: "Confirmação",
        confirm: function (button) {

            var params = {};
            form = $('#' + tabela);

            params[obj] = id;

            $.ajax({
                url: '/newsletter/template/remover',
                data: params,
                dataType: 'json',
                type: 'POST',
                beforeSend: function (xhr) {
                    $.blockUI({
                        message: "enviando dados...",
                        css: {
                            border: 'none',
                            backgroundColor: '#55',
                            opacity: .5
                        }
                    });
                },
                success: function (data, textStatus, jqXHR) {
                    $.unblockUI();

                    if (data.exec) {
                        toastr["success"]('Sucesso ao remover o registro');
                        $('#' + tabela).DataTable().row($('#' + id).index()).remove().draw();
                    } else {
                        if (data.msg !== 'undefined') {
                            toastr["error"](data.msg);
                        } else {
                            toastr["error"]('Ocorreu um erro ao efetuar o registro.');
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $.unblockUI();
                    toastr["error"]("Ocorreu um erro.");
                }
            });

        },
        cancel: function (button) {
            // nothing to do
        },
        confirmButton: "Remover",
        cancelButton: "Cancelar",
        post: true,
        confirmButtonClass: "btn-danger btn-flat",
        cancelButtonClass: "btn-default btn-flat",
        dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
    });

}