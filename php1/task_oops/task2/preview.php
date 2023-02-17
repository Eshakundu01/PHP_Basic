<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>
  <?php
  $full_name = $_SESSION["fullname"];
  $file_store = $_SESSION['file'];
  ?>

  <div class="container">
    <div class="result">
      <h2>
        <?php
        //Viewing image file
        echo "<img src='$file_store' style='width:150px;height:150px; border-radius:50%'><br>"; 
        echo "Hello!\n";
        ?>
      </h2>
      <h3>
        <?php
        echo $full_name . "<br>";
        ?>
      </h3>
    </div>
  </div>
</body>
</html>
