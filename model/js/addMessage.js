$(document).ready(function () {

    function displayDataAdd(item, id) {
        let html = '';
        html += '<tr data-id="'+ id +'">\
                    <td>'+ item.user.userName +'</td>\
                    <td>'+ item.user.email +'</td>\
                    <td class="message" >'+ item.user.message +'</td>\
                    <td>'+ item.user.date +'</td>\
                    <td><button type="button" id="btn-edit-user" class="btn-edit-user btn btn-sm btn-outline-secondary badge" data-bs-toggle="modal" data-bs-target="#user-form-modal">EDIT</button></td>\
                    <td><button type="button" class="btn btn-sm btn-outline-secondary badge btn-del-user">DELETE</button></td>\
                </tr>';
        return html;
    }


    $('#btn-send-msg').on('click', function () {

        let userName = $('#user-name-add-form').val();
        let userEmail = $('#user-email-add-form').val();
        let homepage = $('#user-homepage-add-form').val();
        let captcha = $('#user-captcha').val();
        let message = $('#message-text').val();
        let language = $('#language').val();

        $.ajax({
            url: './model/php/addMessage.php',
            method: 'POST',
            dataType: 'json',
            data: {
                userName,
                userEmail,
                homepage,
                captcha,
                message,
                language,
            },
            success: function (response) {
                let id = response.user.id;
                $('#addMessageModal').modal('hide');

                $('#items-row').prepend(displayDataAdd(response, id));

                //очищення модального вікна
                $('#user-name-add-form').val('');
                $('#user-email-add-form').val('');
                $('#user-homepage-add-form').val('');
                $('#user-captcha').val('');
                $('#message-text').val('');
                $('#language').val('ukrainian');
                $('#err-msg-general').html('');

            },
            error: function (response) {
                $errMsg = response.responseJSON.error.message;
                $('#err-msg-general').html($errMsg);
            },
        })
    })
})

