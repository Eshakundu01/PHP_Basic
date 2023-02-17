<?php
/*Validating the name first then
combining the first name and last name to get the full name*/ 
class Name {
  public $fname;
  public $lname;
  // Checks the pattern of the name
  public function checkName($name): string {
    if (empty($name)) {
      $error = "Please enter your first name";
      return $error;
    } elseif (!preg_match("/^[a-zA-Z]*$/", $name)) {
      $error = "Only alphabets are allowed";
      return $error;
    } elseif (strlen($name) >= 35) {
      $error = "Name can contain maximum 35 letters";
      return $error;
    }
    return "";
  }

  // Concatenates first name and last name
  public function fullName($fname, $lname): string {
    return $fname . " " . $lname;
  }
}
?>