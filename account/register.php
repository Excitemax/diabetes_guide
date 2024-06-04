<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Diabetes_guide</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
    <header>
        <h1>Diabetes Guidelines</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="account/register.php">Register</a>
            <a href="account/login.php">Login</a>
            <a href="contact.php">Contact</a>
            <a href="facts.php">Facts</a>
            <a href="news.php">News</a>
        </nav>
    </header>
    <div class="login-container">
        <h2>Register</h2>
        <form action="register_process.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="index.php">Login</a></p>
    </div>


</body>
</html>

