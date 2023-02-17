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
  ?>

  <div class="container">
    <div class="result">
      <h2>
        <?php
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
