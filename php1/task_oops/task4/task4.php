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
  
  require 'phonevalidation.php';
  
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