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
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                    Masukkan Email Yang Valid!
                </div>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    Masukkan Password Yang Benar!
                </div>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <div class="form-group">
                <label for="captcha">Captcha:</label>
                <input type="text" id="captcha" name="captcha" required>
            </div>
            <div class="form-group">
                <img src="captcha.php" alt="Captcha Image">
            </div>
            <div class="error-message" id="error-message"></div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <!-- JavaScript untuk validasi captcha -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var captchaInput = document.getElementById("captcha");
            var errorMessage = document.getElementById("error-message");

            captchaInput.addEventListener("blur", function () {
                var userCaptcha = captchaInput.value.toLowerCase();
                getCaptchaTextFromServer().then(function (captchaText) {
                    if (userCaptcha !== captchaText.toLowerCase()) {
                        errorMessage.textContent = "Captcha yang Anda masukkan salah.";
                    } else {
                        errorMessage.textContent = ""; // Bersihkan pesan kesalahan jika captcha benar
                    }
                });
            });

            // Function to get captcha text from the server
            function getCaptchaTextFromServer() {
                // Menggunakan fetch untuk mengambil teks captcha dari server
                return fetch("captcha.php")
                    .then((response) => response.text());
            }
        });
    </script>

    <!-- Example starter JavaScript for disabling form submissions if there are invalid fields -->
    <script>
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>
