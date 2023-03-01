<?php

/**
 * Validating the email Id then verifying the email
 * 
 */ 
class Password {
  public $pass;
  /**
   * 
   * Constructor
   *
   * @param string $mail
   *
   */
  public function __construct($pass) {
    $this->pass = $pass;
  }

  /**
   * 
   * Checking the email pattern without API
   *
   * @return string
   */
  public function checkPassword() {
    $uppercase = preg_match('@[A-Z]@', $this->pass);
    $lowercase = preg_match('@[a-z]@', $this->pass);
    $number    = preg_match('@[0-9]@', $this->pass);
    $specialChars = preg_match('@[^\w]@', $this->pass);
    
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->pass) < 8) {
      return 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }
  }
}