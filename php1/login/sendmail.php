<?php

require 'class-mail.php';
$error = "";

if (isset($_POST['submit'])) {
  $mail_obj = new Mail($_POST['mail']);
  $error = $mail_obj->errorCheck();
  if ($error == false) {
		if ($mail_obj->otpSend() == "") {
      header("Location:otp.php");
      $_SESSION['id'] = $_POST['mail'];
    }
  }
}

?>