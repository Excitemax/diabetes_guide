<!DOCTYPE html>
<html>
<head>
    <title>Register - Website Kesehatan</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
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
