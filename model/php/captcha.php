<?php
session_start();

// Генеруємо випадковий текст для CAPTCHA
$random_text = substr(str_shuffle(uniqid()), 0, 5); // Генеруємо 5-символьний випадковий текст

// Зберігаємо випадковий текст у змінній сесії
$_SESSION['captcha'] = $random_text;

// Створюємо нове зображення з білою основою
$image = imagecreatetruecolor(100, 30);
$bg_color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bg_color);

// Додаємо випадковий текст на зображення
$text_color = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 10, 8, $random_text, $text_color);

// Виводимо зображення на сторінку
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>