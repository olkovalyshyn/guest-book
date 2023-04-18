<?php
include('../../connect/connect.php');

$userEmail = $_POST['userEmail'];

class RecoverPassword extends ConnectionDB
{
    public function recover($userEmail)
    {
        $conn = $this->connect();
        $response = [];

        if (isset($userEmail)) {
            $sql = "SELECT * FROM `users` WHERE `email` = :email";
            $result = $conn->prepare($sql);
            $params = ['email' => $userEmail];
            $result->execute($params);

            $registredUser = $result->fetch(PDO::FETCH_ASSOC);

            if ($registredUser) {
                $key = md5($registredUser['password'] . rand(1000, 9999));

                $sql = "UPDATE `users` SET `change_key` = :key WHERE `email` = :email";

                $result = $conn->prepare($sql);
                $params = ['key' => $key, 'email' => $userEmail];
                $result->execute($params);

                $url = 'http://guest-book/view/modal/modalNewPassword.php?key=' . $key;
                $message = $registredUser['name'] . ', there was a request to reset the password. Follow the link to change ' . $url;
                mail($registredUser['email'], 'Password change', $message);

                $response = array('status' => true, 'error' => null, 'user' => array('name' => $registredUser['name'], 'email' => $registredUser['email']));

            } else {
                http_response_code(400);
                $response = array('status' => false, 'error' => true, 'user' => array('email' => $userEmail, 'message' => 'Not found.This email is not registered!'));
//                echo "This email is not registered!";
            }

        }
        echo json_encode($response);
    }
}

$user = new RecoverPassword();
$user->recover($userEmail);