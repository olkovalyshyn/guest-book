<?php
include('../../connect/connect.php');

$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPassword = $_POST['userPassword'];
$userIp = $_POST['userIp'];
$userBrowser = $_POST['userBrowser'];

class UserLogin extends ConnectionDB
{
    public function login($userName, $userEmail, $userPassword, $userIp, $userBrowser)
    {


        $response = [];
        $conn = $this->connect();

        if (isset($userName) && $userName !== '' && isset($userEmail) && $userEmail !== '' && isset($userPassword) && $userPassword !== '') {
            $sql = "SELECT * FROM `users` WHERE `email` = :email AND password = :password";
            $result = $conn->prepare($sql);
            $params = ['email' => $userEmail, 'password' => $userPassword];
            $result->execute($params);

            $loginedUser = $result->fetch(PDO::FETCH_ASSOC);

            if ($loginedUser['name'] === $userName && $loginedUser['email'] === $userEmail && $loginedUser['password'] === $userPassword) {
                $response = array('status' => true, 'error' => null, 'user' => array('name' => $loginedUser['name'], 'email' => $loginedUser['email'], 'password' => $loginedUser['password'], 'ip' => $loginedUser['ip'], 'browser' => $loginedUser['browser']));
            } else {
                http_response_code(404);
                $response = array('status' => false, 'error' => array('code' => 404, 'message' => "User not found..."));

            }

        } else {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Please, fill all fields..."));

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

$user = new UserLogin();
$user->login($userName, $userEmail, $userPassword, $userIp, $userBrowser);