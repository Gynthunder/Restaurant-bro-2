<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namadepan = mysqli_real_escape_string($conn, $_POST['namadepan']);
    $namabelakang = mysqli_real_escape_string($conn, $_POST['namabelakang']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
    $ttl = mysqli_real_escape_string($conn, $_POST['ttl']);
    $kelamin = mysqli_real_escape_string($conn, $_POST['kelamin']);

    // Query untuk memasukkan data pengguna ke dalam tabel
    $query = "INSERT INTO tb_user (namadepan, namabelakang, username, password, ttl, kelamin) VALUES ('$namadepan', '$namabelakang', '$username', '$password', '$ttl', '$kelamin')";

    if (mysqli_query($conn, $query)) {
        // Registrasi sukses, arahkan pengguna ke halaman login
        header("Location: ../login.php");
        exit();
    } else {
        // Registrasi gagal, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>