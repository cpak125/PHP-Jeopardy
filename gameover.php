<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Over</title>
    <style>
        <?php include "styles/board.css" ?>
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div id="gameover">
        <h1>Game Over</h1>
        <h2>You finished with a score of <?= $_SESSION["score"] ?> </h2>
        <a href="restart.php"><button class="orange-button">Play again!</button></a>
    </div>

</body>

</html>