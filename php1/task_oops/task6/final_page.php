<?php

session_start();

//Getting data from form
$file_store = $_SESSION['file'];
$grade = $_SESSION['grade'];
$subject = $_SESSION['subject'];

//Sending data to PDF page
$_SESSION["name"] = $_SESSION["fullname"];
$_SESSION['img'] = $file_store;
$_SESSION['marks'] = $grade;
$_SESSION['course'] = $subject;
$_SESSION['phone']  = $_SESSION['ph_no'];
$_SESSION['email'] = $_SESSION['emailId'];

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
  <div class="container">
    <div class="result">
      <h2>
        <?php
        echo "<img src='$file_store' style='width:150px;height:150px; border-radius:50%'><br>"; 
        echo "Hello!\n";
        ?>
      </h2>
      <h3>
        <?php
        echo $_SESSION["fullname"] . "<br><br>";
        echo $_SESSION['ph_no'] . "<br><br>";
        echo $_SESSION['emailId'] . "<br>";
        ?>
      </h3>
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
      <a href="download.php">
        <button type="submit" id="download" name="download" class="generate">Download PDF</button>
      </a>
    </div>
  </div>
</body>
</html>
