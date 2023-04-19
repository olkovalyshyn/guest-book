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
        console.log("Clicked on btn-send-msg");

        let userName = $('#user-name-add-form').val();
        let userEmail = $('#user-email-add-form').val();
        let homepage = $('#user-homepage-add-form').val();
        let captcha = $('#user-captcha').val();
        let message = $('#message-text').val();
        let language = $('#language').val();

        // console.log("!!!userName", userName);
        // console.log("!!!userEmail", userEmail);
        // console.log("!!!homepage", homepage);
        // console.log("!!!captcha", captcha);
        // console.log("!!!message", message);
        // console.log("!!!language", language);

        // console.log("!!!$_SESSION[captcha]", $_SESSION["captcha"]);

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

                console.log("!!!res from SUCCESS", response);
                let id = response.user.id;
                $('#addMessageModal').modal('hide');
                // console.log("!!!res from id", id);

                $('#items-row').prepend(displayDataAdd(response, id));

                // let row = $('#row-' + response.user.id);
                // console.log("!!!res from row", row);
                // if (row.length) {
                //     row.attr('data-id', response.user.id);
                // } else {
                //     $('#items-row').prepend(displayDataAdd(response));
                // }

                //очищення модального вікна
                $('#user-name-add-form').val('');
                $('#user-email-add-form').val('');
                $('#user-homepage-add-form').val('');
                $('#user-captcha').val('');
                $('#message-text').val('');
                $('#language').val('ukrainian');
                $('#err-msg-general').html('');

                // $('#user-name').val('');
                // $('#user-email').val('');
                // $('#user-password').val('');
                // $('#error-message').html('');
            },
            error: function (response) {
                console.log("!!!res from error", response);
                $errMsg = response.responseJSON.error.message;
                $('#err-msg-general').html($errMsg);
                // console.log("!!!res from error", response.responseJSON.general.error.message);
            },
        })
    })


})

