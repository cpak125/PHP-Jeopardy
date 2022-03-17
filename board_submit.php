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
            $explode =  explode('-', $_GET['Question']);
            $quesNum = $explode[0];
            // $quesNum = $_GET['Question'];
            $points = getPointVal($quesNum);
            $quesText = openQuestion($quesNum);
    
            echo "<div id='question'>";
            echo $points . " points" . "<br><br>";
            echo $quesText;
            echo "</div";

            $_SESSION["quesInfo"] = viewedQuestions($quesNum, $_SESSION["quesInfo"]);
        }
        ?>
        <div>
            <form action="answer.php">
                <input type="text" placeholder="Type your answer" name="answer">
                <input type="hidden" name="pointVal" value="<?= $points; ?>" />
                <input type="submit"  value="Submit">
            </form>
        </div>
    </div>
</body>

</html>