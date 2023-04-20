$(document).ready(function () {

    $('#btn-send-mail-recover').on('click', function () {
        let userEmail = $('#user-email-recover-pswd').val();

        $.ajax({
            url: './model/php/forgotPassword.php',
            method: 'POST',
            dataType: 'json',
            data: {
                userEmail,
            },
            success: function (response) {
                $('#modalForgotPassword').modal('hide');

                //очищення модального вікна
                $('#user-email-recover-pswd').val('');
            },
            error: function (response) {
                //виводить в модалку повідомлення
                let message = response.responseJSON.user.message;
                console.log('!!!message err', message);
                $('#error-message-recover').html(message);
            },
        })
    })

//очищення модального вікна по кнопці знизу чи зверху модального вікна
    $('#modal-btn-cancel-recover, #modal-btn-x-recover').on('click', function(){
        $('#user-email-recover-pswd').val('');
        $('#error-message-recover').html('');

    })


    //очистка модального вікна при кліку на бекдроп (mousedown - бо при click при тестуванні юзер може ЛКМ виділивши інпут вилізти за межі модалки, доклікнути на бекдропі і форма очищається, що не правильно)
    $('#modalForgotPassword').on('mousedown', function (event) {
        if (event.target.id === 'modalForgotPassword') {
            $('#user-email-recover-pswd').val('');
            $('#error-message-recover').html('');
        }
    });
})

