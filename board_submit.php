<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Jeopardy</title>
</head>
<body>
<div class="question">
    <?php
    include 'common.php';
    if (isset($_GET["name"])) {
      $question = $_GET["name"];
      openQuestion($question);
      $points = getScore($question);
      echo "<br>";
      echo $points;
      $_SESSION["answered"] = viewedQuestions($question, $_SESSION["answered"]);
    }
    ?>
    <form action="Board.php">
      <input type="text" name="Answer">
      <input type="hidden" name="points" value="<?= $points; ?>" />
    </form>
  </div>
</body>
</html>