let currentQuestion = 1;

function fetchQuestion() {
    $.ajax({
        url: 'ajax.php',
        type: 'post',
        data: {
            action: 'get_question',
            question_id: currentQuestion
        },
        success: function (response) {
            displayQuestion(response);
        }
    });
}

function displayQuestion(question) {
    $('#question-container').html(question.question_text);

    // Display options
    let optionsContainer = $('#options-container');
    optionsContainer.empty();

    for (let i = 1; i <= 3; i++) {
        optionsContainer.append(
            `<label><input type="radio" name="answer" value="${i}"> ${question['option' + i]}</label><br>`
        );
    }
}

function submitAnswer() {
    let selectedAnswer = $("input[name='answer']:checked").val();

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        data: {
            action: 'submit_answer',
            session_code: '<?php echo $sessionCode; ?>',
            player_id: '<?php echo $playerId; ?>',
            question_id: currentQuestion,
            selected_answer: selectedAnswer
        },
        success: function (response) {
            // Handle the response, update scores, etc.
            currentQuestion++;

            // Fetch the next question
            fetchQuestion();
        }
    });
}

// Initial setup
fetchQuestion();
