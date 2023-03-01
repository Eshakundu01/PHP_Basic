<?php

session_start();

$error = "";

if (isset($_POST['submit'])) {
  if ($_POST['otp'] == $_SESSION['pin']) {
    header('Location:reset.php');
  } else {
    $error = "Incorrect OTP entered";
  }
}
?>