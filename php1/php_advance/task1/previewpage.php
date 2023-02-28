<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <?php

  require 'fetch.php';

  ?>

  <div class="container">

    <?php
    for ($i=0; $i<count($para); $i++) {
      if ($i%2 == 0) {
    ?>

    <div class="flexbox">
      <div class="content">
        <img src="<?php echo $image[$i]; ?>" alt="contentpicture" class="pic">
      </div>
      <div class="content">
        <h1 class="heading"><?php echo $heading[$i]; ?></h1>
        <div class="info"><?php echo $para[$i]; ?></div>
        <a href="<?php echo $links[$i]; ?>" class="btn">EXPLORE MORE</a>
      </div>
    </div>

    <?php
      } else {
    ?>

    <div class="flexbox">
      <div class="content">
        <h1 class="heading"><?php echo $heading[$i]; ?></h1>
        <div class="info"><?php echo $para[$i]; ?></div>
        <a href="<?php echo $links[$i]; ?>" class="btn">EXPLORE MORE</a>
      </div>
      <div class="content">
        <img src="<?php echo $image[$i]; ?>" alt="contentpicture" class="pic">
      </div>
    </div>

    <?php
      }
    }
    ?>
    
  </div> 
</body>
</html>