
$(document).ready(function (){
        $.ajax({
            url: "./model/php/getAll.php",
            type: "POST",
            dataType: "json",
            success: function (response) {
                // response = jQuery.parseJSON(response);
                response = JSON.parse(response);
                // console.log('!!!!!response from fixtures', response);
                console.log('!!!!!response in GetAll', response);
                // console.log('!!!!!response[0].pageCount', response[0].pageCount);
                // console.log('!!!!!response.pageCount', response.pageCount);

                // $('.pagination-page').html(pageCount(response));
                // $('#table').DataTable();

                $('#items-row').html(displayData(response));

            },
            error: function (error) {
                // return res;
            }

        });

})


//заносить дані, що отримані із бека у форму
function displayData(dataAll) {
    // console.log('dataAll',dataAll);
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

// function pageCount(response) {
//     let html = '';
//     for (let i = 1; i <= response[0].pageCount; i++) {
//         html +=
//             `<button type="button" class="page" data-page="${i}" >${i}</button>`;
//     }
//     return html;
// }




// ДО змін getAll на ready
// function getAll(){
//     $.ajax({
//         url: "./model/php/getAll.php",
//         type: "GET",
//         dataType: "json",
//         success: function (response) {
//             // response = jQuery.parseJSON(response);
//             response = JSON.parse(response);
//             // console.log('!!!!!response from fixtures', response);
//
//             console.log('!!!!!response[0].pageCount', response[0].pageCount);
//             console.log('!!!!!response.pageCount', response.pageCount);
//
//             $('.pagination-page').html(pageCount(response));
//             $('#items-row').html(displayData(response));
//         },
//         error: function (error) {
//             // return res;
//         }
//
//     });
// }
// //при запуску скрипта разово (при перезавантаженні сторінки) заносить дані на фронт із бека
// getAll();
//
// console.log('кукі',document.cookie.split(";"));
// console.log('кукі indexOf',document.cookie.indexOf("once"));
// //заносить дані, що отримані із бека у форму
// function displayData(dataAll) {
//     // console.log('dataAll',dataAll);
//     let html = '';
//     dataAll.forEach(item => {
//
//         html += '<tr>\
//                     <td>'+ item.user.userName +'</td>\
//                     <td>'+ item.user.email +'</td>\
//                     <td>'+ item.user.message +'</td>\
//                     <td>'+ item.user.date +'</td>\
//                 </tr>';
//     });
//     return html;
// }
//
// function pageCount(response) {
//     let html = '';
//     for (let i = 1; i <= response[0].pageCount; i++) {
//         html +=
//             `<a href="?page=${i}">
//                   ${i}
//                 </a>`;
//     }
//     return html;
// }

