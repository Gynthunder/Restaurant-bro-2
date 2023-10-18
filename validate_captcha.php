<?php
session_start();

if (isset($_POST['captcha'])) {
  $userCaptcha = strtolower($_POST['captcha']);
  $expectedCaptcha = strtolower($_SESSION['captcha']);

  if ($userCaptcha === $expectedCaptcha) {
    // If the captcha is correct, set the success property to true
    $response = array('success' => true);
  } else {
    // If the captcha is incorrect, set the success property to false
    $response = array('success' => false);
  }

  // Send the response as JSON
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>