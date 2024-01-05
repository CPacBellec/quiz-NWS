<?php
include 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionText = $_POST['question_text'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $correctOption = $_POST['correct_option'];

    $sql = "INSERT INTO questions (question_text, option1, option2, option3, correct_option)
            VALUES ('$questionText', '$option1', '$option2', '$option3', $correctOption)";

    if ($conn->query($sql) === TRUE) {
        echo "Question created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
