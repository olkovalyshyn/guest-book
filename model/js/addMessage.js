$(document).ready(function () {

    function displayDataAdd(item) {
        let html = '';
        html += '<tr>\
                    <td>'+ item.user.userName +'</td>\
                    <td>'+ item.user.email +'</td>\
                    <td>'+ item.user.message +'</td>\
                    <td>'+ item.user.date +'</td>\
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

        console.log("!!!userName", userName);
        console.log("!!!userEmail", userEmail);
        console.log("!!!homepage", homepage);
        console.log("!!!captcha", captcha);
        console.log("!!!message", message);
        console.log("!!!language", language);

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

                $('#addMessageModal').modal('hide');

                console.log("!!!res from SUCCESS", response);

                $('#items-row').prepend(displayDataAdd(response));

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

