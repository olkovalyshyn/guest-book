<?php

// перевірка наявності даних в формі
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $email = test_input($_POST["email"]);
    $homepage = test_input($_POST["homepage"]);
    $text = test_input($_POST["text"]);
    $captcha = test_input($_POST["captcha"]);
    $language = test_input($_POST["language"]);

    // перевірка валідності даних
    if (empty($username) || empty($email) || empty($text) || empty($captcha)) {
        echo "Будь ласка, заповніть всі обов'язкові поля!";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        echo "Логін може містити тільки латинські букви і цифри!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Неправильний формат електронної пошти!";
    } elseif (!empty($homepage) && !filter_var($homepage, FILTER_VALIDATE_URL)) {
        echo "Неправильний формат URL-адреси!";
    } elseif (strtolower($captcha) != $_SESSION["captcha"]) {
        echo "Неправильний код CAPTCHA!";
    } else {
        echo "Дякуємо за ваше повідомлення!";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}