<?php
session_start();
$_SESSION["answered"] = array(
    array("Q1" => array(200, false), "Q2" => array(200, false), "Q3" => array(200, false), "Q4" => array(200, false), "Q5" => array(200, false)),
    array("Q6" => array(400, false), "Q7" => array(400, false), "Q8" => array(400, false), "Q9" => array(400, false), "Q10" => array(400, false)),
    array("Q11" => array(600, false), "Q12" => array(600, false), "Q13" => array(600, false), "Q14" => array(600, false), "Q15" => array(600, false)),
    array("Q16" => array(800, false), "Q17" => array(800, false), "Q18" => array(800, false), "Q19" => array(800, false), "Q20" => array(800, false)),
    array("Q21" => array(1000, false), "Q22" =>  array(1000, false), "Q23" =>  array(1000, false), "Q24" =>  array(1000, false), "Q25" =>  array(1000, false)),
);
$_SESSION["categories"] = array("Category 1", "Category 2", "Category 3", "Category 4", "Category 5");

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
    include("head.php");
    ?>

    <form id="board-form"action="board_submit.php" method="get">
        <?php
        include 'common.php';
        include 'helper.php';
        buildBoard($_SESSION["answered"], $_SESSION["categories"]);

        if (isset($_GET["answer"])) {

            $answer = $_GET["answer"];
            $points = $_GET["points"];

            if (checkAnswer($answer)) {
                $_COOKIE["score"] = $_COOKIE["score"] + $points;
                echo "<p class = 'answer'> CORRECT ANSWER!</p>";
            } else {
                $_COOKIE["score"] = $_COOKIE["score"] - $points;
                echo "<p class = 'answer'> INCORRECT ANSWER!</p>";
            }
        }
        if (isBoardCleared($_SESSION["answered"])) {
            echo "<p style = 'font-size = 20pt;'>GAME OVER</p>";
            updateLeaderBoard($_GET["username"], $_COOKIE["score"]);
        }
        ?>

</body>

</html>