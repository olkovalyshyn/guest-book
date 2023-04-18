$(document).ready(function () {

    $('#btn-login').on('click', function () {

        // console.log("Clicked on btn-login");
        $(this).attr('data-btn', 'login');

        //на форму логін добавляється кнопка "Забули пароль?"

        $btnRole = $(this).data('btn');
        // console.log("!!!$btnRole", $btnRole);
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

                // console.log(userName, userEmail, userPassword, userIp, userBrowser);

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
                        // response = response;

                        location.reload();

                        $('#modalSignupLogin').modal('hide');

                        //очищення модального вікна
                        $('#user-name').val('');
                        $('#user-email').val('');
                        $('#user-password').val('');
                        $('#error-message').html('');

                    },
                    error: function (response) {
                        //виводить в модалку повідомлення
                        console.log("!!!response in login error", response)
                        let message = response.responseJSON.error.message;
                        $('#error-message').html(message);
                    },

                })
            })

        }
    });

})

// console.log(document.cookie);


//якщо юзер зареєструвався і перезавантажив сторінку, то він
// залишаєтсья авторизованим до закінчення дії cookie

// if (document.cookie.includes('userName')) {
//
//     // дістається значення cookie "userName"
//     const userName = document.cookie.split('; ')
//         .find(row => row.startsWith('userName='))
//         .split('=')[1];
//     let userNameGreeting = userName;
//
//     console.log("!!userNameGreeting!!!", userNameGreeting);
//
//     $('#greeting-text').html("Hello, " + userNameGreeting);
//
//     //зміна класів і віповідно видимість конпок
//     $('#btn-logout').removeClass('btn-visibility');
//     $('#btn-login').addClass('btn-visibility');
//     $('#btn-signup').addClass('btn-visibility');
// }
