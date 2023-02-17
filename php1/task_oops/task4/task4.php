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
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>
  <?php
  require('../name.php');
  require('../image.php');
  require('../number.php');
  ?>
  <?php
  $first_name = "";
  $last_name = "";
  $errors = array('fname_error' => '', 'lname_error' => '','img_error' => '',
  'grade_error' => '','phone_error' => '');

  if (isset($_POST["submit"])) {

    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $name = new Name();
    //Validating name
    $errors['fname_error'] = $name->checkName($first_name);
    $errors['lname_error'] = $name->checkName($last_name);
    if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
      $full_name = $name->fullName($first_name,$last_name);
    }

    //Initialized variables for image
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp_loc = $_FILES["image"]["tmp_name"];
    $file_dir = "../uploads/";

    $upload = new Image($file_size,$file_name,$file_dir,$file_tmp_loc);
    $errors['img_error'] = $upload->checkImage();
    if ($errors['img_error'] == false) {
      $file_store = $upload->storeImage();
    }

    //Initialize variables for marks
    $subject = array();
    $grade = array();
    $marks = actual_data($_POST["score"]);
    $lines = explode("\n",  $marks);
    //Validate and created 2D array for marks
    foreach ($lines as $line) {
      $input = trim($line);
      if  (!preg_match("/[A-Z][a-z]+\|[0-9]+$/", $input)) {
        $errors['grade_error'] = "Only subject|score format is allowed in individual line with capital letter in first";
      } else {
        $pos = strpos($line,"|");
        $course = substr($line, 0, $pos);
        $score = substr($line, $pos+1);
        $score_int = (int)$score;
        array_push($subject, $course);
        array_push($grade, $score_int);
      } 
    }

    //For number
    $phone_code = actual_data($_POST["code"]);
    $contact = actual_data($_POST["number"]);
    $num_obj = new Number();  //Initialized an object for Number class
    $errors['phone_error'] = $num_obj->checkNumber($phone_code,$contact);
    if ($errors['phone_error']  ==  false) {
      $phone_number = $num_obj->contactNumber($phone_code,$contact);
    }

    if (array_filter($errors)) {
      //echo "errors present";
    } else{
      $_SESSION['file']  =  $file_store;
      $_SESSION['fullname']  =  $full_name;
      $_SESSION['grade']  =  $grade;
      $_SESSION['subject']  =  $subject;
      $_SESSION['ph_no']  =  $phone_number;
      header ("Location:final_page.php");
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
      <form method="post" action="task4.php" enctype="multipart/form-data">

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