<?php

session_start();

require '../class-mail.php';
require '../userdb.php';

$error = "";

if (isset($_POST['submit'])) {
  $sql = "select email from Users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $mail[] = $row['email'];
    }
  } 

  $mail_obj = new Mail($_POST['mail']);
  $error = $mail_obj->errorCheck();
  if ($error == false) {
    if (in_array($_POST['mail'], $mail)) {
      $otp = rand(1000, 9999);
      if ($mail_obj->otpSend($otp) == "") {
        header("Location:otp.php");
        $_SESSION['code'] = $otp;
        $_SESSION['id'] = $_POST['mail'];
      }
    } else {
      $error = "Not registered mail address entered!";
    }
  }

  $conn->close();
}

?>