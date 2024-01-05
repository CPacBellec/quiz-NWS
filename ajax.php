<?php
include 'db.php';
include 'functions.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'get_question':
            $questionId = $_POST['question_id'];
            $question = getQuestion($questionId);
            echo json_encode($question);
            break;

        case 'submit_answer':
            $sessionCode = $_POST['session_code'];
            $playerId = $_POST['player_id'];
            $questionId = $_POST['question_id'];
            $selectedAnswer = $_POST['selected_answer'];

            // Logic to validate the answer, update scores, etc.
            // For simplicity, let's assume the correct answer is always '1'
            $correctAnswer = 1;
            $score = ($selectedAnswer == $correctAnswer) ? 1 : 0;

            updateScore($playerId, $score);

            break;
    }
}
