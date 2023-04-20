$(document).ready(function () {
    // Відслідковування кліків на стовпцях
    $('th.sort').click(function () {
        // Отримання назви стовпця та напрямку сортування
        let columnName = $(this).data('column-name');
        let sortDirection = $(this).data('sort-direction');
        // console.log("Click on ", columnName);
        console.log("Click on sortDirection", sortDirection);

        // Зміна напрямку сортування
        if (sortDirection == 'asc') {
            $(this).data('sort-direction', 'desc');
        } else {
            $(this).data('sort-direction', 'asc');
        }

        $.ajax({
            url: './model/php/pagination.php',
            type: 'GET',
            data: {
                columnName: columnName,
                sortDirection: $(this).data('sort-direction')
            },
            success: function (response) {
                response = JSON.parse(response);
                // Оновлення таблиці з новими даними
                $('#items-row').html(response.user.html);
            }
        });
    });
});