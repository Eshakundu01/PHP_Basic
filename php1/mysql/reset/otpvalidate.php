<?php

session_start();

$error = "";

if (isset($_POST['submit'])) {
  if ($_POST['otp'] == $_SESSION['code']) {
    header('Location:reset.php');
  } else {
    $error = "Incorrect OTP entered";
  } 
}

if (isset($_POST['resend'])) {
  header('Location:forgot.php');
}

?>