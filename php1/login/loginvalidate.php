<?php

session_start();

$error  = "";
$user = "";

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $password = $_POST['pass'];
  // Validates the username and password
  if (!($user == 'Eshakundu1' and $password == 'esha08')) {
    $error  = "Invalid Username or password entered";
  } else {
    // The login credential are passed to the each page and it opens on login
    switch ($_SESSION['question']) {
      case "q1a":
        $_SESSION['username'] = $user;
        header("Location: ../task1/task1.php");
        break;

      case "q1b":
        $_SESSION['username'] = $user;
        header("Location: ../task1/task1_session.php");
        break;

      case "q2":
        $_SESSION['username'] = $user;
        header("Location:../task2/task2.php");
        break;

      case "q3":
        $_SESSION['username'] = $user;
        header("Location:../task3/task3.php");
        break;

      case "q4":
        $_SESSION['username'] = $user;
        header("Location:../task4/task4.php");
        break;

      case "Q1":
        $_SESSION['username'] = $user;
        header("Location:../task_oops/task1/task1_session.php");
        break;

      case "Q2":
        $_SESSION['username'] = $user;
        header("Location:../task_oops/task2/task2.php");
        break;

      case "Q3":
        $_SESSION['username'] = $user;
        header("Location:../task_oops/task3/task3.php");
        break;

      case "Q4":
        $_SESSION['username'] = $user;
        header("Location:../task_oops/task4/task4.php");
        break;

      case "Q5":
        $_SESSION['username'] = $user;
        header("Location:../task_oops/task5/task5.php");
        break;

      case "Q6":
        $_SESSION['username'] = $user;
        header("Location:../task_oops/task6/task6.php");
        break;

      case "q1":
        $_SESSION['username'] = $user;
        header("Location:../composer/fpdftask/task1.php");
        break;

      case "q2a":
        $_SESSION['username'] = $user;
        header("Location:../composer/guzzletask/task2.php");
        break;

      default:
        $_SESSION['userid']  =  $user;
        header("Location:../index.php");
        break;
    }
  }
} 

if  (isset($_POST['cancel']))  {
  header("Location:../logout.php");
}

?>