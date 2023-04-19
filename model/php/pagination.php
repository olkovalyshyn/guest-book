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
        $sql = "SELECT * FROM `messages` WHERE `email` LIKE '%".$userEmail."%' ORDER BY ". $columnName ." ". $sortDirection ." LIMIT :limit OFFSET :offset ";
        $query = $conn->prepare($sql);
//        $query->bindParam(':columnName', $columnName);
//        $query->bindParam(':sortDirection', $sortDirection);
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
//        $params = ['limit' => $limit, 'offset' => $offset];
        $query->execute();
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);



        $html = '';
        foreach ($messages as $item){
            $idMessage = $item['id'];
            if(!isset($_SESSION['email'])){
                $html .= '<tr>
                    <td>'. $item['name'] .'</td>
                    <td>'. $item['email'] .'</td>
                    <td>'. $item['message'] .'</td>
                    <td>'. $item['date'] .'</td>
                </tr>';
            } else {
                $html .= '<tr data-id="'.$idMessage.'">
                    <td>'. $item['name'] .'</td>
                    <td>'. $item['email'] .'</td>
                    <td class="message">'. $item['message'] .'</td>
                    <td>'. $item['date'] .'</td>
                    <td><button type="button" id="btn-edit-user" class="btn-edit-user btn btn-sm btn-outline-secondary badge" data-bs-toggle="modal" data-bs-target="#user-form-modal">EDIT</button></td>
                    <td><button type="button" class="btn btn-sm btn-outline-secondary badge btn-del-user">DELETE</button></td>
                </tr>';

            }

        }
        $response = array('status' => true, 'error' => null, 'user' => array('pagesCount' => $pages, 'html' => $html ));

        return json_encode($response);
//        echo json_encode(['pages' => $pages]);
//        return json_encode($html);
//        return json_encode($messages);

    }
    }

$message = new Pagination();
$dataAll = $message->getPage($columnName, $sortDirection, $userEmail);
echo($dataAll);


//include('../../connect/connect.php');
//
//class Pagination extends ConnectionDb
//{
//    public function getPage()
//    {
//        $limit = 5;
//        $page = 1;
//
//        if ($_POST['page'] > 1) {
//            $start = (($_POST['page'] - 1) * $limit);
//            $page = $_POST['page'];
//        } else {
//            $start = 0;
//        };
//
//        $sql = "SELECT * FROM `messages`";
//
////        $recordPerPage = 5;
////        $page = '';
////        $output = '';
////
////        if (isset($_POST['page'])) {
////            $page = $_POST['page'];
////        } else {
////            $page = 1;
////        };
////
////        $startFrom = ($page - 1) * $recordPerPage;
////
////        $response = [];
////        $conn = $this->connect();
////
////        $sql = "SELECT * FROM `messages` ORDER BY `date` DESC LIMIT $startFrom, $recordPerPage";
////        $result = $conn->prepare($sql);
////        $result->execute();
////        print_r($result) ;
//////        $messages = $result->fetchAll();
////
////        $output .= '
////            <table class="table">
////                <thead>
////                    <tr>
////                        <td>userName</td>
////                        <td>email</td>
////                        <td>message</td>
////                        <td>date</td>
////                </tr>
////                </thead>
////                <tbody id="items-row">;
////        ';
////
////        while ($row = $result->fetchAll()) {
////            $output .= '<tr>
////                    <td>' . $row["name"] . '</td>
////                    <td>' . $row["email"] . '</td>
////                    <td>' . $row["message"] . '</td>
////                    <td>' . $row["date"] . '</td>
////                </tr>';
////        };
////
////        $output .= '</tbody></table>';
//
////        $pageQuery = "SELECT * FROM `messages` ORDER BY `date` DESC";
////        $resultQuery = $conn->prepare($pageQuery);
////        $resultQuery->execute();
////        $totalRecords = count($resultQuery);
////        $totalPages = ceil($totalRecords / $recordPerPage);
////
////        for ($i = 1; $i = $totalPages; $i++) {
////            $output .= '<span id=' . "$i" . '>."$i".</span>';
////
////            echo $output;
////        }
//    }
//}
//
//$message = new Pagination();
//$dataAll = $message->getPage();
//echo $dataAll;


//ДО ЗМІН
//include('../../connect/connect.php');
//
//class Pagination extends ConnectionDb
//{
//    public function getPage()
//    {
//        $page = $_GET['page'];
//        $count = 25;
////        echo '!!!$count'.$count;
////echo '!!!$page'.$page;
//        $response = [];
//        $conn = $this->connect();
//
//
//        $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
//        $result = $conn->prepare($sql);
//        $result->execute();
//        $messages = $result->fetchAll();
//
//        $pageCount = ceil(count($messages) / $count);
//
//
//        if ($messages) {
//
//            foreach ($messages as $item) {
//                $userName = $item['name'];
//                $email = $item['email'];
//                $message = $item['message'];
//                $date = $item['date'];
//
//                $response[] = array('status' => true, 'error' => null, 'page' => $page, 'count' => $count, 'pageCount' => $pageCount, 'user' => array('userName' => $userName, 'email' => $email, 'message' => $message, 'date' => $date));
//            }
//        } else {
//            $response = array('status' => false, 'error' => array('code' => 400, 'message' => 'No data!'));
//        }
//
//        return json_encode($response);
//    }
//}
//
//$message = new Pagination();
//$dataAll = $message->getPage();
//echo $dataAll;


