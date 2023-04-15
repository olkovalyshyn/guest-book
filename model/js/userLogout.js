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

        // document.cookie = "userName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

        //зміна класів і віповідно видимість конпок
        // $('#btn-logout').addClass('btn-visibility');
        // $('#btn-login').removeClass('btn-visibility');
        // $('#btn-signup').removeClass('btn-visibility');

    })
});
