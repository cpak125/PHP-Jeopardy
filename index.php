<?php
session_start();

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
        $_SESSION['UserData']['username'] = $accounts[$username]; // password
        $_SESSION['username'] = $username; // username
        header("location:board.php");
        exit;
    } else {
        $msg = "<span style='color:#ff0000'>Invalid Login Details</span>";
    }
}

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
        <?php if(isset($msg)) echo $msg; ?> <br>
        <form action="" method="post">
            <input class="form-input" type="text" name="username" placeholder="Username">
            <input class="form-input" type="password" name="password" placeholder="Password">
            <input class="form-input" type="submit" name="Submit" value="Log in">
            <p>Not registered? <a href="register.php">Create an account</a></p>
        </form>
    </div>

</body>

</html>