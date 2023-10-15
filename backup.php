<?php
session_start();

// Simpan username/email dan password yang sah dalam variabel
$validUsername = "user@example.com";
$validPassword = "password123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validasi username/email dan password
    if ($username === $validUsername && $password === $validPassword) {
        // Autentikasi berhasil, arahkan ke halaman lain atau set session di sini
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Ganti dengan halaman yang sesuai
        exit();
    } else {
        // Autentikasi gagal, tampilkan pesan kesalahan
        $error_message = "Username/email or password is incorrect.";
    }
}
?>