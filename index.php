<?php
session_start();
include 'helper.php';

if (isset($_POST['Submit'])) {
    $accounts = array('admin' => 'admin');
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $file = file("accounts.txt");
    for ($i = 0; $i < count($file); $i++) {
        $currUser = explode(",", $file[$i]);
        $currUsername = $currUser[0];
        $currPassword = $currUser[1];
        $formattedPassword = rtrim($currPassword);
        $accounts[$currUsername] = $formattedPassword;
    }
    if (isset($accounts[$username]) && $accounts[$username] == $password) {
        $_SESSION['password'] = $accounts[$username]; // password
        $_SESSION['username'] = $username; // username

        header("location:board.php");
        exit;
    } else {
        $msg = "<span style='color:#ff0000'>Invalid Login Details</span>";
    }
}

$_SESSION["quesInfo"] = array(
    array("Q1" => array(200, false), "Q2" => array(200, false), "Q3" => array(200, false), "Q4" => array(200, false), "Q5" => array(200, false)),
    array("Q6" => array(400, false), "Q7" => array(400, false), "Q8" => array(400, false), "Q9" => array(400, false), "Q10" => array(400, false)),
    array("Q11" => array(600, false), "Q12" => array(600, false), "Q13" => array(600, false), "Q14" => array(600, false), "Q15" => array(600, false)),
    array("Q16" => array(800, false), "Q17" => array(800, false), "Q18" => array(800, false), "Q19" => array(800, false), "Q20" => array(800, false)),
    array("Q21" => array(1000, false), "Q22" =>  array(1000, false), "Q23" =>  array(1000, false), "Q24" =>  array(1000, false), "Q25" =>  array(1000, false))
);
$_SESSION["categories"] = array("Category 1", "Category 2", "Category 3", "Category 4", "Category 5");
$_SESSION["score"] = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP Jeopardy</title>
    <link href="styles/login.css" rel="stylesheet">
</head>

<body>
    <div id="logo">
        <img src="img/jeopardy.png" alt="logo" />
    </div>

    <div id="form">
        <h2>Log in to play</h2>
        <?php if (isset($msg)) echo $msg; ?> <br>
        <form action="" method="post">
            <input class="form-input" type="text" name="username" placeholder="Username">
            <input class="form-input" type="password" name="password" placeholder="Password">
            <input class="form-input" type="submit" name="Submit" value="Log in">
            <p>Not registered? <a href="register.php">Create an account</a></p>
        </form>
    </div>

</body>

</html>