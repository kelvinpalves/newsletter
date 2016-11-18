/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $('.data').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
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
});

$('#btnGerar').click(function () {
    var dataInicial = $('#dataInicial').val();
    var dataFinal = $('#dataFinal').val();

    $.ajax({
        url: "/newsletter/r001/gerar",
        dataType: 'json',
        type: 'POST',
        data: {
            inicio: dataInicial,
            fim: dataFinal
        },
        beforeSend: function (xhr) {
            $.blockUI({
                message: "Gerando relatório...",
                css: {
                    border: 'none',
                    backgroundColor: '#55',
                    opacity: .5
                }
            });

            
            $('.linha-quantitativo').addClass('hidden');
            $('.conteudo-quantitativo').html(null);

            $('.linha-detalhado').addClass('hidden');
            $('.conteudo-detalhado').html(null);
            
        },
        success: function (data, textStatus, jqXHR) {
            if (data.exec == 1) {

                /**
                 * inicio tabela de dados detalhados
                 */
                var tabela = $('<table>');
                tabela.addClass('table table-striped table-bordered dt-responsive nowrap tabela-detalhado');

                var thead = $('<thead>');
                tabela.append(thead);

                var linha = $('<tr>');

                var email = $('<th>').html('E-mail');
                var situacao = $('<th>').html('Situação');
                var template = $('<th>').html('Template');
                var envio = $('<th>').html('Data de Envio');
                var visualizacao = $('<th>').html('Data de Visualização');

                linha.append(email);
                linha.append(situacao);
                linha.append(template);
                linha.append(envio);
                linha.append(visualizacao);

                thead.append(linha);

                var tbody = $('<tbody>');
                tabela.append(tbody);

                $('.conteudo-detalhado').append(tabela);

                $('.linha-detalhado').removeClass('hidden');
                $('.linha-quantitativo').removeClass('hidden');
                /**
                 * final tabela de dados detalhados
                 */

                /**
                 * inicio tabela de dados quantitativo
                 */

                var tabela2 = $('<table>');
                tabela2.addClass('table table-striped table-bordered dt-responsive nowrap tabela-quantitativo');

                var thead2 = $('<thead>');
                tabela2.append(thead2);

                var linha2 = $('<tr>');

                var ano = $('<th>').html('Ano');
                var janeiro = $('<th>').html('Janeiro');
                var feveiro = $('<th>').html('Feveiro');
                var marco = $('<th>').html('Março');
                var abril = $('<th>').html('Abril');
                var maio = $('<th>').html('Maio');
                var junho = $('<th>').html('Junho');
                var julho = $('<th>').html('Julho');
                var agosto = $('<th>').html('Agosto');
                var setembro = $('<th>').html('Setembro');
                var outubro = $('<th>').html('Outubro');
                var novembro = $('<th>').html('Novembro');
                var dezembro = $('<th>').html('Dezembro');

                linha2.append(ano);
                linha2.append(janeiro);
                linha2.append(feveiro);
                linha2.append(marco);
                linha2.append(abril);
                linha2.append(maio);
                linha2.append(junho);
                linha2.append(julho);
                linha2.append(agosto);
                linha2.append(setembro);
                linha2.append(outubro);
                linha2.append(novembro);
                linha2.append(dezembro);

                thead2.append(linha2);

                var tbody2 = $('<tbody>');
                tabela2.append(tbody2);

                $('.conteudo-quantitativo').append(tabela2);

                /**
                 * final tabela de dados quantitativo
                 */

                setTimeout(function () {
                    $('.tabela-detalhado').DataTable({
                        "data": data.dados.relatorioDetalhado,
                        "order": [1, "asc"],
                        "columns": [
                            {"data": "email"},
                            {"data": "situacao"},
                            {"data": "template"},
                            {"data": "envio"},
                            {"data": "visualizacao"}
                        ]
                    });

                    $('.tabela-quantitativo').DataTable({
                        "data": data.dados.relatorioQuantitativo,
                        "order": [1, "asc"],
                        "columns": [
                            {"data": "ano"},
                            {"data": "janeiro"},
                            {"data": "fevereiro"},
                            {"data": "marco"},
                            {"data": "abril"},
                            {"data": "maio"},
                            {"data": "junho"},
                            {"data": "julho"},
                            {"data": "agosto"},
                            {"data": "setembro"},
                            {"data": "outubro"},
                            {"data": "novembro"},
                            {"data": "dezembro"}
                        ]
                    });

                    $.unblockUI();
                }, 1000);
            } else {
                $.unblockUI();
                toastr["error"](data.msg);
            }


        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.unblockUI();
            toastr["error"]("Ocorreu um erro.");
        }
    });
});