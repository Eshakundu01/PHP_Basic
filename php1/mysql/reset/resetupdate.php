<?php

session_start();
$mail = $_SESSION['id'];

require '../class-password.php';
require '../userdb.php';

$pass_error = "";

if (isset($_POST['submit'])) {

	$pass = $_POST['pass'];

  $pass_obj = new Password($pass);
  $pass_error = $pass_obj->checkPassword();

  // Validating the entered password with the re-entered password
  if ($pass != $_POST['confirm']) {
    $pass_error = "Please enter the same password!";
  }

	if ($pass_error) {
    // echo "prints errors after submit";
  } else {
    $sql = "update Users set passcode='$pass' where email='$mail'";
    if ($conn->query($sql) === TRUE) {
      header("Location:../login/login.php");
    } else {
      echo "Error creating table: " . $conn->error;
    }
  }
}

?>