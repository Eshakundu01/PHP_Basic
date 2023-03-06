<?php

session_start();

use GuzzleHttp\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

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
  public function errorCheck():string {
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
  public function verifyMail():mixed {
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

  /**
   * 
   * Sending a mail using SMTP and PHPMailer
   *
   * @return void
   *
   */
  public function sendMail():void {
    require 'password.php';
    $mail = new PHPMailer(true);  
    // Set up PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $mailadd;
    // Password to use for SMTP authentication 
    $mail->Password = $pass;
    $mail->SMTPSecure = "tls";  
    $mail->Port = 587;  

    $mail->From = "esha.kundu@innoraft.com";

    $mail->addAddress($this->mail);

    $mail->Subject = "Register successfully";
    $mail->Body = "Thank you for registration.";

    try {
      $mail->send();
      echo "";
    } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
  }

  /**
   * 
   * Generating OTP and sending in mail
   *
   * @return int
   *
   */
  public function otpSend():int {
    require 'password.php';
    $mail = new PHPMailer(true);  
    // Set up PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $mailadd;
    // Password to use for SMTP authentication 
    $mail->Password = $pass;
    $mail->SMTPSecure = "tls";  
    $mail->Port = 587;  

    $mail->From = "esha.kundu@innoraft.com";

    $mail->addAddress($this->mail);

    $otp = rand(1000,9999);
    $_SESSION['pin'] = $otp;

    $mail->isHTML(true);

    $mail->Subject = "OTP GENERATED TO RESET PASSWORD";
    $mail->Body = 'Enter the below generated otp in the page to reset your password.<br><b>OTP : <b>' . $otp;

    try {
      $mail->send();
      return $otp;
    } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    }
  }
}

?>