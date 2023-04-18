<?php
include('../../connect/connect.php');

class getAll extends ConnectionDb
{
    public function get($homepage, $language)
    {
        $response = [];
        $conn = $this->connect();
//        print_r($_COOKIE["once"]);

//перевірка для разового завантаження даних із fixtures
        if (!$_COOKIE["once"]) {
            // Встановлення cookie з датою для разового завантаження даних із fixtures
            setcookie("once", date("Y-m-d H:i:s"), time() + 3600 * 24); // cookie зберігається 1 день

            $dataStart = file_get_contents('http://guest-book/fixtures.json');
            $dataStart = json_decode($dataStart);


            foreach ($dataStart as $item) {
                $sql = "INSERT INTO `messages` (`name`,`email`,`homepage`,`message`,`language`, `date`) VALUES(:name, :email, :homepage, :message, :language, :date)";
                $result = $conn->prepare($sql);
                $params = ['name' => $item->userName, 'email' => $item->email, 'homepage' => $homepage, 'message' => $item->message, 'language' => $language, 'date' => $item->date];
                $result->execute($params);

                $response[] = array('status' => true, 'error' => null, 'user' => array('name' => $item->userName, 'email' => $item->email, 'message' => $item->message, 'date' => $item->date));
            }
        } else {
            $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
            $result = $conn->prepare($sql);

            if ($result->execute()) {
                $messages = $result->fetchAll();
                foreach ($messages as $item) {
                    $userName = $item['name'];
                    $email = $item['email'];
                    $message = $item['message'];
                    $date = $item['date'];

                    $response[] = array('status' => true, 'error' => null, 'user' => array('userName' => $userName, 'email' => $email, 'message' => $message, 'date' => $date));
                }
            } else {
                $response = array('status' => false, 'error' => array('code' => 400, 'message' => 'No data!'));
            }
        }
        return json_encode($response);
    }
}

$message = new getAll();
$dataAll = $message->get($homepage = null, $language = null);
echo json_encode($dataAll);





//
//include('../../connect/connect.php');
//
//class getAll extends ConnectionDb
//{
//    public function get($homepage, $language)
//    {
////        $page = $_GET['page']; //для пагінації
//        $count = 25; //для пагінації
//
//        $rowAllCount = '';
//        $output = array();
//        $response = [];
//        $conn = $this->connect();
////        print_r($_COOKIE["once"]);
//
//
////перевірка для разового завантаження даних із fixtures
//        if (!$_COOKIE["once"]) {
//            // Встановлення cookie з датою для разового завантаження даних із fixtures
////            setcookie("once", date("Y-m-d H:i:s"), time() + 3600 * 24); // cookie зберігається 1 день
//
//            $dataStart = file_get_contents('http://guest-book/fixtures.json');
//            $dataStart = json_decode($dataStart);
//
////            echo "!!!dataStart count!!!".count($dataStart);
////            $pageCount = ceil(count($dataStart) / $count); //для пагінації
//
//            foreach ($dataStart as $item) {
//                $sql = "INSERT INTO `messages` (`name`,`email`,`homepage`,`message`,`language`, `date`) VALUES(:name, :email, :homepage, :message, :language, :date)";
//                $result = $conn->prepare($sql);
//                $params = ['name' => $item->userName, 'email' => $item->email, 'homepage' => $homepage, 'message' => $item->message, 'language' => $language, 'date' => $item->date];
//                $result->execute($params);
//
//                $rowAllCount = $result->rowCount();
//
//                $response[] = array('status' => true, 'error' => null, 'user' => array('name' => $item->userName, 'email' => $item->email, 'message' => $item->message, 'date' => $item->date));
//            }
//        } else {
////            $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
//            $sql = "SELECT * FROM `messages` ";
//
//            $result = $conn->prepare($sql);
//
//            $rowAllCount = $result->rowCount();
//
//            if (isset($_POST['search']['value'])) {
//                $searchValue = $_POST['search']['value'];
//                $sql .= " WHERE `name` LIKE '%" . $searchValue . "%' ";
//                $sql .= " OR `email` LIKE '%" . $searchValue . "%' ";
//                $sql .= " WHERE `message` LIKE '%" . $searchValue . "%' ";
//                $sql .= " WHERE `date` LIKE '%" . $searchValue . "%' ";
//            }
//
//            if (isset($_POST['order'])) {
//                $column = $_POST['order'][0]['column'];
//                $order = $_POST['order'][0]['dir'];
//                $sql .= "ORDER BY '" . $column . "' " . $order;
//            } else {
//                $sql .= "ORDER BY `date` DESC";
//            }
//
//            if ($_POST['length'] != -1) {
//                $start = $_POST['start'];
//                $length = $_POST['length'];
//                $sql .= " LIMIT " . $start . ", " . $length;
//            }
//
//            $data = array();
//
//            $runQuery = $conn->prepare($sql);
//            $runQuery->execute(); //ЦЕ ДОСТАВИВ
//            $filteredRows = $runQuery->rowCount();
//
//            while ($row = $runQuery->fetchAll()) {
//                $subarray = array();
//                $subarray[] = $row['name'];
//                $subarray[] = $row['email'];
//                $subarray[] = $row['message'];
//                $subarray[] = $row['date'];
//                $subarray[] = '<a href="#" class="btn btn-sm btn-info">Edit</a> <a href="#" class="btn btn-sm btn-danger">Delete</a>';
//
//                $data = $subarray;
//            }
//
//            $output = array(
//                'data' => $data,
//                'draw' => intval($_POST['draw']),
//                'recordsTotal' => $rowAllCount,
//                'recordsFiltered' => $filteredRows,
//            );
//        }
//
//        return json_encode($output);
//
////        return json_encode($response);
//    }
//}
//
//$message = new getAll();
//$dataAll = $message->get($homepage = null, $language = null);
//echo json_encode($dataAll);


//ДО ДОДАВАННЯ ПАГІНАЦІЇ
//include('../../connect/connect.php');
//
//class getAll extends ConnectionDb
//{
//    public function get($homepage, $language)
//    {
//        $response = [];
//        $conn = $this->connect();
////        print_r($_COOKIE["once"]);
//
////перевірка для разового завантаження даних із fixtures
//        if (!$_COOKIE["once"]) {
//            // Встановлення cookie з датою для разового завантаження даних із fixtures
//            setcookie("once", date("Y-m-d H:i:s"), time() + 3600 * 24); // cookie зберігається 1 день
//
//            $dataStart = file_get_contents('http://guest-book/fixtures.json');
//            $dataStart = json_decode($dataStart);
//
//
//            foreach ($dataStart as $item) {
//                $sql = "INSERT INTO `messages` (`name`,`email`,`homepage`,`message`,`language`, `date`) VALUES(:name, :email, :homepage, :message, :language, :date)";
//                $result = $conn->prepare($sql);
//                $params = ['name' => $item->userName, 'email' => $item->email, 'homepage' => $homepage, 'message' => $item->message, 'language' => $language, 'date' => $item->date];
//                $result->execute($params);
//
//                $response[] = array('status' => true, 'error' => null, 'user' => array('name' => $item->userName, 'email' => $item->email, 'message' => $item->message, 'date' => $item->date));
//            }
//        } else {
//            $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
//            $result = $conn->prepare($sql);
//
//            if ($result->execute()) {
//                $messages = $result->fetchAll();
//                foreach ($messages as $item) {
//                    $userName = $item['name'];
//                    $email = $item['email'];
//                    $message = $item['message'];
//                    $date = $item['date'];
//
//                    $response[] = array('status' => true, 'error' => null, 'user' => array('userName' => $userName, 'email' => $email, 'message' => $message, 'date' => $date));
//                }
//            } else {
//                $response = array('status' => false, 'error' => array('code' => 400, 'message' => 'No data!'));
//            }
//        }
//        return json_encode($response);
//    }
//}
//
//$message = new getAll();
//$dataAll = $message->get($homepage = null, $language = null);
//echo json_encode($dataAll);


//ДО ДОДАВАННЯ Фкстирес
//include('../../connect/connect.php');
//
//class getAll extends ConnectionDb
//{
//    public function get()
//    {
//
//        return file_get_contents('http://guest-book/fixtures.json');
////        $response = [];
////        $conn = $this->connect();
////
////        $conn->beginTransaction();
////
////        $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
////        $result = $conn->prepare($sql);
////
////        if ($result->execute()) {
////            $messages = $result->fetchAll();
////            foreach ($messages as $item) {
////                $userName = $item['name'];
////                $email = $item['email'];
////                $message = $item['message'];
////                $date = $item['date'];
////
////                $response[] = array('status' => true, 'error' => null, 'user' => array('userName' => $userName, 'email' => $email, 'message' => $message, 'date' => $date));
////            }
////        } else {
////            $response = array('status' => false, 'error' => array('code' => 400, 'message' => 'No data!'));
////        }
////        $conn->commit();
////
////        return json_encode($response);
//    }
//}
//
//$message = new getAll();
//$dataAll = $message->get();
//echo json_encode($dataAll);


//ПІСЛЯ ДОДАВАННЯ DataTable - НЕ ПРАЦЮЄ
//include('../../connect/connect.php');
//
//class getAll extends ConnectionDb
//{
//    public function get($homepage, $language)
//    {
////        $page = $_GET['page']; //для пагінації
//        $count = 25; //для пагінації
//
//        $rowAllCount = '';
//        $output = array();
//        $response = [];
//        $conn = $this->connect();
////        print_r($_COOKIE["once"]);
//
//
////перевірка для разового завантаження даних із fixtures
//        if (!$_COOKIE["once"]) {
//            // Встановлення cookie з датою для разового завантаження даних із fixtures
////            setcookie("once", date("Y-m-d H:i:s"), time() + 3600 * 24); // cookie зберігається 1 день
//
//            $dataStart = file_get_contents('http://guest-book/fixtures.json');
//            $dataStart = json_decode($dataStart);
//
////            echo "!!!dataStart count!!!".count($dataStart);
////            $pageCount = ceil(count($dataStart) / $count); //для пагінації
//
//            foreach ($dataStart as $item) {
//                $sql = "INSERT INTO `messages` (`name`,`email`,`homepage`,`message`,`language`, `date`) VALUES(:name, :email, :homepage, :message, :language, :date)";
//                $result = $conn->prepare($sql);
//                $params = ['name' => $item->userName, 'email' => $item->email, 'homepage' => $homepage, 'message' => $item->message, 'language' => $language, 'date' => $item->date];
//                $result->execute($params);
//
//                $rowAllCount = $result->rowCount();
//
//                $response[] = array('status' => true, 'error' => null, 'user' => array('name' => $item->userName, 'email' => $item->email, 'message' => $item->message, 'date' => $item->date));
//            }
//        } else {
////            $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
//            $sql = "SELECT * FROM `messages` ";
//
//            $result = $conn->prepare($sql);
//
//            $rowAllCount = $result->rowCount();
//
//            if (isset($_POST['search']['value'])) {
//                $searchValue = $_POST['search']['value'];
//                $sql .= " WHERE `name` LIKE '%" . $searchValue . "%' ";
//                $sql .= " OR `email` LIKE '%" . $searchValue . "%' ";
//                $sql .= " WHERE `message` LIKE '%" . $searchValue . "%' ";
//                $sql .= " WHERE `date` LIKE '%" . $searchValue . "%' ";
//            }
//
//            if (isset($_POST['order'])) {
//                $column = $_POST['order'][0]['column'];
//                $order = $_POST['order'][0]['dir'];
//                $sql .= "ORDER BY '" . $column . "' " . $order;
//            } else {
//                $sql .= "ORDER BY `date` DESC";
//            }
//
//            if ($_POST['length'] != -1) {
//                $start = $_POST['start'];
//                $length = $_POST['length'];
//                $sql .= " LIMIT " . $start . ", " . $length;
//            }
//
//            $data = array();
//
//            $runQuery = $conn->prepare($sql);
//            $runQuery->execute(); //ЦЕ ДОСТАВИВ
//            $filteredRows = $runQuery->rowCount();
//
//            while ($row = $runQuery->fetchAll()) {
//                $subarray = array();
//                $subarray[] = $row['name'];
//                $subarray[] = $row['email'];
//                $subarray[] = $row['message'];
//                $subarray[] = $row['date'];
//                $subarray[] = '<a href="#" class="btn btn-sm btn-info">Edit</a> <a href="#" class="btn btn-sm btn-danger">Delete</a>';
//
//                $data = $subarray;
//            }
//
//            $output = array(
//                'data' => $data,
//                'draw' => intval($_POST['draw']),
//                'recordsTotal' => $rowAllCount,
//                'recordsFiltered' => $filteredRows,
//            );
//        }
//
//        return json_encode($output);
//
////        return json_encode($response);
//    }
//}
//
//$message = new getAll();
//$dataAll = $message->get($homepage = null, $language = null);
//echo json_encode($dataAll);


//ДЕЛ
//include('../../connect/connect.php');
//
//class getAll extends ConnectionDb
//{
//    public function get()
//    {
//
//        $rowAllCount = '';
//        $output = array();
//        $response = [];
//        $conn = $this->connect();
//
//
//        $sql = "SELECT * FROM `messages` ";
//
//        $result = $conn->prepare($sql);
//
//        $rowAllCount = $result->rowCount();
//
//        if (isset($_POST['search']['value'])) {
//            $searchValue = $_POST['search']['value'];
//            $sql .= " WHERE `name` LIKE '%" . $searchValue . "%' ";
//            $sql .= " OR `email` LIKE '%" . $searchValue . "%' ";
//            $sql .= " WHERE `message` LIKE '%" . $searchValue . "%' ";
//            $sql .= " WHERE `date` LIKE '%" . $searchValue . "%' ";
//        }
//
//        if (isset($_POST['order'])) {
//            $column = $_POST['order'][0]['column'];
//            $order = $_POST['order'][0]['dir'];
//            $sql .= "ORDER BY '" . $column . "' " . $order;
//        } else {
//            $sql .= "ORDER BY `date` DESC";
//        }
//
//        if ($_POST['length'] != -1) {
//            $start = $_POST['start'];
//            $length = $_POST['length'];
//            $sql .= " LIMIT " . $start . ", " . $length;
//        }
//
//        $data = array();
//
//        $runQuery = $conn->prepare($sql);
//        $runQuery->execute(); //ЦЕ ДОСТАВИВ
//        $filteredRows = $runQuery->rowCount();
//        print_r ($runQuery);
//        while ($row = $runQuery->fetchAll()) {
//            $subarray = array();
//            $subarray[] = $row['name'];
//            $subarray[] = $row['email'];
//            $subarray[] = $row['message'];
//            $subarray[] = $row['date'];
//            $subarray[] = '<a href="#" class="btn btn-sm btn-info">Edit</a> <a href="#" class="btn btn-sm btn-danger">Delete</a>';
//
//            $data = $subarray;
//        }
//
//        $output = array(
//            'data' => $data,
//            'draw' => intval($_POST['draw']),
//            'recordsTotal' => $rowAllCount,
//            'recordsFiltered' => $filteredRows,);
//
//        echo json_encode($output);
//
//    }
//
//}
////$user = new getAll();
////$user->get();