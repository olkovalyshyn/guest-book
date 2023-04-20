<?php

include('../../connect/connect.php');

//якщо не приходить GET, то по замовчуванню сортування по даті
$columnName = (isset($_GET['columnName'])) ? $_GET['columnName'] : 'date';

//якщо не приходить GET, то по замовчуванню напрям сортування desc
$sortDirection = (isset($_GET['sortDirection'])) ? $_GET['sortDirection'] : 'desc';

//для вибору записів зареєстрованого юзера
$userEmail = (isset($_SESSION['email'])) ? $_SESSION['email'] : '@';

class Pagination extends ConnectionDb
{
    public function getPage($columnName, $sortDirection, $userEmail)
    {
        $conn = $this->connect();
        $response = [];
        $count = '';

        // отримати кількість записів
        $sql = "SELECT COUNT(*) FROM `messages`";
        $countQuery = $conn->prepare($sql);
        $countQuery->execute();
        $count = $countQuery->fetchColumn();


// кількість записів на одній сторінці
        $limit = 25;

//  кількість сторінок
        $pages = ceil($count / $limit);

// поточна сторінка
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

// OFFSET
        $offset = ($page - 1) * $limit;

// отримання даних для поточної сторінки
        $sql = "SELECT * FROM `messages` WHERE `email` LIKE '%" . $userEmail . "%' ORDER BY " . $columnName . " " . $sortDirection . " LIMIT :limit OFFSET :offset ";
        $query = $conn->prepare($sql);
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);

        $html = '';
        foreach ($messages as $item) {
            $idMessage = $item['id'];
            if (!isset($_SESSION['email'])) {
                $html .= '<tr>
                    <td>' . $item['name'] . '</td>
                    <td>' . $item['email'] . '</td>
                    <td>' . $item['message'] . '</td>
                    <td>' . $item['date'] . '</td>
                </tr>';
            } else {
                $html .= '<tr data-id="' . $idMessage . '">
                    <td>' . $item['name'] . '</td>
                    <td>' . $item['email'] . '</td>
                    <td class="message">' . $item['message'] . '</td>
                    <td>' . $item['date'] . '</td>
                    <td><button type="button" id="btn-edit-user" class="btn-edit-user btn btn-sm btn-outline-secondary badge" data-bs-toggle="modal" data-bs-target="#user-form-modal">EDIT</button></td>
                    <td><button type="button" class="btn btn-sm btn-outline-secondary badge btn-del-user">DELETE</button></td>
                </tr>';
            }
        }
        $response = array('status' => true, 'error' => null, 'user' => array('pagesCount' => $pages, 'html' => $html));

        return json_encode($response);
    }
}

$message = new Pagination();
$dataAll = $message->getPage($columnName, $sortDirection, $userEmail);
echo($dataAll);


