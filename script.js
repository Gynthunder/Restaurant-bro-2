document.addEventListener("DOMContentLoaded", function () {
  // Function to validate the captcha
  function validateCaptcha() {
    const captchaInput = document.getElementById("captcha");
    const captchaValue = captchaInput.value.toLowerCase();

    // Mengambil teks captcha dari server
    getCaptchaTextFromServer();

    // Return true sementara menunggu respons dari server
    // Validasi captcha sebenarnya akan dilakukan setelah mendapatkan teks captcha dari server
    return true;
  }

  // Function to get captcha text from the server
  function getCaptchaTextFromServer() {
    // Menggunakan fetch untuk mengambil teks captcha dari server
    fetch("captcha.php")
      .then((response) => response.text())
      .then((captchaText) => {
        // Membandingkan captcha yang diinput dengan captcha yang diharapkan dari server
        const captchaInput = document.getElementById("captcha");
        const captchaValue = captchaInput.value.toLowerCase();
        if (captchaValue !== captchaText.toLowerCase()) {
          document.getElementById("error-message").textContent =
            "Captcha is incorrect.";
        }
      });
  }

  // Attach a submit event listener to the login form
  const loginForm = document.getElementById("login-form");
  loginForm.addEventListener("submit", function (event) {
    // Validate the captcha before submitting the form
    if (!validateCaptcha()) {
      event.preventDefault();
    }
  });
});
