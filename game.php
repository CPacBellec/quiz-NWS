<?php
session_start([
    'cookie_secure' => true, // Assurez-vous que les cookies de session sont sécurisés (HTTPS)
    'cookie_httponly' => true, // Empêche l'accès aux cookies via JavaScript
    'use_strict_mode' => true // Active le mode strict pour les sessions
]);
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
