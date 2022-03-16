<?php 
session_start();
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Over</title>
    <link href="styles/board.css" rel="stylesheet">

</head>
<body>
    <h1>Game Over</h1>
    <h2>You finished with a score of <?= $_SESSION["score"] ?> </h2>
    <a href="restart.php">Play again!</a>
    
</body>
</html>