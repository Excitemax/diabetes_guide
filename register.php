<?php include 'C:/xampp/htdocs/diabetes_guide/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>
    <main>
        <h2>Register</h2>
        <form id="registerForm" method="POST" action="register.php">
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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $conn->real_escape_string($_POST["username"]);
            $email = $conn->real_escape_string($_POST["email"]);
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];

            // Validasi Password
            if ($password !== $confirmPassword) {
                echo "<div class='error'>Passwords do not match.</div>";
                
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='success'>New user registered successfully</div>";
                    echo "<a href='login.php'>Login sekarang</a>";
                } else {
                    echo "<div class='error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }
            }
        }
        ?>
    </main>
    <script src="../script.js"></script>
</body>
</html>
