<?php
/*Validating the email Id using the API first then if the email
is valid using session the email is send to final page orelse displaying error*/ 
class Mail {
  public $mail;

  public function __construct($mail) {
    $this->mail = $mail;
  }

  // Checking the email pattern without API
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

  // Checking the email Id with the provided API
  public function verifyMail(): mixed {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$this->mail,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: 7Wq4gTpRNqcZ1oFVpRDHtJOwN4dBKf0W"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);
    $validationResult = json_decode($response, true);
    if ($validationResult["format_valid"] && $validationResult["smtp_check"]) {
      $_SESSION['emailId']=$this->mail;
      return "";
    } else {
      $msg = "Cannot verify the provided email";
      return $msg;
    }
    curl_close($curl);
  }
}
?>