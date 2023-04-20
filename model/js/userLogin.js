$(document).ready(function () {

    $('#btn-login').on('click', function () {

        $(this).attr('data-btn', 'login');

        //на форму логін добавляється кнопка "Забули пароль?"
        $btnRole = $(this).data('btn');
        if ($(this).data('btn') === 'login') {
            $('#forgotPasswordLink').removeClass('visibility');

            $('#exampleModalLabel').html('Login form');
            $('#modal-btn-ok').html('Login');

            $('#modal-btn-ok').off('click').on('click', function () {

                let userName = $('#user-name').val();
                let userEmail = $('#user-email').val();
                let userPassword = $('#user-password').val();
                let userIp = $('#user-ip').val();
                let userBrowser = $('#user-browser').val();

                $.ajax({
                    url: './model/php/userLogin.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        userName,
                        userEmail,
                        userPassword,
                        userIp,
                        userBrowser,
                    },
                    success: function (response) {
                        console.log("!!!RES", response);

                        location.reload();

                        $('#modalSignupLogin').modal('hide');

                        //очищення модального вікна
                        $('#user-name').val('');
                        $('#user-email').val('');
                        $('#user-password').val('');
                        $('#error-message').html('');

                        //показуються записи залогіненого користувача
                        chooseOunNotes();
                    },
                    error: function (response) {
                        //виводить в модалку повідомлення
                        let message = response.responseJSON.error.message;
                        $('#error-message').html(message);
                    },
                })
            })
        }
    });

    function chooseOunNotes() {
        $.ajax({
            url: './model/php/pagination.php',
            method: 'POST',
            dataType: 'json',
            success: function (response) {
                response = JSON.parse(response);

                $('#items-row').html(response.user.html);
            },
            error: function (response) {
            },
        })
    }
})


