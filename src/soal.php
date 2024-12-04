<?php
session_start();

$questions = [
    [
        'type' => 'multiple choice',
        'number'=> 1,
        'text'=> 'Apa saja yang tidak termasuk dalam Database Transformation?',
        'options'=> [
            'A'=> 'Attribute Expansion',
            'B'=> 'Compund Attribute Split',
            'C'=> 'Entity Type Expansion',
            'D'=> 'Combine Attribute'
            ],
        'correct_answer'=> 'C'
    ],
    [
        'type'=> 'multiple choice',
        'number'=> 2,
        'text'=> 'Apa yang termasuk Reverse Transformation?',
        'options'=> [
            'A'=> 'Contract Entity Type',
            'B'=> 'Attribute Expansion',
            'C'=> 'Compund Attribute Split',
            'D'=> 'Entity Type Expansion'
        ],
        'correct_answer'=> 'A'
    ],
    [
        'type'=> 'fill_in_the_blank',
        'number'=> 3,
        'text'=> 'Jelaskan apa tujuan dari Weak to Strong Entity type!',
        'min_length'=> 50
    ]
];


if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
    $_SESSION['answers'] = [];
}

$current_question_index = $_SESSION['current_question'];
$current_question = $questions[$current_question_index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quitzy - Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="/src/output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-teks px-6 py-4">
    <main class="mt-24 container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold mb-8 text-center">Quiz Time!</h1>
            
            <form method="POST" action="soal.php" id="soal">
                <!-- First Multiple Choice Question -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <!-- Question Number -->
                    <div class="text-sm text-gray-600 mb-4">Question 1 of 3</div>
                    
                    <!-- Question -->
                    <div class="text-xl font-semibold mb-6">Apa saja yang tidak termasuk dalam Database Transformation?</div>
                    
                    <!-- Options -->
                    <div class="space-y-4">
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="A">
                            A. Attribute Expansion
                        </button>
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="B">
                            B. Compund Attribute Split
                        </button>
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="C">
                            C. Entity Type Expansion
                        </button>
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="D">
                            D. Combine Attribute
                        </button>
                    </div>
                </div>

                <!-- Second Multiple Choice Question -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6 hidden">
                    <!-- Question Number -->
                    <div class="text-sm text-gray-600 mb-4">Question 2 of 3</div>
                    
                    <!-- Question -->
                    <div class="text-xl font-semibold mb-6">Apa yang termasuk Reverse Transformation?</div>
                    
                    <!-- Options -->
                    <div class="space-y-4">
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="A">
                            A. Contract Entity Type
                        </button>
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="B">
                            B. Attribute Expansion
                        </button>
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="C">
                            C. Compund Attribute Split
                        </button>
                        <button type="button" class="answer-btn w-full text-left p-4 rounded-lg border-2 border-gray-200 hover:border-[#82C596] transition-colors" data-option="D">
                            D. Entity Type Expansion
                        </button>
                    </div>
                </div>

                <!-- Fill in the Blank Question -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6 hidden">
                    <!-- Question Number -->
                    <div class="text-sm text-gray-600 mb-4">Question 3 of 3</div>
                    
                    <!-- Question Type Badge -->
                    <div class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded mb-4">
                        Isian
                    </div>
                    
                    <!-- Question -->
                    <div class="text-xl font-semibold mb-6">
                        Jelaskan apa tujuan dari Weak to Strong Entity type!
                    </div>
                    
                    <!-- Text Input -->
                    <div class="space-y-2">
                        <textarea 
                            name="fill_in_answer"
                            class="w-full p-4 rounded-lg border-2 border-gray-200 focus:border-[#82C596] focus:ring-0 transition-colors min-h-[120px] resize-y"
                            placeholder="Ketik jawaban Anda di sini..."
                            minlength="50"
                            required></textarea>
                        <div class="text-sm text-gray-500">
                            Minimal 50 karakter
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" id="prev-btn" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors disabled:opacity-50" disabled>
                        Previous
                    </button>
                    <button type="submit" id="next-btn" class="bg-[#82C596] text-white px-6 py-2 rounded-lg hover:bg-[#6BAF7F] transition-colors" disabled>
                        Next
                    </button>
                </div>

                <!-- Hidden input to track current question -->
                <input type="hidden" name="current_question" value="0">
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const questions = document.querySelectorAll('.bg-white');
            const nextBtn = document.getElementById('next-btn');
            const prevBtn = document.getElementById('prev-btn');
            let currentQuestionIndex = 0;

            function updateQuestionVisibility() {
                questions.forEach((question, index) => {
                    question.classList.toggle('hidden', index !== currentQuestionIndex);
                });

                // Update navigation buttons
                prevBtn.disabled = currentQuestionIndex === 0;
                nextBtn.disabled = true;
                nextBtn.textContent = currentQuestionIndex === questions.length - 1 ? 'Finish' : 'Next';
            }

            // Answer button handling
            questions.forEach(question => {
                const answerButtons = question.querySelectorAll('.answer-btn');
                const textarea = question.querySelector('textarea');

                // Multiple choice handling
                if (answerButtons.length > 0) {
                    answerButtons.forEach(btn => {
                        btn.addEventListener('click', () => {
                            answerButtons.forEach(b => b.classList.remove('border-[#82C596]', 'bg-green-50'));
                            btn.classList.add('border-[#82C596]', 'bg-green-50');
                            nextBtn.disabled = false;
                        });
                    });
                }

                // Textarea handling
                if (textarea) {
                    textarea.addEventListener('input', () => {
                        nextBtn.disabled = textarea.value.length < 50;
                    });
                }
            });

            // Next button handling
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentQuestionIndex < questions.length - 1) {
                    currentQuestionIndex++;
                    updateQuestionVisibility();
                } else {
                    // Submit form when on last question
                    document.querySelector('form').submit();
                }
            });

            // Previous button handling
            prevBtn.addEventListener('click', () => {
                if (currentQuestionIndex > 0) {
                    currentQuestionIndex--;
                    updateQuestionVisibility();
                }
            });

            // Initial setup
            updateQuestionVisibility();
        });
    </script>
</body>
</html>















