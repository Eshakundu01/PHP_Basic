<?php
session_start();
if  ($_SESSION['user'] == "")  {
  if  (!isset($_SESSION['username']))  {
    header('Location:../../login.php');
    $_SESSION['question']  =  "Q3";
  }
}
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
  require("../name.php");
  require("../image.php");
  require("../marks.php");
  ?>

  <?php
  $errors = array('fname_error' => '', 'lname_error' => '','img_error' => '','grade_error' => '');

  if (isset($_POST["submit"])) {

    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $name = new Name();
    // Validating name
    $errors['fname_error'] = $name->checkName($first_name);
    $errors['lname_error'] = $name->checkName($last_name);
    if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
      $full_name = $name->fullName($first_name,$last_name);
    }

    // Initialized variables for image
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $file_tmp_loc = $_FILES["image"]["tmp_name"];
    $file_dir = "../uploads/";

    $upload = new Image($file_size,$file_name,$file_dir,$file_tmp_loc);
    $errors['img_error'] = $upload->checkImage();
    if ($errors['img_error'] == false) {
      $file_store = $upload->storeImage();
    }

    // Creating object for marks and checking it and dividing the string into
    // two arrays
    $marks = actual_data($_POST["score"]);
    $score  = new Marks($marks);
    $errors['grade_error']  = $score->checkPattern();
    if  ($errors['grade_error'] ==  false)  {
      $subject  = $score->subjectArray();
      $grade  = $score->marksArray();
    }

    if (array_filter($errors)) {
      // echo "errors present";
    } else{
      $_SESSION['file'] = $file_store;
      $_SESSION['fullname'] = $full_name;
      $_SESSION['grade'] = $grade;
      $_SESSION['subject'] = $subject;
      header ("Location:final_page.php");
    }
  }

  // Actual data is retrived after removing special characters,spaces,slashes
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