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

    <div class="ques-container">
        <?php
        include 'helper.php';
        if (isset($_GET['Question'])) {
            $explode =  explode('-', $_GET['Question']);
            $quesNum = $explode[1];
            // $quesNum = $_GET['Question'];
            $points = getPointVal($quesNum);
            $quesText = openQuestion($quesNum);

            echo "<div class='question'>";
            echo $points . " points" . "<br><br>";
            echo $quesText;
            echo "<br></div";

            $_SESSION["quesInfo"] = viewedQuestions($quesNum, $_SESSION["quesInfo"]);
        }
        ?>
    </div>

    <div class="ans-form">
        <form action="answer.php">
            <input type="text" placeholder="Type your answer" name="answer">
            <input type="hidden" name="pointVal" value="<?= $points; ?>" />
            <input type="submit" value="Submit">
        </form>
    </div>


</body>

</html>