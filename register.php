<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="styles/register.css" rel="stylesheet">
</head>

<body>
    <div id="form">
        <h2>Sign Up</h2>
        <form action="register_submit.php" method="post">
            <input class="form-input" type="text" name="username" placeholder="Username">
            <input class="form-input" type="password" name="password" placeholder="Password">
            <input class="form-input" type="submit" value="Register">
            <p>Already registered? <a href="index.php">Sign In</a></p>
        </form>
    </div>
</body>

</html>