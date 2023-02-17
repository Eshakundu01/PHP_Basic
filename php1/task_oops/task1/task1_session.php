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
  require("../class.php")
  ?>  

  <?php
  $errors = array('fname_error' => '', 'lname_error' => '');

  if (isset($_POST['submit'])) {
    
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $name = new Name();
    //Validating name
    $errors['fname_error'] = $name->checkName($first_name);
    $errors['lname_error'] = $name->checkName($last_name);
    if ($errors['fname_error'] == false and $errors['lname_error'] == false) {
      $full_name = $name->fullName($first_name,$last_name);
    }

    if (array_filter($errors)) {
      //echo "errors present";
    } else {
      $_SESSION['fullname'] = $full_name;
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