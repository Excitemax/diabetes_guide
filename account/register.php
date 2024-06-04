<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="../index.php">Home</a>
        </nav>
    </header>
    <h2>Register</h2>
    <form id="registerForm" method="POST" action="register.php" onsubmit="return validateForm()">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br>
        <input type="submit" name="submit" value="Register">
        <div id="registerErrors" class="error"></div>
    </form>

    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const errors = document.getElementById('registerErrors');

            if (password.length < 6) {
                errors.textContent = 'Password must be at least 6 characters long.';
                return false;
            }

            if (password !== confirmPassword) {
                errors.textContent = 'Passwords do not match.';
                return false;
            }

            return true;
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        // Server-side validation
        if (strlen($password) < 6) {
            echo "Password must be at least 6 characters long.";
        } elseif ($password !== $confirmPassword) {
            echo "Passwords do not match.";
        } else {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);

            // Assuming you have already created a connection to the database as $conn
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHash')";
            if ($conn->query($sql) === TRUE) {
                echo "New user registered successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>
</main>
    <script src="script.js"></script>
</body>
</html>
