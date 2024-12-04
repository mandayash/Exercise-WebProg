document.addEventListener('DOMContentLoaded', () => {
    const answerButtons = document.querySelectorAll('.answer-btn');  // Get all the answer buttons
    const nextButton = document.getElementById('next-btn');
    const prevButton = document.querySelector('.bg-gray-200');
    const fillInQuestion = document.getElementById('fill-in-question');
    let currentQuestion = 1;

    // Correct answer (this can be modified based on the quiz)
    const correctAnswer = 'C';

    // Time out after 30 seconds for the auto-next feature
    let timer = setTimeout(nextQuestion, 30000);

    // Function to go to next question
    function nextQuestion() {
        if (currentQuestion === 1) {
            // Hide the first question and show the fill-in question after 30 seconds
            document.querySelector('#question-container').classList.add('hidden');
            fillInQuestion.classList.remove('hidden');
            currentQuestion = 2;
            // Reset timer for next question
            clearTimeout(timer);
            timer = setTimeout(nextQuestion, 30000);
        } else {
            // End quiz after filling in the last question
            alert('Quiz Completed');
        }
    }

    // Handle button clicks for answer selection (ABC)
    answerButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Disable all buttons after one is clicked
            answerButtons.forEach(btn => {
                btn.disabled = true;
            });

            // Check if the answer is correct or incorrect
            if (button.textContent.includes(correctAnswer)) {
                // Correct answer (in this case, 'C')
                button.classList.add('bg-green-500', 'text-white');  // Green for correct answer
                button.classList.remove('bg-gray-200');
            } else {
                // Incorrect answer
                button.classList.add('bg-red-500', 'text-white');  // Red for incorrect answer
                button.classList.remove('bg-gray-200');
            }

            // Enable next button
            nextButton.disabled = false;
        });
    });

    // Handle next and previous button actions
    nextButton.addEventListener('click', () => {
        nextQuestion();
    });

    prevButton.addEventListener('click', () => {
        // Go back to the previous question if necessary
        if (currentQuestion > 1) {
            fillInQuestion.classList.add('hidden');
            document.querySelector('#question-container').classList.remove('hidden');
            currentQuestion = 1;
        }
    });
});
