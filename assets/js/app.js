document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('matrixForm');
    const resultsWrapper = document.getElementById('resultsWrapper');
    const themeToggle = document.getElementById('themeToggle');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = submitBtn.querySelector('.btn-text');
    const spinner = submitBtn.querySelector('.spinner');

    // --- Theme Controller ---
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);

    themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });

    // --- Client-Side Form Validation ---
    const validateForm = () => {
        let isValid = true;
        
        // Reset Error Assertions
        document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');

        const numbersInput = document.getElementById('numbers');
        const startInput = document.getElementById('rangeStart');
        const endInput = document.getElementById('rangeEnd');

        if (!numbersInput.value.trim()) {
            document.getElementById('error-numbers').textContent = 'Please provide target integer values.';
            isValid = false;
        }

        if (parseInt(startInput.value) < 1) {
            document.getElementById('error-rangeStart').textContent = 'Must be greater than 0.';
            isValid = false;
        }

        if (parseInt(endInput.value) > 100) {
            document.getElementById('error-rangeEnd').textContent = 'Limit system ceiling to 100.';
            isValid = false;
        }

        if (parseInt(startInput.value) > parseInt(endInput.value)) {
            document.getElementById('error-rangeStart').textContent = 'Cannot exceed End Range value.';
            isValid = false;
        }

        return isValid;
    };

    // --- AJAX Pipeline Handler ---
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!validateForm()) return;

        // Visual loading configuration state toggling
        btnText.textContent = 'Processing Engine...';
        spinner.classList.remove('hidden');
        submitBtn.disabled = true;

        const formData = new FormData(form);

        try {
            const response = await fetch('includes/generator.php', {
                method: 'POST',
                body: formData
            });

            const htmlResponse = await response.text();

            if (!response.ok) {
                // Renders backend structural server error payload elegantly
                resultsWrapper.innerHTML = htmlResponse;
            } else {
                resultsWrapper.innerHTML = htmlResponse;
            }
        } catch (error) {
            resultsWrapper.innerHTML = `
                <div class="alert-box error">
                    <p>🚨 Connection Failure: Could not establish connection to the computing matrix module engine.</p>
                </div>`;
        } finally {
            // Restore visual layout control states back to static
            btnText.textContent = 'Generate Matrices';
            spinner.classList.add('hidden');
            submitBtn.disabled = false;
        }
    });
});