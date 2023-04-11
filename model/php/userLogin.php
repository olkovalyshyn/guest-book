<?php
include('../../connect/connect.php');

$userEmail = $_POST['userEmail'];
$userPassword = $_POST['userPassword'];
$userIp = $_POST['userIp'];
$userBrowser = $_POST['userBrowser'];

class UserLogin extends ConnectionDB
{
    public function login($userEmail, $userPassword, $userIp, $userBrowser)
    {
        $response = [];
        $conn = $this->connect();

        if (!empty($userEmail) && !empty($userPassword)){
            $sql = "SELECT * FROM `users` WHERE `email` = :email AND password = :password";
        $result = $conn->prepare($sql);
        $params = ['email' => $userEmail, 'password' => $userPassword];
        $result->execute($params);

        $loginedUser = $result->fetch(PDO::FETCH_ASSOC);
            $response = $loginedUser;
        }
//        if (!empty($userName) && !empty($userEmail) && !empty($userPassword)) {
//            //перевіка наявності в БД такого ж email.
//            $sqlCheck = "SELECT COUNT(*) FROM `users` WHERE `email` = :email";
//            $resultCheck = $conn->prepare($sqlCheck);
//            $paramCheck = ['email' => $userEmail];
//            $resultCheck->execute($paramCheck);
//
//            $countCheck = $resultCheck->fetchColumn();
//
//            if ($countCheck > 0) {
//                http_response_code(409);
//                $response = array('status' => false, 'error' => array('code' => 409, 'message' => "Сan't register. User with this email already exists..."));
//            } else {
//                $sql = "INSERT INTO `users` (`name`,`email`,`password`,`ip`,`browser`) VALUES(:name, :email, :password, :ip, :browser)";
//                $result = $conn->prepare($sql);
//                $params = ['name' => $userName, 'email' => $userEmail, 'password' => $userPassword, 'ip' => $userIp, 'browser' => $userBrowser];
//                $result->execute($params);
//
//                $response = array('status' => true, 'error' => null, 'user' => array('name' => $userName, 'email' => $userEmail, 'password' => $userPassword, 'ip' => $userIp, 'browser' => $userBrowser));
//            }
//
//
//        } else {
//            http_response_code(400);
//            $response = array('status' => false, 'error' => array('code' => 100, 'message' => "Please, fill all fields..."));
//        }
        echo json_encode($response);
    }
}

$user = new UserRegister();
$user->register($userEmail, $userPassword, $userIp, $userBrowser);