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
        buildBoard($_SESSION["answered"], $_SESSION["categories"]);
        ?>
    </form>

    <?php
    // if (isset($_GET["answer"])) {

    //     $answer = $_GET["answer"];
    //     $points = $_GET["pointVal"];

    //     if (checkAnswer($answer)) {
    //         $newScore = $_SESSION["score"] + (int)$points;
    //         $_SESSION["score"] = $newScore;
    //         // $newScore = (int)$_COOKIE["score"] + (int)$points;
    //         // setcookie("score", $newScore);
    //         echo "<p class = 'answer'> CORRECT ANSWER!</p>";
    //     } else {
    //         $newScore = $_SESSION["score"] - (int)$points;
    //         $_SESSION["score"] = $newScore;
    //         // $newScore = (int)$_COOKIE["score"] - (int)$points;
    //         // setcookie("score", $newScore);
    //         echo "<p class = 'answer'> INCORRECT ANSWER!</p>";
    //     }
    // }

    if (isBoardCleared($_SESSION["answered"])) {
        echo "<p style = 'font-size = 20pt;'>GAME OVER</p>";
        updateLeaderBoard($_SESSION["username"], $_SESSION["score"]);
    }
    ?>
</body>

</html>