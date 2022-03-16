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
    <?php include 'navbar.php'; ?>
    <div id="ques-container">
        <?php
        include 'helper.php';
        if (isset($_GET['Question'])) {
            $question = $_GET['Question'];
            $points = getPointVal($question);
            echo "<br>";
            echo $points . " points" . "<br><br>";

            $showQues = getQuestion($question);
            echo "<div id='question'>";
            openQuestion($question);
            echo "</div";

            $_SESSION["answered"] = viewedQuestions($question, $_SESSION["answered"]);
        }
        ?>
        <div>
            <form action="answer.php">
                <input type="text" name="answer">
                <input type="hidden" name="pointVal" value="<?= $points; ?>" />
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>