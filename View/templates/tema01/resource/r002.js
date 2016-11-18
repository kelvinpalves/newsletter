$(function () {
    "use strict";
    
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
        url: "/newsletter/r002/gerar",
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
            
            $('.linha-detalhado').addClass('hidden');
            $('.conteudo-detalhado').html(null);
            
            $('.linha-quantitativo').addClass('hidden');
            $('.conteudo-quantitativo').html(null);
            $('.conteudo-situacao').html(null);
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
                var visualizacao = $('<th>').html('Data de Visualização');

                linha.append(email);
                linha.append(situacao);
                linha.append(visualizacao);

                thead.append(linha);

                var tbody = $('<tbody>');
                tabela.append(tbody);

                $('.conteudo-detalhado').append(tabela);
                $('.linha-detalhado').removeClass('hidden');
                
                /**
                 * fechar tabela de dados detalhados
                 */
                
                $('.linha-quantitativo').removeClass('hidden');
                
                var grafico01 = $('<div>');
                grafico01.addClass('chart');
                grafico01.attr('id', 'grafico-quantitativo');
                grafico01.attr('style', 'height: 300px; position: relative;');
                
                $('.conteudo-quantitativo').append(grafico01);
                
                var grafico02 = $('<div>');
                grafico02.addClass('chart');
                grafico02.attr('id', 'grafico-situacao');
                grafico02.attr('style', 'height: 300px; position: relative;');
                
                $('.conteudo-situacao').append(grafico02);
                
                setTimeout(function () {
                    $('.tabela-detalhado').DataTable({
                        "data": data.dados.relatorioDetalhado,
                        "order": [1, "asc"],
                        "columns": [
                            {"data": "email"},
                            {"data": "situacao"},
                            {"data": "visualizacao"}
                        ]
                    });
                    
                    new Morris.Donut({
                      element: 'grafico-quantitativo',
                      resize: true,
                      colors: ["#f56954", "#00a65a"],
                      data: [
                        {label: "Não Visualizado", value: data.dados.relatorioQuantitativo[0].nao_visualizado},
                        {label: "Visualizado", value: data.dados.relatorioQuantitativo[0].visualizado}
                      ],
                      hideHover: 'auto'
                    });
                    
                    new Morris.Donut({
                      element: 'grafico-situacao',
                      resize: true,
                      colors: ["#E0C73C", "#00a65a", "#f56954", "#3c8dbc"],
                      data: [
                        {label: "Aguardando", value: data.dados.relatorioSituacao[0].aguardando},
                        {label: "Enviado", value: data.dados.relatorioSituacao[0].enviado},
                        {label: "Não Enviado", value: data.dados.relatorioSituacao[0].nao_enviado},
                        {label: "Cancelado", value: data.dados.relatorioSituacao[0].cancelado}
                      ],
                      hideHover: 'auto'
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