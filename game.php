<?php
include 'dbConnect.php';
include 'functions.php';

$sessionCode = isset($_GET['session_code']) ? $_GET['session_code'] : '';

if (empty($sessionCode)) {
    $sessionCode = createSession();
}

$playerName = "Player" . rand(1, 100);
$playerId = joinSession($sessionCode, $playerName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz des ambassadeurs</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenue, <?php echo $playerName; ?>!</h1>
    <div id="question-container"></div>
    <div id="options-container"></div>
    <button onclick="submitAnswer()">Confirmer votre réponse</button>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
