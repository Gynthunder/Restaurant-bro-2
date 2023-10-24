<?php
session_start();
if(!empty($_SESSION['username_rm'])){
    header('location:home');
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- login_form.php -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>RM. Mandi Angin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="asset/css/login.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST" id="login-form">
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Silahkan Log In</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="username"
                    placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback"> Masukkan Email Yang Valid! </div>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback"> Masukkan Password Yang Benar! </div>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <!-- Pertanyaan Keamanan -->
            <label for="security_question">Apa hasil dari 5 + 3?</label>
            <input type="text" id="security_question" name="security_question" required><br><br>

            <!-- Honeypot Field -->
            <div style="display:none;">
                <label for="honeypot">Leave this field blank:</label>
                <input type="text" id="honeypot" name="honeypot">
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit_validation" value="abcd">Log
                In</button>


            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>


        </form>

        <!-- Tombol untuk membuka formulir pendaftaran -->
        <button type="button" class="btn btn-secondary mt-3" data-bs-toggle="modal" data-bs-target="#registerModal">
            Register
        </button>

        <!-- Modal Formulir Pendaftaran -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Formulir Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Pendaftaran -->
                        <form action="proses/register_process.php" method="POST">
                            <div class="mb-3">
                                <label for="namadepan" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="namadepan" name="namadepan" required>
                            </div>
                            <div class="mb-3">
                                <label for="namabelakang" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="namabelakang" name="namabelakang" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username/Email</label>
                                <input type="email" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="registerPassword" name="password"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="ttl" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="ttl" name="ttl" required>
                            </div>
                            <div class="mb-3">
                                <label for="kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="kelamin" name="kelamin" required>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <!-- Akhir Formulir Pendaftaran -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Example starter JavaScript for disabling form submissions if there are invalid fields -->
    <script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>



</body>

</html>