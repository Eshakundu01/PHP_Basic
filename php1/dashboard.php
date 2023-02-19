<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
  <?php
  $user = $_SESSION['userid'];

  if (isset($_POST['logout']))  {
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
  }
  ?>

  <div class="flex">
    <div class="sidebar">
      <div class="content">
        <img src="image/user.png" alt="userpic" class="pic" width=150 height=150>
        <h3><?php echo $user;?></h3>
        <ul class="navigation">
          <li><a href="dashboard.php" class="nav">Home</a></li>
          <li><a href="questions.php" class="nav">Profile</a></li>
        </ul>
        <input type="submit" name="logout" value="LOGOUT" class="logout">
      </div>
    </div>

    <div class="flexbox">
      <div class="content">
        <div class="searchbox">
          <form action="dashboard.php" method="get" class="find">
            <input type="text" name="searchinput" class="search">
            <button type="submit" name="search" class="btn-2">Search</button>
          </form>
        </div>
        <div class="task">
          <h1>ASSIGNMENT SOLUTION</h1>
          <ul class="list">
            <li><h2>Without OOPS</h2></li>
            <li><a href="task1/task1.php">Task1a</a></li>
            <li><a href="task1/task1_session.php">Task1b</a></li>     
            <li><a href="task2/task2.php">Task2</a></li>
            <li><a href="task3/task3.php">Task3</a></li>
            <li><a href="task4/task4.php">Task4</a></li>
          </ul>
          <ul class="list">
            <li><h2>Using OOPS</h2></li>
            <li><a href="task_oops/task1/task1_session.php">Task1</a></li>
            <li><a href="task_oops/task2/task2.php">Task2</a></li>
            <li><a href="task_oops/task3/task3.php">Task3</a></li>
            <li><a href="task_oops/task4/task4.php">Task4</a></li>
            <li><a href="task_oops/task5/task5.php">Task5</a></li>
            <li><a href="task_oops/task6/task6.php">Task6</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
</html>