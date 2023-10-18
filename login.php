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
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com"
                    required>
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

            <div class="form-group">
                <label for="captcha">Captcha:</label>
                <input type="text" id="captcha" name="captcha" required>
                <img src="captcha.php" alt="Captcha Image" id="captcha-image">
            </div>

            <div class="error-message" id="error-message"></div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>

            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>

            <script>
            document.addEventListener("DOMContentLoaded", function() {
                const loginForm = document.getElementById("login-form");
                const captchaInput = document.getElementById("captcha");
                const errorMessage = document.getElementById("error-message");
                const captchaImage = document.getElementById("captcha-image");

                // Attach a click event listener to the captcha image to reload it
                captchaImage.addEventListener("click", function() {
                    loadCaptchaImage();
                    captchaInput.value = "";
                });

                // Attach a submit event listener to the login form
                loginForm.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    // Prevent the form from submitting initially
                    const userCaptcha = captchaInput.value.toLowerCase();

                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "validate_captcha.php");
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);

                            if (response.success) {
                                // If the captcha is correct, submit the form
                                loginForm.submit();
                            } else {
                                // If the captcha is incorrect, display an error message
                                errorMessage.textContent = "Captcha yang Anda masukkan salah.";
                                captchaInput.value = "";
                                loadCaptchaImage();
                            }
                        }
                    };
                    xhr.send("captcha=" + userCaptcha);
                });

                // Function to load the captcha image
                function loadCaptchaImage() {
                    captchaImage.setAttribute("src", "captcha.php?" + new Date().getTime());
                }
            });
            </script>
        </form>
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
</body>

</html>