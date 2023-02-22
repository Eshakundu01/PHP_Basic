<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../login/login.php');
    $_SESSION['question']  =  "Q1";
  }
}

require '../class-name.php';

$errors = array('fname_error' => '', 'lname_error' => '');

if (isset($_POST['submit'])) {   
  $name = new Name();
  //Validating and storing the errors in an array
  $errors['fname_error'] = $name->checkName($_POST["fname"]);
  $errors['lname_error'] = $name->checkName($_POST["lname"]);
  if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
    $full_name = $name->fullName($_POST["fname"], $_POST["lname"]);
  }

  if (array_filter($errors)) {
    //echo "errors present";
  } else {
    $_SESSION['fullname'] = $full_name;
    header ("Location:final_page.php");
  }
}

?>