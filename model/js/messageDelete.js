$(document).ready(function (){
    $('body').on('mousedown', function () {
        $('.btn-del-user').off('click').on('click', function (){

            let id = $(this).closest('tr').data('id');
            $('#modalConfirmDelete').modal('show');

            $('#modal-btn-yes').off("click").on("click", function () {

                    $.ajax({
                        url: '../model/php/messageDelete.php',
                        method: 'POST',
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            $('#modalConfirmDelete').modal('hide');
                            response = jQuery.parseJSON(response);
                            return response;
                        },
                        error: function (error) {
                            error = jQuery.parseJSON(error);
                            return error;
                        }
                    });

                    //видаляє рядок на фронті
                    $('tr[data-id="' + id + '"]').remove();
            });

            $('#modal-btn-no').off("click").on('click',function () {
                //закриває модалку
                $('#modalConfirmDelete').modal('hide');
            });
        })

        $('.close').on('click', function (){
            $('#modalConfirmDelete').modal('hide');
        })
    })
})