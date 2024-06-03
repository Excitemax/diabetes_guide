document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');

    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            let errors = [];

            if (username.length < 3) {
                errors.push("Username must be at least 3 characters long.");
            }

            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                errors.push("Invalid email format.");
            }

            if (password.length < 6) {
                errors.push("Password must be at least 6 characters long.");
            }

            if (password !== confirmPassword) {
                errors.push("Passwords do not match.");
            }

            if (errors.length > 0) {
                e.preventDefault();
                const errorContainer = document.getElementById('registerErrors');
                errorContainer.innerHTML = errors.join('<br>');
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;

            let errors = [];

            if (username.length < 3) {
                errors.push("Username must be at least 3 characters long.");
            }

            if (password.length < 6) {
                errors.push("Password must be at least 6 characters long.");
            }

            if (errors.length > 0) {
                e.preventDefault();
                const errorContainer = document.getElementById('loginErrors');
                errorContainer.innerHTML = errors.join('<br>');
            }
        });
    }
});
