<?php
include 'dbConnect.php';
include 'functions.php';

// Récupérer le code de session à partir de l'URL ou d'une autre source
$sessionCode = isset($_GET['session_code']) ? $_GET['session_code'] : '';

if (empty($sessionCode)) {
    // Rediriger vers la page d'accueil si le code de session est manquant
    header("Location: index.php");
    exit();
}

// Récupérer les informations de la session
$sessionInfo = getSessionInfo($sessionCode);

if (!$sessionInfo) {
    // Rediriger vers la page d'accueil si la session n'existe pas
    header("Location: index.php");
    exit();
}

// Récupérer les résultats des joueurs
$playersResults = getPlayersResults($sessionInfo['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizz Results</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Résultats du Quizz</h1>
    <p>Session Code: <?php echo $sessionCode; ?></p>

    <div id="results-container">
        <table>
            <tr>
                <th>Joueur</th>
                <th>Score</th>
            </tr>
            <?php foreach ($playersResults as $player): ?>
                <tr>
                    <td><?php echo $player['player_name']; ?></td>
                    <td><?php echo $player['score']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
