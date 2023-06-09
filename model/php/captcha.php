<?php
session_start();

$random_text = null;

// Перевіряємо, чи існує змінна $_SESSION['captcha']
if (!isset($_SESSION['captcha'])) {
    // Генеруємо випадковий текст для CAPTCHA
    $random_text = substr(str_shuffle(uniqid()), 0, 5); // Генеруємо 5-символьний випадковий текст

    // Зберігаємо випадковий текст у змінній сесії
    $_SESSION['captcha'] = $random_text;
} else {
    $random_text = $_SESSION['captcha'];
}

// Створюємо нове зображення з білою основою
$image = imagecreatetruecolor(100, 30);
$bg_color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bg_color);

// Додаємо випадковий текст на зображення
$text_color = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 10, 8, $random_text, $text_color);

// Виводимо зображення на сторінку
//header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
