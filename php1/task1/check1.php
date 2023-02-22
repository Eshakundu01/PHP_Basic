<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../login/login.php');
    $_SESSION['question'] = "q1a";
  }
}

$first_name = "";
$last_name = "";
$fname_error = "";
$lname_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validates the pattern, length and empty field is submitted for first name
  if (empty($_POST["fname"])) {
    $fname_error = "Please enter your first name";
  } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST["fname"])) {
    $fname_error = "Only alphabets are allowed";
  } elseif (strlen($_POST["fname"]) >= 35) {
    $fname_error = "First name can contain maximum 35 letters";
  } else {
    $first_name = actual_data($_POST["fname"]);
  }

  // Validates the pattern, length and empty field is submitted for last name
  if (empty($_POST["lname"])) {
    $lname_error = "Please enter your last name";
  } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST["lname"])) {
    $lname_error = "Only alphabets are allowed";
  } elseif (strlen($_POST["lname"]) >= 35) {
    $lname_error = "Last name can contain maximum 35 letters";
  } else {
    $last_name = actual_data($_POST["lname"]);
  }
}

$full_name = $first_name . " " . $last_name;

//Actual data is retrived after removing special characters,spaces,slashes
function actual_data ($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return($data);
}

?>