<?php
include 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionText = mysqli_real_escape_string($conn, $_POST['question_text']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
    $correctOption = intval($_POST['correct_option']);

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
