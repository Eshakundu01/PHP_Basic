<?php

session_start();

// If user is logged in and enters a number it redirects to that page
if ($_SESSION['user'] != "") {
  if (isset($_GET['Q'])) {
    switch ($_GET['Q']) {
      case '1a':
        header("Location: task1/task1.php");
        break;

      case '1b':
        header("Location: task1/task1_session.php");
        break;

      case '2':
        header("Location:task2/task2.php");
        break;

      case '3':
        header("Location:task3/task3.php");
        break;

      case '4':
        header("Location:task4/task4.php");
        break;

      case '1':
        header("Location:task_oops/task1/task1_session.php");
        break;

      case '2a':
        header("Location:task_oops/task2/task2.php");
        break;

      case '3a':
        header("Location:task_oops/task3/task3.php");
        break;

      case '4a':
        header("Location:task_oops/task4/task4.php");
        break;

      case '5a':
        header("Location:task_oops/task5/task5.php");
        break;

      case '5b':
        header("Location:task_oops/task5_composer/task5.php");
        break;

      case '6a':
        header("Location:task_oops/task6/task6.php");
        break;

      case '6b':
        header("Location:task_oops/task6_composer/task6.php");
        break;
    }
  }
} else {
  header("Location:login/login.php");
}

?>