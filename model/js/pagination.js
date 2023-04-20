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

    $.ajax({
        url: './model/php/pagination.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            showPagination(response.user.pagesCount, 1);
        }
    });
})