



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
        <img src="img/jeopardy.png" alt="logo"/>
    </div>
    <div id="form">
    <h2>Log in to play</h2>
        <form action="" method="post" class="login-form">
            <input class="form-input" type="text" name="username" placeholder="Username" value="<?php echo @$_COOKIE['username']; ?>">
            <input class="form-input" type="password" name="password" placeholder="Password" value="<?php echo @$_COOKIE['Password']; ?>">
            <input class="form-input" type="submit" name="submit" value="Log in">
            <p>Not registered? <a href="register.php">Create an account</a></p>
        </form>
    </div>

</body>

</html>