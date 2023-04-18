$(document).ready(function () {
    // відображення даних на сторінці
    function showData(page) {
        $.ajax({
            url: './model/php/pagination.php',
            type: 'GET',
            data: {page: page},
            dataType: 'html',
            success: function (response) {
                response = JSON.parse(response);
                console.log("resp in pagination", response);
                $('#items-row').html(response.user.html);
            }
        });
    }

    // відображення посилань пагінації
    function showPagination(pages, page) {
        let pagination = $('.pagination');
        pagination.empty();
        for (let i = 1; i <= pages; i++) {
            let link = $('<a></a>');
            link.attr('href', '#');
            link.text(i);
            if (i == page) {
                link.addClass('active');
            }
            link.click(function () {
                let page = $(this).text();
                showData(page);
                showPagination(pages, page);
            });
            pagination.append(link);
        }
    }
    showData(1);
    // showPagination(5, 1); //в перому параметрі має бути типу <?php echo $pages; ?>

    $.ajax({
        url: './model/php/pagination.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // response = JSON.parse(response);
            console.log("К-ть сторінок", response.user.pagesCount)
            showPagination(response.user.pagesCount, 1);
        }
    });
})



// DataTable
// $(document).ready(function () {
//     $('#table').DataTable({
//         'serverSide': true,
//         'processing': true,
//         'paging': true,
//         'order': [],
//         'type': 'post',
//         'ajax': {
//             'url': './model/php/getAll.php',
//         },
//         'fnCreateRow': function(nRow, aData, iDataIndex){
//             $(nRow).attr('id', aData[0]);
//         },
//         'columnsDefs': [{
//             'target': [0,5],
//             'orderable': false,
//         }]
//     });
// });


// $(document).ready( function () {
//     let table = $('#table').DataTable();
//     $.ajax({
//         url: "./model/php/getAll.php",
//         type: "POST",
//         dataType: "json",
//         success: function (response) {
//             response = JSON.parse(response);
// if($('#items-row').html(displayData(response))){
//     $('#table').DataTable();
// }
//             // $('#items-row').html(displayData(response));
//             // $('#table').DataTable()
//
//             table.draw(); // перерендерюємо таблицю
//         },
//         error: function (error) {
//             console.log(error);
//         }
//     });
// } );


// $(document).ready(function () {
//     loadData(1);
// function loadData(page, query = ''){
//     $.ajax({
//             url: './model/php/pagination.php',
//             method: 'POST',
//             dataType: 'json',
//             data: {
//                 page: page,
//                 query:query,
//             },
//             success: function (response) {
//                 // console.log("!!!pageCount paginat", response[0].pageCount);
//                 // console.log("!!!RES paginat", response);
//
//                 $('.pagination-page').html(response);
//                 // $('#items-row').html(displayData(response));
//
//             },
//             error: function (response) {
//             },
//
//
//         })
// }
// });


// $(document).ready(function () {
//
//     $('.page').on('click', function (e) {
//         e.preventDefault();
//         console.log("CLICK on PAGINATION");
//         // console.log("!!!GET['page']", $_GET['page']);
//         // let page = $(this).text();
//         let page = $(this).data('page');
//         console.log("!!!page", page);
//
//
//         $.ajax({
//             url: './model/php/pagination.php',
//             method: 'get',
//             dataType: 'json',
//             data: {
//                 page,
//             },
//             success: function (response) {
//                 console.log("!!!pageCount paginat", response[0].pageCount);
//                 console.log("!!!RES paginat", response);
//
//                 $('.pagination-page').html(pageCount(response));
//                 $('#items-row').html(displayData(response));
//
//             },
//             error: function (response) {
//             },
//
//
//         })
//         function displayData(dataAll) {
//             console.log('dataAll',dataAll);
//             let html = '';
//             dataAll.forEach(item => {
//
//                 html += '<tr>\
//                     <td>'+ item.user.userName +'</td>\
//                     <td>'+ item.user.email +'</td>\
//                     <td>'+ item.user.message +'</td>\
//                     <td>'+ item.user.date +'</td>\
//                 </tr>';
//             });
//             return html;
//         }
//
//     })
//
//     function pageCount(response) {
//         let html = '';
//         for (let i = 1; i <= response[0].pageCount; i++) {
//             html +=
//                 `<a href="?page=${i}"><button type="button" class="page">
//                   ${i}
//                 </button></a>`;
//         }
//         return html;
//     }
//
// });
//
//
//
//
// //для перщого завантаження пагінації
// function paginationFirstDnld(){
//     $.ajax({
//         url: './model/php/pagination.php',
//         method: 'get',
//         dataType: 'json',
//         data: {
//             // userName,
//             // userEmail,
//             // userPassword,
//             // userIp,
//             // userBrowser,
//         },
//         success: function (response) {
//             console.log("!!!pageCount", response[0].pageCount);
//             console.log("!!!RES", response);
//
//             // $('.pagination-page').html(pageCount(response));
//
//         },
//         error: function (response) {
//         },
//     })
// }
// function pageCount(response) {
//     let html = '';
//     for (let i = 1; i <= response[0].pageCount; i++) {
//         html +=
//             `<a href="?page=${i}"><button type="button" class="page" data-page="${i}" >${i}</button></a>`;
//     }
//     return html;
// }
//
//
// // paginationFirstDnld();