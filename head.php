<div id="navbar">
    <div>Welcome, <?= $_SESSION['username'] ?></div>
    <div>Score: <?= $_COOKIE["score"] ?></div>
    <div>
        <a href="logout.php">Log Out</a>
    </div>
</div>