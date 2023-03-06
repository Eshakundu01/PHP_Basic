<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="../../css/style1.css">
</head>
<body>
  <?php

  require 'sendmail.php';

  ?>

  <div class="container">
    <div class="login">
      <h1 class="head">Forgot Password!</h1>
      <p>Enter your registered mail address to receive OTP verification code.</p>
      <form action="forgot.php" method="post">
        <span class="error"><?php echo $error; ?></span><br>
        EMAIL-ID: <input type="text" name="mail" class="input" required <?php if (!empty($_POST['email'])) {
          echo "value=\"" . $_POST['email'] ."\""; }?>><br>
        <button type="submit" name="submit" class="loginbtn">Send Mail</button>
      </form>
    </div>
  </div>
</body>
</html>