<?php
/**
 * Validating the phone number then combining the phone code with the number
 */ 
class Number {
  public $code;
  public $phone;
  /**
   * 
   * Validates the code for number and the length of the number
   * @param string $code
   * @param string $phone
   * @return string
   */
  public function checkNumber($code, $phone): string {
    if(!preg_match("/\+[9][1]/",$code)) {
      $error = "Enter the code for India";
      return $error;
    } elseif (!preg_match("/^[0-9]*$/", $phone)) { 
      $error = "Only numbers are allowed";
      return $error;
    } elseif (strlen($phone) < 10 || strlen($phone) > 10) {
      $error = "Number should be of 10 digits";
      return $error;
    }
    return "";
  }

  /**
   * 
   * Concatenates the phone code with the phone number
   *
   * @param string $code
   * @param string $phone
   * @return string
   */
  public function contactNumber($code, $phone): string {
    return $code . $phone;
  }
}

?>