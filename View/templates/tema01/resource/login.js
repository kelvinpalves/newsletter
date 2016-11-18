/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

$('#login').click(function () {
    $.ajax({
        url: "/newsletter/login/in",
        type: 'POST',
        dataType: 'json',
        data: {
            login: $('#input_login').val(),
            senha: $('#input_password').val()
        },
        beforeSend: function (xhr) {
            $('#login').val('Entrando...');
        }, 
        success: function (data, textStatus, jqXHR) {
            if (data.exec) {
                $('#login').val('ENTRAR');
                toastr["success"]("Sucesso ao logar, redirecionando...");               
                setTimeout(function () {
                    window.location.href = '/newsletter/sistema/dashboard';
                }, 1500);
            } else {
                $('#login').val('ENTRAR');
                toastr["error"]("Login ou Senha Incorretos");               
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#login').val('ENTRAR');
            toastr["error"]("Ocorreu um erro ao efetuar o login.");               
        }
    });
});


