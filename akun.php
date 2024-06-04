<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes</title>
    <link rel="stylesheet" type="text/css" href="assets/style4.css">
</head>
<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="nutrition.php">Nutrition</a>
            <a href="contact.php">Contact</a>
            <a href="facts.php">Facts</a>
            <a href="news.php">News</a>
            <a href="akun.php">Akun</a>
        </nav>
    </header>
    <section>
        <div class="form">
            <h2>LOGIN</h2>
            <form id="loginForm" method="POST" action="akun.php">
                <input type="email" name="email" placeholder="Masukkan email di sini" required>
                <input type="password" name="password" placeholder="Masukkan password di sini" required>
                <input type="submit" class="btn" value="Login">
            </form>
            <p class="link">Tidak punya akun<br>
                <a href="register.php">Daftar di sini</a>
            </p>
            <div id="loginErrors" class="error">
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
                            // session_start();
                            // $_SESSION['user_id'] = $row['id'];
                            // header("Location: index.php");
                            // exit();
                        } else {
                            echo "<div class='error'>Incorrect password</div>";
                        }
                    } else {
                        echo "<div class='error'>No user found with that email</div>";
                    }
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
