document.addEventListener("DOMContentLoaded", function () {
  const loginForm = document.getElementById("login-form");
  const captchaInput = document.getElementById("captcha");
  const errorMessage = document.getElementById("error-message");
  const captchaImage = document.getElementById("captcha-image");

  // Attach a submit event listener to the login form
  loginForm.addEventListener("submit", async function (event) {
    event.preventDefault(); // Prevent the form from submitting initially

    const userCaptcha = captchaInput.value.toLowerCase();
    const expectedCaptcha = captchaImage
      .getAttribute("data-expected-captcha")
      .toLowerCase();

    if (userCaptcha === expectedCaptcha) {
      // If the captcha is correct, submit the form
      loginForm.submit();
    } else {
      // If the captcha is incorrect, display an error message
      errorMessage.textContent = "Captcha yang Anda masukkan salah.";
    }
  });
});
