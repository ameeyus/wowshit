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
    <link rel="stylesheet" href="meta.css">
    <title>Document</title>
</head>
<body>
<?php include "header.php" ?>
<h1>Галерея</h1>
<div id="grid">
    <?php foreach ($data as $photo): ?>
        <?= (new Photos\Photo($photo["image"], $photo["text"], $photo["id"]))->get_html   () ?>
    <?php endforeach; ?>

</div>

<div id="popup_photo">
    <img src="./close.png" alt="">
</div>
<?php include "add_form.php" ?>
<script src="11.js"></script>
</body>
</html>