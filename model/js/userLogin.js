$(document).ready(function () {
    $('#register-btn').on('click', function () {

        let userEmail = $('#user-email').val();
        let userPassword = $('#user-password').val();
        let userIp = $('#user-ip').val();
        let userBrowser = $('#user-browser').val();

        // console.log(userName, userEmail, userPassword, userIp, userBrowser);

        $.ajax({
            url: './model/php/userLogin.php',
            method: 'POST',
            dataType: 'json',
            data: {
                userEmail,
                userPassword,
                userIp,
                userBrowser,
            },
            success: function (response){
                $('#modalLogin').modal('hide');

                //очищення модального вікна
                $('#user-name').val('');
                $('#user-email').val('');
                $('#user-password').val('');
                $('#error-message').html('');
            },
            error: function (response) {
                //виводить в модалку повідомлення
                let message = response.responseJSON.error.message;
                $('#error-message').html(message);
            },

        })
    })
//очищення модального вікна по кнопці знизу чи зверху модального вікна
    $('#cancel-btn, #cancel-x').on('click', function(){
        $('#user-name').val('');
        $('#user-email').val('');
        $('#user-password').val('');
        $('#error-message').html('');
    })

//очистка модального вікна при кліку на бекдроп (mousedown - бо при click при тестуванні юзер може ЛКМ виділивши інпут вилізти за межі модалки, доклікнути на бекдропі і форма очищається, що не правильно)
    $('#modalLogin').on('mousedown', function (event) {
        if (event.target.id === 'modalSignup') {
            $('#user-name').val('');
            $('#user-email').val('');
            $('#user-password').val('');
            $('#error-message').html('');
        }
    });

})