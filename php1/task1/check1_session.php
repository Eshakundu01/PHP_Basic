<?php

session_start();

if  ($_SESSION['user'] == "")  {
  if  (!isset($_SESSION['username']))  {
    header('Location:../mysql/login/login.php');
    $_SESSION['question']  =  "q1b";
  }
}

$first_name = "";
$last_name = "";
$errors = array('fname_error' => '', 'lname_error' => '');

// Validates the pattern, length and empty field is submitted for first name
if (isset($_POST['submit'])) {
  if (empty($_POST["fname"])) {
    $errors['fname_error'] = "Please enter your first name";
  } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST["fname"])) {
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

  if (array_filter($errors)) {
    //echo "errors present";
  } else {
    $_SESSION['fullname'] = $full_name;
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