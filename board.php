<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Jeopardy</title>
    <link href="styles/board.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'navbar.php';
    include 'helper.php';
    ?>

    <form id="board-form" action="board_submit.php" method="get">
        <?php
        buildBoard($_SESSION["quesInfo"], $_SESSION["categories"]);
        ?>
    </form>

    <?php

    if (isBoardCleared($_SESSION["quesInfo"])) {
        updateLeaderBoard($_SESSION["username"], $_SESSION["score"]);
        header("location:gameover.php");
    }
    ?>
</body>

</html>