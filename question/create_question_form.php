<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Création de question pour le quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Créer une nouvelle question</h1>
    <form action="process_question.php" method="post">
        <label for="question_text">Intitulé de la question :</label>
        <textarea id="question_text" name="question_text" required></textarea>

        <label for="option1">Réponse 1 :</label>
        <input type="text" id="option1" name="option1" required>

        <label for="option2">Réponse 2 :</label>
        <input type="text" id="option2" name="option2" required>

        <label for="option3">Réponse 3 :</label>
        <input type="text" id="option3" name="option3" required>

        <label for="correct_option">Bonne réponse (1, 2, or 3) : </label>
        <input type="number" id="correct_option" name="correct_option" min="1" max="3" required>

        <button type="submit">Envoyez la question</button>
    </form>
</body>
</html>
