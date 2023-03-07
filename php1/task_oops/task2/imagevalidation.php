<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../mysql/login/login.php');
    $_SESSION['question']  =  "Q2";
  }
}

require '../class-name.php';
require '../class-image.php';

$errors = array('fname_error' => '', 'lname_error' => '','img_error' => '');

if (isset($_POST["submit"])) {
  $name = new Name();
  // Validating and storing the errors that occured in name in an array
  $errors['fname_error'] = $name->checkName($_POST["fname"]);
  $errors['lname_error'] = $name->checkName($_POST["lname"]);
  if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
    $full_name = $name->fullName($_POST["fname"], $_POST["lname"]);
  }

  // Validating the image size and format then storing in a folder
  $file_dir = '../uploads/';
  $upload = new Image($_FILES["image"]["size"], $_FILES["image"]["name"], $file_dir, $_FILES["image"]["tmp_name"]);
  $errors['img_error'] = $upload->checkImage();
  if ($errors['img_error'] == false) {
    $file_store = $upload->storeImage();
  }

  if (array_filter($errors)) {
    // echo "errors present";
  } else {
    $_SESSION['file'] = $file_store;
    $_SESSION['fullname'] = $full_name;
    header ("Location:preview.php");
  }
}

?>