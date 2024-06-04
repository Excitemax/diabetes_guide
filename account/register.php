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
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "New user registered successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </main>
    <script src="script.js"></script>
</body>
</html>
