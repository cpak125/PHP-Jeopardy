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
    <style>
        <?php include "styles/board.css" ?>
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="ans-container">
    <?php 
    include 'helper.php';

    if (isset($_GET["answer"])) {

        $answer = $_GET["answer"];
        $points = $_GET["pointVal"];

        if (checkAnswer($answer) && !empty($answer)) {
            $newScore = $_SESSION["score"] + (int)$points;
            $_SESSION["score"] = $newScore;
            // $newScore = (int)$_COOKIE["score"] + (int)$points;
            // setcookie("score", $newScore);
            echo "<h2 class='answer'> CORRECT ANSWER!</h2>";
        } else {
            $newScore = $_SESSION["score"] - (int)$points;
            $_SESSION["score"] = $newScore;
            // $newScore = (int)$_COOKIE["score"] - (int)$points;
            // setcookie("score", $newScore);
            echo "<h2 class ='answer'> INCORRECT ANSWER!</h2>";
        }
    }
    ?>
    <a href="board.php"><button>CONTINUE</button></a>
    </div>
</body>

</html>