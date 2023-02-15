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
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
  <?php
  $full_name = $_SESSION["fullname"];
  $file_store = $_SESSION['file'];
  $grade = $_SESSION['grade'];
  ?>

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
      echo $full_name;
      ?>
      <table class="scores">
        <tr>
          <th>SL No.</th>
          <th>SUBJECT</th>
          <th>MARKS</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($grade as $key=>$row) { ?>
        <tr>
          <td><?php echo $sn;?></td>
          <?php foreach($row as $key2=>$cell) { ?>
            <td><?php echo $cell;?></td>
          <?php }?>
        </tr>
        <?php
         $sn += 1; 
        }?>
      </table>
  </div>
</body>
</html>