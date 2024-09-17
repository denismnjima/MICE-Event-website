document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const formContainer = document.querySelector('.contact-form'); // Reference to form container

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        const errors = document.querySelectorAll('.error');
        
        // Clear any previous error messages
        errors.forEach(error => error.remove());

        fetch('services/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Replace the form with a success message
                formContainer.innerHTML = `
                    <div class="success-message">
                        <i class="bi bi-check-circle-fill" style="font-size: 2rem; color: green;"></i>
                        <h2>Registration Successful!</h2>
                        <p>Thank you for registering for the Africa MICU Summit. You will receive a confirmation email shortly.</p>
                    </div>
                `;
            } else {
                // Show field-specific error messages
                if (data.errors) {
                    for (const [field, message] of Object.entries(data.errors)) {
                        const input = document.querySelector(`#${field}`);
                        const errorElement = document.createElement('span');
                        errorElement.classList.add('error');
                        errorElement.style.color = 'red';
                        errorElement.textContent = message;
                        input.insertAdjacentElement('afterend', errorElement);
                    }
                }
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
