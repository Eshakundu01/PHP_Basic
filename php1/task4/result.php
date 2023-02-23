<?php

session_start();
$file_store = $_SESSION['file'];
$grade = $_SESSION['grade'];
$subject = $_SESSION['subject'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preview</title>
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
  <div class="container">
    <div class="result">
      <h2>
        <?php
        //Viewing image file
        echo "<img src='$file_store' style='width:150px;height:150px; border-radius:50%'><br>"; 
        echo "Hello\n";
        ?>
      </h2>
      <?php
      echo $_SESSION["fullname"] . "<br>";
      echo $_SESSION['phone'];
      ?>
      <table class="scores">
        <tr>
          <th>SL No.</th>
          <th>SUBJECT</th>
          <th>MARKS</th>
        </tr>
        <?php
        $sn = 1;
        for ($i=0; $i<count($grade); $i++) { ?>
        <tr>
          <td><?php echo $sn;?></td>
          <td><?php echo $subject[$i];?></td>
          <td><?php echo $grade[$i];?></td>
        </tr>
        <?php
         $sn += 1; 
        }?>
      </table>
    </div>
  </div>
</body>
</html>