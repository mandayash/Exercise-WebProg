document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('dataForm');
    const nameInput = document.getElementById('name');
    const studentIdInput = document.getElementById('studentId');
    const errorMessage = document.getElementById('errorMessage');
    const submitButton = document.getElementById('dataFormSubmit');

    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent form submission
        
        // Reset error states
        errorMessage.classList.add('hidden');
        nameInput.classList.remove('border-red-500');
        studentIdInput.classList.remove('border-red-500');
        
        // Get input values and trim whitespace
        const name = nameInput.value.trim();
        const studentId = studentIdInput.value.trim();
        
        // Validate inputs
        if (!name || !studentId) {
            // Show error message
            errorMessage.classList.remove('hidden');
            errorMessage.textContent = 'Please fill in all fields';
            
            // Highlight empty fields
            if (!name) {
                nameInput.classList.add('border-red-500');
            }
            if (!studentId) {
                studentIdInput.classList.add('border-red-500');
            }
            
            return; // Stop form submission
        }
        
        // If validation passes:
        // 1. Store the data in localStorage
        localStorage.setItem('userName', name);
        localStorage.setItem('studentId', studentId);
        
        // 2. Redirect to quiz page
        window.location.href = 'soal.php';
    });

    // Add input event listeners to remove error styling when user types
    nameInput.addEventListener('input', () => {
        nameInput.classList.remove('border-red-500');
        if (nameInput.value.trim() && studentIdInput.value.trim()) {
            errorMessage.classList.add('hidden');
        }
    });

    studentIdInput.addEventListener('input', () => {
        studentIdInput.classList.remove('border-red-500');
        if (nameInput.value.trim() && studentIdInput.value.trim()) {
            errorMessage.classList.add('hidden');
        }
    });
});
