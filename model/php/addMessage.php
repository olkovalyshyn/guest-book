<?php
include('../../connect/connect.php');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// перевірка наявності даних в формі
$userName = test_input($_POST["userName"]);
$userEmail = test_input($_POST["userEmail"]);
$homepage = test_input($_POST["homepage"]);
$message = test_input($_POST["message"]);
$captcha = test_input($_POST["captcha"]);
$language = test_input($_POST["language"]);

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

class AddMessage extends ConnectionDB
{
    public function add($userName, $userEmail, $homepage, $message, $captcha, $language)
    {
        $conn = $this->connect();
        $response = [];
        // перевірка валідності даних
        if (empty($userName) || empty($userEmail) || empty($message) || empty($captcha)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Please fill in all required fields!..."));
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "The login can contain only Latin letters and numbers!"));
        } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Invalid email format!"));
        } elseif (!empty($homepage) && !filter_var($homepage, FILTER_VALIDATE_URL)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Incorrect URL format!"));
        }
//    elseif (strtolower($captcha) != strtolower($_SESSION["captcha"])) {
//        http_response_code(400);
//        $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Invalid captcha code!"));
//    }
        elseif (!checkTagsClose($message)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "Inconsistency between closed and open tags!"));
        }
        //якщо зареєстрований користувач вводить не свої name email
        elseif ($_SESSION['name'] && ($_SESSION['name'] !== $userName || $_SESSION['email'] !== $userEmail)) {
            http_response_code(400);
            $response = array('status' => false, 'error' => array('code' => 400, 'message' => "This name or email is not your. Please, enter correct!"));
        } else {
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `messages` (`name`, `email`,`homepage`,`message`,`language`) VALUES(:name, :email, :homepage, :message, :language)";
            $result = $conn->prepare($sql);
            $params = ['name' => $userName, 'email' => $userEmail, 'homepage' => $homepage, 'message' => $message, 'language' => $language];
            $result->execute($params);
            http_response_code(200);
            $idLastInsert = $conn->lastInsertId();
            $response = array('status' => true, 'error' => null, 'user' => array('id' => $idLastInsert, 'userName' => $userName, 'email' => $userEmail, 'homepage' => $homepage, 'message' => $message, 'date' => $date));
        }
        echo json_encode($response);
    }
}

$user = new AddMessage();
$user->add($userName, $userEmail, $homepage, $message, $captcha, $language);
