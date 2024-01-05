<?php
function getQuestion($questionId) {
    global $conn;
    $sql = "SELECT * FROM questions WHERE id = $questionId";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function createSession() {
    global $conn;
    $sessionCode = generateRandomCode();
    $sql = "INSERT INTO sessions (session_code) VALUES ('$sessionCode')";
    $conn->query($sql);
    return $sessionCode;
}

function joinSession($sessionCode, $playerName) {
    global $conn;
    $sql = "SELECT id FROM sessions WHERE session_code = '$sessionCode'";
    $result = $conn->query($sql);
    $session = $result->fetch_assoc();

    if ($session) {
        $sessionId = $session['id'];
        $sql = "INSERT INTO players (session_id, player_name) VALUES ($sessionId, '$playerName')";
        $conn->query($sql);
        return $conn->insert_id; // Return the player ID
    }

    return null;
}

function updateScore($playerId, $score) {
    global $conn;
    $sql = "UPDATE players SET score = $score WHERE id = $playerId";
    $conn->query($sql);
}

function generateRandomCode($length = 8) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

function getSessionInfo($sessionCode) {
    global $conn;
    $sql = "SELECT * FROM sessions WHERE session_code = '$sessionCode'";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function getPlayersResults($sessionId) {
    global $conn;
    $sql = "SELECT * FROM players WHERE session_id = $sessionId ORDER BY score DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}