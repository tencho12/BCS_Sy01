
    let currentQuestion = 1;

    function checkAnswer(questionName, correctAnswer) {
        const radios = document.getElementsByName(questionName);
        let selectedValue;

        for (const radio of radios) {
            if (radio.checked) {
                selectedValue = radio.value;
                break;
            }
        }

        if (selectedValue === correctAnswer) {
            document.getElementById(`feedbackText`).innerText = 'Correct!';
            currentQuestion++;
            showNextQuestion();
        } else {
            document.getElementById(`feedbackText`).innerText = 'Incorrect. Try again!';
            document.getElementById('resultText').style.display = 'block';
            hideAllQuestions();
        }
    }

    function showNextQuestion() {
        if (currentQuestion <= 3) {
            hideAllQuestions();
            document.getElementById(`question${currentQuestion}`).style.display = 'block';
        } else {
            document.getElementById(`resultText`).innerText = 'Quiz Completed!';
            document.getElementById('resultText').style.display = 'block';
            document.getElementById('result').style.display = 'block';
            document.getElementById('quizheader').style.display = 'none';
        }
    }

    function hideAllQuestions() {
        for (let i = 1; i <= 3; i++) {
            document.getElementById(`question${i}`).style.display = 'none';
        }
    }

    function restartQuiz() {
        currentQuestion = 1;
        hideAllQuestions();
        document.getElementById('resultText').style.display = 'none';
        document.getElementById(`question1`).style.display = 'block';
    }
