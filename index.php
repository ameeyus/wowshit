<?php
    $data = [
       [
        "path" => "https://picsum.photos/seed/21/1920/1080",
           "title" => "Some title"
       ],
        [
            "path" => "https://picsum.photos/seed/22/1920/1080",
            "title" => "Some title"
        ],
        [
            "path" => "https://picsum.photos/seed/23/1920/1080",
            "title" => "Some title"
        ],
        [
            "path" => "https://picsum.photos/seed/24/1920/1080",
            "title" => "Some title"
        ],
        [
            "path" => "https://picsum.photos/seed/25/1920/1080",
            "title" => ""
        ],

        [
            "path" => "https://picsum.photos/seed/24/1920/1080",
            "title" => ""
        ],


    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img {
            max-width: 500px;
        }
    </style>
</head>
<body>
<?php
foreach ($data as $str) {
    echo "<img src='{$str["path"]}' />";
    echo "<p>{$str["title"]}</p>";
}
?>

<?php foreach ($data as $str): ?>
    <img src="<?= $str["path"] ?>" />
    <p><?= $str["title"] ?></p>
<?php endforeach; ?>

</body>
</html>