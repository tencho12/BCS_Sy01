document.addEventListener('DOMContentLoaded', function () {
    let currentQuestionIndex = 0;
    let userScore = 0;
    let quizData = {};
    const urlParams = new URLSearchParams(window.location.search);
    const quizName = urlParams.get('quiz') || 'xss';  // Default to 'xss'
    
    // Load quiz data from JSON
    fetch('quiz/quiz.json')
        .then(response => response.json())
        .then(data => {
            quizData = data[quizName];
             // Shuffle the questions array
            quizData.questions = shuffleArray(quizData.questions);
            displayQuestion();
        })
        .catch(error => console.error('Error loading quiz data:', error));

        // Fisher-Yates shuffle algorithm
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1)); // Random index from 0 to i
                [array[i], array[j]] = [array[j], array[i]];   // Swap elements
            }
            return array;
        }
    // Display the current question
    function displayQuestion() {
        const questionObj = quizData.questions[currentQuestionIndex];
        const quizContainer = document.getElementById('quiz-container');
        quizContainer.innerHTML = `
            <p><strong>Question ${currentQuestionIndex + 1}:</strong> ${questionObj.question}</p>
            ${questionObj.answers.map((choice, index) => `
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" value="${index}" id="choice${index}">
                    <label class="form-check-label" for="choice${index}">
                        ${choice}
                    </label>
                </div>
            `).join('')}
            <button id="hint-btn" class="btn btn-info mt-3">Hint</button>
            <p id="hint-text" class="mt-2" style="display:none;">${questionObj.hint}</p>
            <p class="mt-3 text-success h4 pt-20 pb-20 "><strong>Your Current Score: <span id="current-score">${userScore}</span></strong></p> <!-- Score display here -->
        `;

        document.getElementById('hint-btn').addEventListener('click', function () {
            document.getElementById('hint-text').style.display = 'block';
        });
    }

    // Handle Next button click
    document.getElementById('next-btn').addEventListener('click', function () {
        const selectedAnswer = document.querySelector('input[name="answer"]:checked');
        if (selectedAnswer) {
            const answerIndex = parseInt(selectedAnswer.value); // User's selected index
            const correctAnswerIndex = quizData.questions[currentQuestionIndex].correct_answer; // Correct answer index
            const answer = quizData.questions[currentQuestionIndex].answers[answerIndex]
            // Compare the selected answer index to the correct answer index
            if (answer === correctAnswerIndex) {
                userScore++; // Increase score if the selected answer is correct
            }

            // Update score display
            document.getElementById('current-score').innerText = userScore;

            currentQuestionIndex++;
            if (currentQuestionIndex < quizData.questions.length) {
                displayQuestion();
            } else {
                this.disabled = true; // No more questions
                alert("You have reached the end of the quiz.");
            }
        } else {
            alert('Please select an answer before proceeding.');
        }
    });

     // Handle Previous button click
    document.getElementById('prev-btn').addEventListener('click', function () {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--; // Move to the previous question
            displayQuestion(); // Update the display
        } else {
            alert('This is the first question.'); // Handle case when on the first question
        }
    });
});
