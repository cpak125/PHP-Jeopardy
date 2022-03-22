<div id="navbar">
    <div>Welcome, <?= $_SESSION['username'] ?></div>
    <div>Score: <?= $_SESSION["score"] ?></div>
    <div><a href="leaderboard.php">Leaderboard</a></div>
    <div><a href="summary.html">Project Summary</a></div>
    <div>
        <a href="logout.php">Log Out</a>
    </div>
</div>