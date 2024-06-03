<?php
session_start();
$user_id = $_SESSION["user_id"] ?? false;
$photo_id = intval($_GET["id"]);
require "vendor/autoload.php";

$db = new \Photos\DB();
$photo = $db->get_photo_by_id($photo_id);
$comments = $db->get_photo_comments($photo_id);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comment"])) {
    $comment_text = $_POST["comment"];
    if ($user_id) {
        $db->add_comment($photo_id, $user_id, $comment_text);
        // Reload the page to show the new comment
        header("Location: " . $_SERVER["REQUEST_URI"]);
        exit;
    } else {
        echo "<p>Please log in to comment.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="10.css">
    <title>Фото</title>
</head>
<body>
<?php include "header.php"; ?>
<div id="image">
    <img src="<?= $photo["image"] ?>" alt="">
    <h1><?= $photo["text"] ?></h1>
    <p><?= $photo["tags"] ?></p>
    <div class="comments">
        <h2>Коммент:</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p class="author"><?= $comment["name"] ?></p>
                <p class="text"><?= $comment["text"] ?></p>
                <p class="date"><?= $comment["post_date"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <form class="addComment" method="POST" action="">
        <h1>Введите комментарий</h1>
        <textarea name="comment" id="text" cols="30" rows="4"></textarea>
        <button id="add_comment" class="Send" type="submit">Отправить</button>
    </form>
</div>
<script src="image.js"></script>
</body>
</html>
