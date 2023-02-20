<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Query</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
	<?php
	session_start();
	$user = $_SESSION['user'];
	if  ($user  !=  "")  {
    $value  =  $_GET['Q'];
    switch($value)  {
      case  '1a':
        header("Location: task1/task1.php");
        break;
      case  '1b':
        header("Location: task1/task1_session.php");
        break;
      case  '2':
        header("Location:task2/task2.php");
        break;
      case  '3':
        header("Location:task3/task3.php");
        break;
      case  '4':
        header("Location:task4/task4.php");
        break;
      case  '1':
        header("Location:task_oops/task1/task1_session.php");
        break;
      case  '2a':
        header("Location:task_oops/task2/task2.php");
        break;
      case  '3a':
        header("Location:task_oops/task3/task3.php");
        break;
      case  '4a':
        header("Location:task_oops/task4/task4.php");
        break;
      case  '5a':
        header("Location:task_oops/task5/task5.php");
        break;
      case  '6a':
        header("Location:task_oops/task6/task6.php");
        break;
    }
  }  else {
		header("Location:login.php");
	}
	?>

	<div>
  	<form action="query.php" method="get" class="find" style="justify-content:center;">
    	<input type="text" name="Q" class="search">
    	<input type="submit" name="search" value="Search" class="btn-2">
  	</form>
	</div>
</body>
</html>