$(document).ready(function (){
    $('body').on('mousedown', function () {
        $('.btn-del-user').off('click').on('click', function (){
            console.log("CLICK on delete button");

            let id = $(this).closest('tr').data('id');
            console.log("id", id);
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

                            let res = jQuery.parseJSON(response);
                            return res;

                        },
                        error: function (xhr, status, error) {
                            let res = jQuery.parseJSON(error);
                            return res;
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