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
// Ambil teks captcha dari session
$captchaText = isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';

// Ambil teks captcha yang diinput oleh pengguna
$userInput = isset($_POST['captcha_input']) ? $_POST['captcha_input'] : '';

// Bandingkan teks captcha yang diinput oleh pengguna dengan yang disimpan di session
if (strtolower($userInput) == strtolower($captchaText)) {
    // Captcha benar
    echo "Captcha benar!";
} else {
    // Captcha salah
    echo "Captcha salah!";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form>
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>



</body>

</html>