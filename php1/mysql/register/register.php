<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Now</title>
  <link rel="stylesheet" type="text/css" href="../../css/style1.css">
</head>
<body>
  <?php require 'registervalidate.php'; ?>

  <div class="container">
    <div class="login">
      <h1 class="head">Register Now!</h1>
      <form action="register.php" method="post">
        <span class="error"><?php if (isset($error['register_error'])) {echo $error['register_error'];} ?></span>
        <div>USERNAME: <input type="text" name="user" class="input" required <?php if (!empty($_POST['user'])) {
          echo "value=\"" . $_POST['user'] . "\""; }?>></div>

        <div>EMAIL-ID: <input type="text" name="email" class="input" required <?php if (!empty($_POST['email'])) {
          echo "value=\"" . $_POST['email'] . "\""; }?>></div>
        <span class="error"><?php if(isset($error['mail_error'])) {echo $error['mail_error'];} ?></span>

        <div>PASSWORD: <input type="password" name="pass" class="input" required></div>
        <div>CONFIRM PASSWORD: <input type="password" name="confirm" class="input" required></div>
        
        <span class="error"><?php if (isset($error['pass_error'])) {echo $error['pass_error'];} ?></span>
        <button type="submit" name="submit" class="loginbtn">Register</button>
      </form>
    </div>
  </div>
</body>
</html>