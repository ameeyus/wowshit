<?php
    session_start();
    $user_id =$_SESSION["user_id"] ?? false;
if($user_id) {
    require "vendor/autoload.php";
    $db = new Photos\DB();
    $data = $db->get_user_photos($user_id);
}

    if (isset($_GET["error"])) {
        $error = "Неверный логин или пароль!";
    }
    if (isset($_GET["sign_error"])) {
        $sign_error = "Такой логин уже занят!";
    }
    if (isset($_GET["sign_success"])) {
        $sign_success = "Вы успешно зарегестрировались!";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="10.css">
    <link rel="stylesheet" href="meta.css">
    <title>Document</title>
</head>
<body>
<?php include "header.php" ?>
    <?php if($user_id): ?>
        
        <h1>Галерея пользователя</h1>
        <div id="grid">
            <?php foreach ($data as $photo): ?>
                <?= (new Photos\Photo($photo["image"], $photo["text"], $photo["id"]))->get_html   () ?>
            <?php endforeach; ?>
    </div>
    <?php else: ?>
        <div class="form">
            <form action="login.php" method="post">
                <h1>Авторизация</h1>
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button>Вход</button>

             <?php if (isset($_GET["error"])): ?>
             <p class="error"><?= $error ?></p>
             <?php endif ?>
            </form>
            <form action="signup.php" method="post">
                <h1>Регистрация</h1>
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button>Зарегестрироваться</button>

                <?php if (isset($_GET["sign_error"])): ?>
                 <p class="error"><?= $sign_error?></p>
                 <?php endif ?>
                 <?php if (isset($_GET["sign_success"])): ?>
                 <p class="success"><?= $sign_success?></p>
                 <?php endif ?>
            </form>
        </div>
    <?php endif; ?>
    <?php include "add_form.php" ?>
    <script src="11.js"></script>
</body>
</html>