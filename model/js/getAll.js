

function getAll(){
    $.ajax({
        url: "./model/php/getAll.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
            // response = jQuery.parseJSON(response);
            response = JSON.parse(response);

            // console.log('!!!!!response from fixtures', response);
            $('#items-row').html(displayData(response));
        },
        error: function (error) {
            // return res;
        }

    });
}
//при запуску скрипта разово (при перезавантаженні сторінки) заносить дані на фронт із бека
getAll();

//заносить дані, що отримані із бека у форму
function displayData(dataAll) {
    // console.log('dataAll',dataAll);
    let html = '';
    dataAll.forEach(item => {

        html += '<tr>\
                    <td>'+ item.userName +'</td>\
                    <td>'+ item.email +'</td>\
                    <td>'+ item.message +'</td>\
                    <td>'+ item.date +'</td>\
                </tr>';
    });
    return html;
}