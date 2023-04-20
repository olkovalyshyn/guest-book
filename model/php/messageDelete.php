<?php
include('../../connect/connect.php');

$idDell = $_POST['id'];

class UserDelete extends ConnectionDb
{
    public function delete($id)
    {
        $conn = $this->connect();

        $sql = "DELETE FROM `messages` WHERE `id` = ?";
        $result = $conn->prepare($sql);

        if ($result->execute([$id])) {
            $response = array('status' => true, 'error' => null, 'id' => $id);

        } else {
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Not delete"));
        }
        echo json_encode($response);
    }
}

$message = new UserDelete();
$message->delete($idDell);