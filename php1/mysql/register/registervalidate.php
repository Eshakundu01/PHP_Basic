<?php

require '../class-mail.php';
require '../class-password.php';
require '../userdb.php';


$error = array('mail_error' => '', 'pass_error' => '', 'register_error' => '');

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $emailid = $_POST['email'];
  $pass = $_POST['pass'];

  $pass_obj = new Password($pass);
  $error['pass_error'] = $pass_obj->checkPassword();

  // Validating the entered password with the re-entered password
  if ($pass != $_POST['confirm']) {
    $error['pass_error'] = "Please enter the same password!";
  }

  // Validating and verifying the email address
  $mail_obj = new Mail($emailid);
  $error['mail_error'] = $mail_obj->errorCheck();
  if ($error['mail_error'] == false) {
    if ($mail_obj->verifyMail()) {
      $error['mail_error'] = $mail_obj->verifyMail();
    }
  }

  if (array_filter($error)) {
    // echo "prints errors after submit";
  } else {
    if ($mail_obj->sendMail() == "") {
      // sql to create table
      $sql = "insert into Users values ('$user', '$emailid', '$pass')";
      try {
        if ($conn->query($sql) === TRUE) {
          header("Location:../login/login.php");
        } else {
          echo "Error creating table: " . $conn->error;
        }
      } catch (Exception $e) {
        $error['register_error'] = "You are already a registered user, try login into the page!";
      }

      $conn->close();
    }
  }
}


?>