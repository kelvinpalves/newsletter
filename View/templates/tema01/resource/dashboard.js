/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    setInterval(function () {
        $.ajax({
            url: "/newsletter/sistema/dashboardAJAX",
            type: 'POST',
            dataType: 'json',
            success: function (data, textStatus, jqXHR) {
                $('.totalEnviadoMes').html(data.totalEnviadoMes);
                $('.totalRestanteMes').html(data.totalRestanteMes);
                $('.totalGeral').html(data.totalGeral);
                $('.servico').html(data.servico);
                $('.totalFilaEnvio').html(data.totalFilaEnvio);
            }
        });
    }, 5000);
});