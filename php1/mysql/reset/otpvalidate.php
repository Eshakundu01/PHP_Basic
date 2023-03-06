<?php

require '../class-mail.php';

$error = "";

if (isset($_POST['submit'])) {
  if ($_POST['otp'] == $_SESSION['pin']) {
    header('Location:reset.php');
  } else {
    $error = "Incorrect OTP entered";
  }
}

if (isset($_POST['resend'])) {
  $mail_obj = new Mail($_SESSION['id']);
  $mail_obj->otpSend();
}
?>