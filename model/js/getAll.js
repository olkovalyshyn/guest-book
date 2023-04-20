
$(document).ready(function (){
        $.ajax({
            url: "./model/php/getAll.php",
            type: "POST",
            dataType: "json",
            success: function (response) {
                response = JSON.parse(response);
                $('#items-row').html(displayData(response));
            },
            error: function (error) {
                error = JSON.parse(error);
                return error;
            }
        });
})

//заносить дані, що отримані із бека у форму
function displayData(dataAll) {
    let html = '';

    dataAll.forEach(item => {

        html += '<tr>\
                    <td>'+ item.user.name +'</td>\
                    <td>'+ item.user.email +'</td>\
                    <td>'+ item.user.message +'</td>\
                    <td>'+ item.user.date +'</td>\
                </tr>';
    });
    return html;
}


