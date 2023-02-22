<?php

session_start();

$user = "";
  
if (isset($_SESSION['userid'])) {
  $user = $_SESSION['userid'];
}

if (isset($_SESSION['username'])) {
  $user = $_SESSION['username'];
}

$_SESSION['user'] = $user;

?>