<?php
session_start();
include 'helper.php';
if (isBoardCleared($_SESSION["quesInfo"])) {
    header("Location: gameover.php");
    updateLeaderBoard($_SESSION["username"], $_SESSION["score"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Jeopardy</title>
    <style>
        <?php include "styles/board.css" ?>
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <form id="board-form" action="board_submit.php" method="get">
        <?php
        buildBoard($_SESSION["quesInfo"], $_SESSION["categories"]);
        ?>
    </form>
</body>

</html>