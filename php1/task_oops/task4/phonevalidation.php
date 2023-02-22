<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../login/login.php');
    $_SESSION['question']  =  "Q4";
  }
}

require '../class-name.php';
require '../class-image.php';
require "../class-marks.php";
require '../class-number.php';

$errors = array(
  'fname_error' => '', 
  'lname_error' => '',
  'img_error' => '',
  'grade_error' => '',
  'phone_error' => ''
);

if (isset($_POST["submit"])) {
  $name = new Name();
  // Validating and storing the errors occurred in name in an array
  $errors['fname_error'] = $name->checkName($_POST["fname"]);
  $errors['lname_error'] = $name->checkName($_POST["lname"]);
  if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
    $full_name = $name->fullName($_POST["fname"], $_POST["lname"]);
  }

  // Initialized variables for image
  $file_dir = "../uploads/";

  $upload = new Image($_FILES["image"]["size"], $_FILES["image"]["name"], $file_dir, $_FILES["image"]["tmp_name"]);
  $errors['img_error'] = $upload->checkImage();
  if ($errors['img_error'] == false) {
    $file_store = $upload->storeImage();
  }

  // Checking the marks pattern and dividing into subject and marks array
  $score  = new Marks($_POST["score"]);
  $errors['grade_error']  = $score->checkPattern();
  if ($errors['grade_error'] == false) {
    $subject  = $score->subjectArray();
    $grade  = $score->marksArray();
  }

  // Initialized an object for Number class and validating the phone number
  $num_obj = new Number();
  $errors['phone_error'] = $num_obj->checkNumber($_POST["code"], $_POST["number"]);
  if ($errors['phone_error'] == false) {
    $phone_number = $num_obj->contactNumber($_POST["code"], $_POST["number"]);
  }

  if (array_filter($errors)) {
    // echo "errors present";
  } else {
    $_SESSION['file']  =  $file_store;
    $_SESSION['fullname']  =  $full_name;
    $_SESSION['grade']  =  $grade;
    $_SESSION['subject']  =  $subject;
    $_SESSION['ph_no']  =  $phone_number;
    header ("Location:final_page.php");
  }
}

?>