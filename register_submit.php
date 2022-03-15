<?php

$username = $_POST["username"];
$password = $_POST["password"];
$filename = 'accounts.txt';
$file = file($filename);
$users = [];

for ($i = 0; $i < count($file); $i++) {
    $temp = explode(",", $file[$i]);
    $currUsername = $temp[0];
    $users[$i] = $currUsername;
}

$error = false;
$exists = false;

if (empty($username) || empty($password)) {
    $error = true;
}

foreach ($users as $user) {
    if ($user == $username) {
        $exists = true;
    }
}
if (!$error && !$exists) {
    $newUser = array($username, $password . "\n");
    $str = join(',', $newUser);
    file_put_contents($filename, $str, FILE_APPEND);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="styles/register_submit.css" rel="stylesheet">
</head>

<body>
    <div id="content">
        <?php if ($error) { ?>
            <h1>Error!</h1>
            <p>We're sorry. You've left some fields empty.  Please <a href="register.php">try again</a>.</p><br>
        <?php } else if ($exists) { ?>
            <h1>Error!</h1>
            <p>We're sorry. The username you have chosen already exists. Please <a href="register.php">try again</a>.</p>
        <?php } else { ?>
            <h1>Thanks for signing up, <?= $username ?>!</h1>
            <p><a href="index.php">Log in</a>&nbsp;and start playing!</p>
        <?php } ?>
    </div>
</body>

</html>