$(document).ready(function () {
    $('body').on('mousedown', function () {
        $('.btn-edit-user').off('click').on('click', function () {

            let message = $(this).closest('tr').find('.message').text();
            let id = $(this).closest('tr').data('id');

            //занесення даних рядка в модальне вікно для редагування
            $('#message-text-edit').val(message);

            $('#modal-btn-save').off('click').on('click', function () {
                let messageChanged = $('#message-text-edit').val();

                $.ajax({
                    url: '../model/php/messageEdit.php',
                    method: 'POST',
                    data: {
                        id,
                        messageChanged,
                    },
                    success: function (response) {
                        response = jQuery.parseJSON(response);
                        $('tr[data-id="' + id + '"]').find('.message').text(response.user.message);
                        $('#user-form-modal').modal('hide');
                        return response;
                    },
                    error: function (error) {
                        let res = jQuery.parseJSON(error);
                        return res;
                    }
                });
            })
        })
    })

    $('#modal-x-close, #modal-btn-close').on('click', function (){
        $('#user-form-modal').modal('hide');
    })
})

