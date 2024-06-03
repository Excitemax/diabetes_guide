<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
<header>
        <h1>Fakta Seputar Diabetes yang Mesti Diketahui<h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
            <a href="facts.php">Facts</a>
            <a href="news.php">News</a>
        </nav>
    </header>
</body>
</html>
=======
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validasi input
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Mengirim email (atau menyimpan ke database)
        $to = "your_email@example.com"; // Ganti dengan alamat email Anda
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            header("Location: thank_you.php");
            exit();
        } else {
            echo "There was a problem sending your message. Please try again.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
>>>>>>> Stashed changes
