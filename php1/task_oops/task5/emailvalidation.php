<?php

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../login/login.php');
    $_SESSION['question']  =  "Q5";
  }
}

require '../class-name.php';
require '../class-image.php';
require '../class-marks.php';
require '../class-number.php';
require '../class-mail.php';

$errors = array(
  'fname_error' => '', 
  'lname_error' => '', 
  'img_error' => '',
  'grade_error' => '', 
  'phone_error' => '',  
  'mail_error' => ''
);

if (isset($_POST["submit"])) {
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];
  $name = new Name();
  // Validating and storing the errors occured in the name
  $errors['fname_error'] = $name->checkName($_POST["fname"]);
  $errors['lname_error'] = $name->checkName($_POST["lname"]);
  if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
    $full_name = $name->fullName($_POST["fname"], $_POST["lname"]);
  }

  // Initialized variables for image
  $file_dir = "../uploads/";
  // Validating and storing the image in a folder
  $upload = new Image($_FILES["image"]["size"], $_FILES["image"]["name"], $file_dir, $_FILES["image"]["tmp_name"]);
  $errors['img_error'] = $upload->checkImage();
  if ($errors['img_error'] == false) {
    $file_store = $upload->storeImage();
  }

  // Checking the pattern of marks and dividing into subject and marks array
  $lines = explode("\n", $_POST['score']);
  $score  = new Marks($_POST["score"]);
  $errors['grade_error']  = $score->checkPattern();
  if ($errors['grade_error'] == false) {
    $subject  = $score->subjectArray();
    $grade  = $score->marksArray();
  }
    
  //Initialized an object for Number class
  $phone_code = $_POST['code'];
  $contact = $_POST['number'];
  $num_obj = new Number();
  $errors['phone_error'] = $num_obj->checkNumber($_POST["code"], $_POST["number"]);
  if  ($errors['phone_error']  ==	 false)	{
    $phone_number = $num_obj->contactNumber($_POST["code"], $_POST["number"]);
  }

  // Validating and verifying the email address
  $email = $_POST['mail'];
  $mail_obj = new Mail($_POST["mail"]);
  $errors['mail_error'] = $mail_obj->errorCheck();
  if ($errors['mail_error'] == false) {
		$errors['mail_error']	=	$mail_obj->verifyMail();
	}
    

  if (array_filter($errors)) {
    // echo "prints errors after submit";
  } else {
    $_SESSION['file'] = $file_store;
    $_SESSION['fullname'] = $full_name;
    $_SESSION['grade'] = $grade;
    $_SESSION['subject'] = $subject;
    $_SESSION['ph_no'] = $phone_number;
    header ("refresh:1; url=final_page.php");
    echo '<script type="text/javascript">alert("Valid email format provided!");</script>';
  }
}

?>