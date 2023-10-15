<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fungsi untuk meng-generate teks captcha
function generateCaptchaText() {
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $captchaText = "";
    $length = 8;

    for ($i = 0; $i < $length; $i++) {
        $captchaText .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $captchaText;
}

// Generate captcha text
$captchaText = generateCaptchaText();

// Simpan captcha text dalam session
$_SESSION["captcha"] = $captchaText;

// Buat gambar captcha
$captchaImage = imagecreatetruecolor(100, 30);
$bgColor = imagecolorallocate($captchaImage, 255, 255, 255);
$textColor = imagecolorallocate($captchaImage, 0, 0, 0);

imagefilledrectangle($captchaImage, 0, 0, 99, 29, $bgColor);
imagestring($captchaImage, 5, 10, 5, $captchaText, $textColor);

// Set header untuk tampilan gambar captcha
header("Content-Type: image/png");

// Tampilkan gambar captcha
imagepng($captchaImage);

// Hapus gambar dari memori
imagedestroy($captchaImage);
?>