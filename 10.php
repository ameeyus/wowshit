<?php
require "DB.php";
require "Photo.php";
use Photos\DB;
use Photos\Photo;
$db = new DB();
$data = $db->get_all_photos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="./10.css">
    <link rel="stylesheet" href="./meta.css">
        <title>Document</title>
</head>
<body>
<header>
    <div class="popup">
        <a href="#">Главная</a>
        <a id="show_add_photo" href="#">Фото</a>
        <a href="#">Посты</a>
        <a href="./user.php">Личный кабинет</a>
    </div>

    <div class="mobile_icon">
        <img src="./free-icon-menu-bar-2311552.png" alt="">
    </div>
</header>
<h1>Галерея</h1>
<div id="grid">
    <?php foreach ($data as $photo): ?>
        <?= (new Photo($photo["image"], $photo["text"]))->get_html(); ?>
    <?php endforeach; ?>
</div>
<div id="add_new_photo">
    <div>
        <input id="new_photo_src" type="text" placeholder="Картинка">
        <input id="new_photo_text" type="text" placeholder="Подпись">
        <button id="add_photo">Добавить</button>
        <button id="cancel">Отмена</button>
    </div>
</div>
<div id="popup_photo">
    <img src="./close.png" alt="">
</div>
<script src="11.js"></script>
</body>
</html>
