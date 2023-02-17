<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP_1</title>
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
 
  <?php
  $first_name = "";
  $last_name = "";
  $errors = array('fname_error' => '', 'lname_error' => '','img_error' => '',
  'grade_error' => '','phone_error' => '');

  if (isset($_POST["submit"])) {

    //Validates first and last name
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

    //Initialized variables for image
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp_loc = $_FILES["image"]["tmp_name"];
    $file_store = "../uploads/".basename($file_name);
    $imageType = strtolower(pathinfo($file_store,PATHINFO_EXTENSION));

    //Validation of image file
    if ($file_size > 500000) {
      $errors['img_error'] = "File is too large, the size should be less than 500KB";
    } elseif ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg") {
      $errors['img_error'] = 'Only JPG, JPEG, PNG files are allowed';
    } else {
      move_uploaded_file($file_tmp_loc,$file_store);
    }

    //Initialize variables for marks
    $subject = array();
    $grade = array();
    $marks = actual_data($_POST["score"]);
    $lines = explode("\n",$marks);
    //Validate and created 2D array for marks
    foreach ($lines as $line) {
      $input = trim($line);
      if (!preg_match("/[A-Z][a-z]+\|[0-9]+$/",$input)) {
        $errors['grade_error'] = "Only subject|score format is allowed in individual line with capital letter in first";
      } else {
        $pos = strpos($line,"|");
        $course = substr($line,0,$pos);
        $score = substr($line,$pos+1);
        $score_int = (int)$score;
        array_push($subject,$course);
        array_push($grade,$score_int);
      } 
    }

    //Validating phone number
    $phone_code = actual_data($_POST["code"]);
    $contact = actual_data($_POST["number"]);
    if(!preg_match("/\+[9][1]/",$phone_code)) {  //Validates the code for number
      $errors['phone_error'] = "Enter the code for India";
    } elseif (!preg_match("/^[0-9]*$/",$contact)) { 
      $errors['phone_error'] = "Only numbers are allowed";
    } elseif (strlen($contact) < 10 || strlen($contact) > 10) {   // Validates the length of the number
      $errors['phone_error'] = "Number should be of 10 digits";
    } else {
      $full_number = $phone_code . $contact;
    }

    if (array_filter($errors)) {
      //echo "errors present";
    } else{
      $_SESSION['file'] = $file_store;
      $_SESSION['fullname'] = $full_name;
      $_SESSION['subject'] = $subject;
      $_SESSION['grade'] = $grade;
      $_SESSION['phone'] = $full_number;
      header ("Location:result.php");
    }
  }

  //Actual data is retrived after removing special characters,spaces,slashes
  function actual_data ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return($data);
  }
  ?>

  <div class=container>
    <div class="form1">
      <h1 class="head">WELCOME</h1>
      <h3 class="head2">Connect Us</h3>
      <form method="post" action="task3.php" enctype="multipart/form-data">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" class="input" required><br>
        <span class="error"><?php echo $errors['fname_error'];?></span><br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" class="input" required><br>
        <span class="error"><?php echo $errors['lname_error'];?></span><br>
        <label for="fullname">Full name:</label>
        <input type="text" id="fullname" name="fullname" class="input" disabled><br>
        Upload image:<input type="file" name="image" id="image" class="upload"><br>
        <span class="error"><?php echo $errors['img_error'];?></span><br>
        <label for="score" class="label">Marks:</label>
        <textarea name="score" id="score" cols="60" rows="10" placeholder="Enter marks here"></textarea><br>
        <span class="error"><?php echo $errors['grade_error'];?></span><br>
        Phone number:<input type="text" name="code" class="code">
        <input type="text" name="number" class="input"><br>
        <span class="error"><?php echo $errors['phone_error'];?></span><br>
        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>

  <script type=text/javascript>
    document.getElementById('fname').addEventListener("keyup", myFunction);
    document.getElementById('lname').addEventListener("keyup", myFunction);

    var first = document.getElementById('fname');
    var last = document.getElementById('lname');

    function myFunction() {
      document.getElementById('fullname').value = first.value + " " + last.value;
    }
  </script>
</body>
</html>