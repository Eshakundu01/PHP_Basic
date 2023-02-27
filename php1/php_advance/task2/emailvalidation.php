<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../login/login.php');
    $_SESSION['question']  =  "A2";
  }
}

require 'class-email.php';

$mail_error = "";

if (isset($_POST["submit"])) {

  // Validating and verifying the email address
  $email = $_POST['mail'];
  $mail_obj = new Mail($_POST["mail"]);
  $mail_error = $mail_obj->errorCheck();
  if ($mail_error == false) {
		if ($mail_obj->verifyMail()) {
      $mail_error = $mail_obj->verifyMail();
    } else {
      $mail_obj->sendMail();
    }
	}
}

?>