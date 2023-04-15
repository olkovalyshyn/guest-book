<?php



include('../../connect/connect.php');
class getAll extends ConnectionDb
{
    public function get()
    {

        return file_get_contents('http://guest-book/fixtures.json');
//        $response = [];
//        $conn = $this->connect();
//
//        $conn->beginTransaction();
//
//        $sql = "SELECT * FROM `messages` ORDER BY `date` DESC";
//        $result = $conn->prepare($sql);
//
//        if ($result->execute()) {
//            $messages = $result->fetchAll();
//            foreach ($messages as $item) {
//                $userName = $item['name'];
//                $email = $item['email'];
//                $message = $item['message'];
//                $date = $item['date'];
//
//                $response[] = array('status' => true, 'error' => null, 'user' => array('userName' => $userName, 'email' => $email, 'message' => $message, 'date' => $date));
//            }
//        } else {
//            $response = array('status' => false, 'error' => array('code' => 400, 'message' => 'No data!'));
//        }
//        $conn->commit();
//
//        return json_encode($response);
    }
}

$message = new getAll();
$dataAll = $message->get();
echo json_encode($dataAll);