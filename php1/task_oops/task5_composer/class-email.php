<?php

require '../../vendor/autoload.php';

use GuzzleHttp\Client;

/**
 * Validating the email Id then verifying the email
 * 
 */ 
class Mail {
  public $mail;

  /**
   * 
   * Constructor
   *
   * @param string $mail
   *
   */
  public function __construct($mail) {
    $this->mail = $mail;
  }

  /**
   * 
   * Checking the email pattern without API
   *
   * @return string
   */
  public function errorCheck(): string {
    if (empty($this->mail)) {
      $msg = "Email cannot be empty";
      return $msg;
    } elseif (!filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
      $msg = "Invalid email format used";
      return $msg;
    }
    return "";
  }

  /**
   * 
   * Checking the email Id with the provided API
   *
   * @return mixed
   */
  public function verifyMail(): mixed {
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', 'https://api.apilayer.com/email_verification/check?email='.$this->mail, [
      'headers' => [
        'Content-Type' => 'text/plain',
        'apikey' => '7Wq4gTpRNqcZ1oFVpRDHtJOwN4dBKf0W'
      ]]);

    $result = $response->getBody();
    $validationResult = json_decode($result, true);
    if ($validationResult["format_valid"] && $validationResult["smtp_check"]) {
      $_SESSION['emailId']=$this->mail;
      return "";
    } else {
      $msg = "The provided email can't be verified!";
      return $msg;
    }
  }
}

?>