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
  
  require 'check1.php';

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