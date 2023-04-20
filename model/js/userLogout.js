$(document).ready(function () {
    $('#btn-logout').on('click', function () {
        $.ajax({
            url: './model/php/userLogout.php',
            type: 'POST',
            data: {logout: true},
            success: function (){
                location.reload();
            }
        })
    })
});
