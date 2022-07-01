<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Image | <?= $t ?></title>
    <link rel="stylesheet" href="./assets/css/index.css">
</head>
<body>
    <?php
    include './assets/includes/navbar.php';

    echo $content;
    ?>

    <script src="https://kit.fontawesome.com/dfa6ef64c8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./assets/js/buttons.js"></script>
</body>
</html>