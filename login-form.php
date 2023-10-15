<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username/Email:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="captcha">Captcha:</label>
                <input type="text" id="captcha" name="captcha" required>
                <!-- Generate and display the captcha here using JavaScript -->
            </div>
            <div class="form-group">
                <img src="captcha.php" alt="Captcha Image">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="error-message" id="error-message"></div>
    </div>
    <script src="script.js"></script>
</body>

</html>