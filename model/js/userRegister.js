$(document).ready(function () {

    $('#btn-signup').on('mousedown', function () {
        $('#forgotPasswordLink').addClass('visibility');
    });

    $('#btn-signup').on('click', function () {
        $(this).attr('data-btn', 'signup');

        $btnRole = $(this).data('btn');

        //якщо натиснута кнопка signup, то виконуємо дії
        if ($(this).data('btn') === 'signup') {
            $('#exampleModalLabel').html('Registration form');
            $('#modal-btn-ok').html('Registration');

            $('#modal-btn-ok').off('click').on('click', function () {

                let userName = $('#user-name').val();
                let userEmail = $('#user-email').val();
                let userPassword = $('#user-password').val();
                let userIp = $('#user-ip').val();
                let userBrowser = $('#user-browser').val();

                $.ajax({
                    url: './model/php/userRegister.php',
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
                        $('#modalSignupLogin').modal('hide');

                        //очищення модального вікна
                        $('#user-name').val('');
                        $('#user-email').val('');
                        $('#user-password').val('');
                        $('#error-message').html('');
                    },
                    error: function (response) {
                        let message = response.responseJSON.error.message;
                        $('#error-message').html(message);
                    },
                })
            })
        }
    });

//очищення модального вікна по кнопці знизу чи зверху модального вікна
    $('#modal-btn-cancel, #modal-btn-x').on('click', function () {
        $('#user-name').val('');
        $('#user-email').val('');
        $('#user-password').val('');
        $('#error-message').html('');
    })

//очистка модального вікна при кліку на бекдроп (mousedown - бо при click при тестуванні юзер може ЛКМ виділивши інпут вилізти за межі модалки, доклікнути на бекдропі і форма очищається, що не правильно)
    $('#modalSignupLogin').on('mousedown', function (event) {
        if (event.target.id === 'modalSignupLogin') {
            $('#user-name').val('');
            $('#user-email').val('');
            $('#user-password').val('');
            $('#error-message').html('');
        }
    });
})