          function checkAnswers() {
          const answers = {
              q1: 'B',
              q2: 'C',
              q3: 'C'
          };

          let score = 0;
          const totalQuestions = Object.keys(answers).length;

          for (let question in answers) {
              const userAnswer = document.querySelector(`input[name="${question}"]:checked`);
              if (userAnswer && userAnswer.value === answers[question]) {
                  score++;
              }
          }

          const resultText = document.getElementById('resultText');
          
          // Reset the result display
          document.getElementById('result').classList.add('hidden');

          if (score === totalQuestions) {
              // Only display the result if all answers are correct
              resultText.innerText = `Congratulations! You scored ${score} out of ${totalQuestions}.`;
              document.getElementById('result').classList.remove('hidden');
          } else {
              // Provide feedback if not all answers are correct
              resultText.innerText = `You scored ${score} out of ${totalQuestions}. Try again!`;
          }
      }
      
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

    // tencho change here
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

     // tencho change here
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
