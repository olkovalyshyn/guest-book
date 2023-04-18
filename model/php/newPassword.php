<?php
include('../../connect/connect.php');
$data = $_GET;
$key = $_GET['key'];
echo "!!!key!!! ".$key;

class NewPassword extends ConnectionDB
{
    public function changePassword($key)
    {
        if($_SESSION['name'] === null){header('Location: /');};
        if($key === null){header('Location: /');};

        $response = [];
        $conn = $this->connect();

        if(isset($data['submit-new-pswd'])){
            $sql = "SELECT * FROM `users` WHERE `change_key` = :key";
            $result = $conn->prepare($sql);
            $param = ['key' => $key];
            $result->execute($param);

            header('Location: /');
        }
    }
}

$user = new NewPassword();
$user->changePassword($key);