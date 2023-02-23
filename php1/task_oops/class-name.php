<?php
/**
 * Validating the name then combining the name to get the full name
 */ 
class Name {
  public $fname;
  public $lname;
  /**
   * 
   * Validates the pattern, length and characters in the name
   *
   * @param string $name
   * @return string
   */
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

  /**
   * 
   * Concatenates first name and last name
   *
   * @param string $fname
   * @param string $lname
   * @return string
   */
  public function fullName($fname, $lname): string {
    return $fname . " " . $lname;
  }
}
?>