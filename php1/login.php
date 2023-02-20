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
  $user = "";
  if  (isset($_POST['submit']))  {
    $user = $_POST['user'];
    $password = $_POST['pass'];
    if  (!($user == 'Eshakundu1' and $password == 'esha08'))  {
      $error  = "Invalid Username or password entered";
    } else  {
      $problem = $_SESSION['question'];
      switch($problem) {
        case "q1a":
          $_SESSION['username'] = $user;
          header("Location: task1/task1.php");
          break;
        case "q1b":
          $_SESSION['username'] = $user;
          header("Location: task1/task1_session.php");
          break;
        case "q2":
          $_SESSION['username'] = $user;
          header("Location:task2/task2.php");
          break;
        case "q3":
          $_SESSION['username'] = $user;
          header("Location:task3/task3.php");
          break;
        case "q4":
          $_SESSION['username'] = $user;
          header("Location:task4/task4.php");
          break;
        case "Q1":
          $_SESSION['username'] = $user;
          header("Location:task_oops/task1/task1_session.php");
          break;
        case "Q2":
          $_SESSION['username'] = $user;
          header("Location:task_oops/task2/task2.php");
          break;
        case "Q3":
          $_SESSION['username'] = $user;
          header("Location:task_oops/task3/task3.php");
          break;
        case "Q4":
          $_SESSION['username'] = $user;
          header("Location:task_oops/task4/task4.php");
          break;
        case "Q5":
          $_SESSION['username'] = $user;
          header("Location:task_oops/task5/task5.php");
          break;
        case "Q6":
          $_SESSION['username'] = $user;
          header("Location:task_oops/task6/task6.php");
          break;
        default:
        $_SESSION['userid']  =  $user;
        header("Location:index.php?login");
      }
    }
  } 

  if  (isset($_POST['cancel']))  {
    header("Location:logout.php?logout");
  }
  ?>
  <div class="container">
    <div class="login">
      <h1 class="head">LOGIN</h1>
      <form action="login.php" method="post">
        <span class="error"><?php echo $error;?></span><br>
        USERNAME: <input type="text" name="user" class="input" required><br>
        PASSWORD: <input type="password" name="pass" class="input" required><br>
        <button type="submit" name="submit" class="loginbtn">LOGIN</button>
        <input type="submit" name="cancel" value="Cancel" formnovalidate class="loginbtn"><br>
      </form>
    </div>
  </div>
</body>
</html>