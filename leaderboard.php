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
    <link href="styles/board.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php' ?>
    <a href="board.php">Return to Game</a>
    <div class="leaderboard">
        <?php
        include "helper.php";
        readLeaderBoard();
        ?>
    </div>

</body>

</html>