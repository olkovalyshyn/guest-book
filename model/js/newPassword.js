$(document).ready(function (){
    $('#newPassword').on('submit', function (){
        console.log("Click on change password");

        let key = $_GET['key']

        $.ajax({
            url: './model/php/newPassword.php',
            method: 'GET',
            dataType: 'json',
            data: {
                key,
            },
            success: function (response){
            },
            error: function (response) {
            },

        })
    })

})