<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="../../css/style1.css">
</head>
<body>
  <?php require 'resetupdate.php'; ?>

  <div class="container">
    <div class="login">
      <h1 class="head">Reset Your Password</h1>
      <form action="reset.php" method="post">
        <span class="error"><?php if (isset($pass_error)) {echo $pass_error;} ?></span>
        <div>NEW PASSWORD: <input type="password" name="pass" class="input" required></div>
        <div>RE-ENTER PASSWORD: <input type="password" name="confirm" class="input" required></div>
        <button type="submit" name="submit" class="loginbtn">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>