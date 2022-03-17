<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        <?php include "styles/board.css" ?>
    </style>
</head>

<body>
    <?php include 'navbar.php' ?>
    
    <div class="leaderboard">
    <a href="board.php"><button class="orange-button">Return to Game</button></a>
        <?php
        include "helper.php";
        readLeaderBoard();
        ?>
    </div>

</body>

</html>