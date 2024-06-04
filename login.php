<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/style1.css">
</head>
<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>
    <main>
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="login.php">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="submit" value="Login">
            <div id="loginErrors" class="error"></div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $conn->real_escape_string($_POST["email"]);
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    echo "<div class='success'>Login successful</div>";
                    // Set session variables or redirect to another page
                } else {
                    echo "<div class='error'>Incorrect password</div>";
                }
            } else {
                echo "<div class='error'>No user found with that email</div>";
            }
        }
        ?>
    </main>
    <script src="../script.js"></script>
</body>
</html>
