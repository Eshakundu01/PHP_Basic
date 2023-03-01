<?php

session_start();

$error  = "";
$user = "";

require 'userdb.php';

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "select username, email, passcode from Users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $client[] = $row['username'];
      $pass[] = $row['passcode'];
    }
  } 

  // Validates the username and password
  if (!(in_array($user, $client) and in_array($password, $pass))) {
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

      case "A1":
        $_SESSION['username'] = $user;
        header("Location:../php_advance/task1/previewpage.php");
        break;
  

      case "A2":
        $_SESSION['username'] = $user;
        header("Location:../php_advance/task2/sendmail.php");
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