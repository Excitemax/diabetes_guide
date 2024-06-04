<?php include '../db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/style2.css">
</head>
<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="../index.php">Home</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Login</h2>
            <form id="loginForm" method="POST" action="login.php">
                <label for="loginUsername">Username:</label><br>
                <input type="text" id="loginUsername" name="username" required><br>
                <label for="loginPassword">Password:</label><br>
                <input type="password" id="loginPassword" name="password" required><br>
                <input type="submit" name="submit" value="Login">
                <div id="loginErrors" class="error"></div>
            </form>
        </section>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    echo "Login successful";
                } else {
                    echo "<div class='error'>Invalid password</div>";
                }
            } else {
                echo "<div class='error'>No user found with that username</div>";
            }
        }
        ?>
    </main>
    <script src="../script.js"></script>
</body>
</html>
