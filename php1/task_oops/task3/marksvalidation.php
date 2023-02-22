<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../login/login.php');
    $_SESSION['question']  =  "Q3";
  }
}

require '../class-name.php';
require '../class-image.php';
require '../class-marks.php';

$errors = array('fname_error' => '', 'lname_error' => '','img_error' => '','grade_error' => '');

if (isset($_POST["submit"])) {
  $name = new Name();
  // Validating and storing error occurred in the name in an array
  $errors['fname_error'] = $name->checkName($_POST["fname"]);
  $errors['lname_error'] = $name->checkName($_POST["lname"]);
  if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
    $full_name = $name->fullName($_POST["fname"], $_POST["lname"]);
  }

  // Initialized variables for image
  $file_dir = "../uploads/";
  // Validating the image file and storing the image in a folder
  $upload = new Image($_FILES["image"]["size"], $_FILES["image"]["name"], $file_dir, $_FILES["image"]["tmp_name"]);
  $errors['img_error'] = $upload->checkImage();
  if ($errors['img_error'] == false) {
    $file_store = $upload->storeImage();
  }

  // Validating the marks entered and dividing into subject and marks array
  $score  = new Marks($_POST["score"]);
  $errors['grade_error']  = $score->checkPattern();
  if ($errors['grade_error'] == false) {
    $subject  = $score->subjectArray();
    $grade  = $score->marksArray();
  }

  if (array_filter($errors)) {
    // echo "errors present";
  } else {
    $_SESSION['file'] = $file_store;
    $_SESSION['fullname'] = $full_name;
    $_SESSION['grade'] = $grade;
    $_SESSION['subject'] = $subject;
    header ("Location:final_page.php");
  }
}

?>