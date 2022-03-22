<div id="navbar">
    <div>Welcome, <?= $_SESSION['username'] ?></div>
    <div>Score: <?= $_SESSION["score"] ?></div>
    <div><a href="board.php">Game</a></div>
    <div><a href="leaderboard.php">Leaderboard</a></div>
    <div><a href="summary.php">Project Summary</a></div>
    <div>
        <a href="logout.php">Log Out</a>
    </div>
</div>