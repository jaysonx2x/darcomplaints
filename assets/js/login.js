/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function validateLogin() {

    var username = $('#login_form #username').val().trim();
    var passw  = $('#login_form #passw').val().trim();

    if (username !== '' && passw !== '') {
        authenticateLogin();
    } else {
        $('#error_msg').removeClass('hidden').text('Enter your username and password!');
        setTimeout(function () {
            $('#error_msg').addClass('hidden');
            $('#login_form #username').focus();
        }, 2000); // 3000ms = 3 seconds
    }
    
}

function authenticateLogin() {

    $('#login_form button[type=button]').attr('disabled', true).html('Authenticating...');

    $.ajax({
        type: 'POST',
        data: { 
            username    : $('#login_form #username').val(),
            passw       : $('#login_form #passw').val()
        },
        dataType: 'json',
        url: BASE_URL + 'auth/login'
    })
    .done(function(data) {

        if (data.status) {
            window.location.replace(BASE_URL + 'main');
        } else {
            $('#error_msg').removeClass('hidden').text(data.error);
            setTimeout(function () {
                $('#error_msg').addClass('hidden');
            }, 2000); // 3000ms = 3 seconds
        }

        $('#login_form button[type=button]').attr('disabled', false).html('Login');

    });

}