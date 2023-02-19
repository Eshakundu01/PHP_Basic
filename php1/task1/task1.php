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
  $fname_error = "";
  $lname_error = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
      $fname_error = "Please enter your first name";
    } elseif (!preg_match("/^[a-zA-Z]*$/",$_POST["fname"])) {
      $fname_error = "Only alphabets are allowed";
    } elseif (strlen($_POST["fname"]) >= 35) {
      $fname_error = "First name can contain maximum 35 letters";
    } else {
      $first_name = actual_data($_POST["fname"]);
    }

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

  <div class=container>
    <div class="form1">
      <h1 class="head">WELCOME</h1>
      <h3 class="head2">Connect Us</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" class="input" required><br>
        <span class="error"><?php echo $fname_error;?></span><br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" class="input" required><br>
        <span class="error"><?php echo $lname_error;?></span><br>
        <label for="fullname">Full name:</label>
        <input type="text" id="fullname" name="fullname" class="input" disabled><br>
        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="result">
      <h2>
        <?php
        echo "Hello\n";
        ?>
      </h2>
      <?php
      echo $full_name;
      ?>
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