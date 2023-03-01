<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
  <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>
<body>
  <?php

  require 'otpvalidate.php';

  ?>

  <div class="container">
    <div class="login">
      <h1 class="head">Enter the OTP</h1>
      <form action="otp.php" method="post">
        <span class="error"><?php echo $error; ?></span><br>
        OTP: <input type="text" name="otp" class="input"><br>
        <button type="submit" name="submit" class="loginbtn">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>