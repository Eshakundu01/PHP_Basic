<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../login/login.php');
    $_SESSION['question']  =  "q3";
  }
}

$first_name = "";
$last_name = "";
$errors = array('fname_error' => '', 'lname_error' => '','img_error' => '','grade_error' => '');

if (isset($_POST["submit"])) {

  //Validates first and last name
  if (empty($_POST["fname"])) {  
    $errors['fname_error'] = "Please enter your first name";
  } elseif (!preg_match("/^[a-zA-Z]*$/", $_POST["fname"])) {
    $errors['fname_error'] = "Only alphabets are allowed";
  } elseif (strlen($_POST["fname"]) >= 35) {
    $errors['fname_error'] = "First name can contain maximum 35 letters";
  } else {
    $first_name = actual_data($_POST["fname"]);
  }

  if (empty($_POST["lname"])) {
    $errors['lname_error'] = "Please enter your last name";
  } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST["lname"])) {
    $errors['lname_error'] = "Only alphabets are allowed";
  } elseif (strlen($_POST["lname"]) >= 35) {
    $errors['lname_error'] = "Last name can contain maximum 35 letters";
  } else {
    $last_name = actual_data($_POST["lname"]);
  }

  $full_name = $first_name . " " . $last_name;

  //Initialized variables for image
  $file_store = "../uploads/".basename($_FILES["image"]["name"]);
  $imageType = strtolower(pathinfo($file_store, PATHINFO_EXTENSION));

  //Validation of image file
  if ($_FILES["image"]["size"] > 500000) {
    $errors['img_error'] = "File is too large, the size should be less than 500KB";
  } elseif ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
    $errors['img_error'] = 'Only JPG, JPEG, PNG files are allowed';
  } else {
    move_uploaded_file($_FILES["image"]["tmp_name"], $file_store);
  }

  //Initialize variables for marks
  $subject = array();
  $grade = array();
  $lines = explode("\n", actual_data($_POST["score"]));
  foreach ($lines as $line) {
    $input = trim($line);
    if (!preg_match("/[A-Z][a-z]+\|[0-9]+$/", $input)) {
      $errors['grade_error'] = "Only subject|score format is allowed in individual line with capital letter in first";
    } else {
      $pos = strpos($line, "|");
      $course = substr($line, 0, $pos);
      $score = substr($line, $pos+1);
      $score_int = (int)$score;
      array_push($subject, $course);
      array_push($grade, $score_int);
    } 
  }

  if (array_filter($errors)) {
    //echo "errors present";
  } else{
    $_SESSION['file'] = $file_store;
    $_SESSION['fullname'] = $full_name;
    $_SESSION['subject'] = $subject;
    $_SESSION['grade'] = $grade;
    header ("Location:result.php");
  }
}

//Actual data is retrived after removing special characters,spaces,slashes
function actual_data ($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>