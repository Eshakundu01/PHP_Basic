<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../../css/style1.css">
</head>
<body>
  <?php require 'loginvalidate.php'; ?>

  <div class="container">
    <div class="login">
      <h1 class="head">LOGIN</h1>
      <form action="login.php" method="post">
        <span class="error"><?php if (isset($error)) {echo $error;} ?></span>

        <div>USERNAME: <input type="text" name="user" class="input" required></div>
        <div>PASSWORD: <input type="password" name="pass" class="input" required></div>

        <span class="pass"><a href="../reset/forgot.php">Forgot Password?</a></span>

        <div class="register">Don't have a account?<a href="../register/register.php">Register Now</a></div>

        <button type="submit" name="submit" class="loginbtn">LOGIN</button>
        <input type="submit" name="cancel" value="Cancel" formnovalidate class="loginbtn">
      </form>
    </div>
  </div>
</body>
</html>