<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
  <?php
  $error  = "";
  if  (isset($_POST['submit']))  {
    $user = $_POST['user'];
    $password = $_POST['pass'];
    if  (!($user == 'Eshakundu1' and $password == 'esha08'))  {
      $error  = "Invalid Username or password entered";
    } else  {
      $_SESSION['userid'] = $user;
      header("Location:dashboard.php");
    }
  }
  ?>
  <div class="container">
    <div class="login">
      <h1 class="head">LOGIN</h1>
      <form action="index.php" method="post">
        <span class="error"><?php echo $error;?></span>
        USERNAME: <input type="text" name="user" class="input" required><br>
        PASSWORD: <input type="password" name="pass" class="input" required><br>
        <a href="#" class="reset">Forgot Password?</a><br>
        <button type="submit" name="submit" class="loginbtn">LOGIN</button><br>
      </form>
      <span class="join">Don't have a account?<a href="#" class="register">Register Now</a></span>
    </div>
  </div>
</body>
</html>