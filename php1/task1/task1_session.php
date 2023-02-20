<?php
session_start();
if  ($_SESSION['user'] == "")  {
  if  (!isset($_SESSION['username']))  {
    header('Location:../login.php');
    $_SESSION['question']  =  "q1b";
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
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
 
  <?php
  $_SESSION['question'] = "q1b";

  $first_name = "";
  $last_name = "";
  $errors = array('fname_error' => '', 'lname_error' => '');

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
    return($data);
  }
  ?>

  <div class=container>
    <div class="form1">
      <h1 class="head">WELCOME</h1>
      <h3 class="head2">Connect Us</h3>
      <form method="post" action="task1_session.php">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" class="input" required><br>
        <span class="error"><?php echo $errors['fname_error'];?></span><br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" class="input" required><br>
        <span class="error"><?php echo $errors['lname_error'];?></span><br>
        <label for="fullname">Full name:</label>
        <input type="text" id="fullname" name="fullname" class="input" disabled><br>
        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>

  <script>
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