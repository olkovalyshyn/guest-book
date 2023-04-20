<?php
include("../../connect/connect.php");

$id = $_POST['id'];
$message = $_POST['messageChanged'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// фільтрування даних
$message = test_input($_POST["messageChanged"]);

//валідація на дозволені HTML-теги
$allowedTags = array('a', 'code', 'i', 'strike', 'strong');
$message = strip_tags($message, '<' . implode('><', $allowedTags) . '>');

//перевірка на закриття тегів
function checkTagsClose($html)
{
    $open = substr_count($html, '<');
    $close = substr_count($html, '>');
    return $open == $close;
}

class messageEdit extends ConnectionDb
{
    public function edit($id, $message)
    {
        $response = [];
        $conn = $this->connect();

        if (empty($message)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Please fill in all required fields!..."));
        }
        elseif (!checkTagsClose($message)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Inconsistency between closed and open tags!"));
        }
        else {

            $sql = "UPDATE `messages` SET `message`= :message WHERE `id` = :id";
            $params = [':message' => $message, ':id' => $id];
            $result = $conn->prepare($sql);
            $result->execute($params);
            $response = array('status' => true, 'error' => null, 'user' => array('id' => $id, 'message' => $message));
        }
        echo json_encode($response);
    }
}

$user = new messageEdit();
$user->edit($id, $message);