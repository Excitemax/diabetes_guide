<?php
session_start();

// Dummy data untuk username dan password
$valid_username = "user";
$valid_password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>

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