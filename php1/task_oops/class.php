<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*Validating the name first then
combining the first name and last name to get the full name*/ 
class Name {
  public $fname;
  public $lname;
  public function checkName($name) {
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
  }
  public function fullName($fname, $lname) {
    return $fname . " " . $lname;
  }
}
/*Validating the image first then
storing it in the upload file.*/ 
class Image {
  public $size;
  public $name;
  public $dir;
  public $tmp_loc;
  public function __construct($size, $name, $dir, $tmp_loc) {
    $this->size = $size;
    $this->name = $name;
    $this->dir = $dir;
    $this->tmp_loc = $tmp_loc;
  }
  //Validation of image file
  public function checkImage() {
    $store = $this->dir . basename($this->name);
    $type = strtolower(pathinfo($store, PATHINFO_EXTENSION));
    if ($this->size > 500000) {
      $error = "File is too large, the size should be less than 500KB";
      return $error;
    } elseif ($type != "jpg" && $type != "png" && $type != "jpeg") {
      $error = 'Only JPG, JPEG, PNG files are allowed';
      return $error;
    }
  }
  public function storeImage() {
    $store = $this->dir . basename($this->name);
    move_uploaded_file($this->tmp_loc,$store);
    return $store;
  }
}

/*Validating the phone number first then
combining the phone code with the phone
number to get the complete number*/ 
class Number {
  public $code;
  public $phone;
  public function check($code, $phone) {
    if(!preg_match("/\+[9][1]/",$code)) {  //Validates the code for number
      $error = "Enter the code for India";
      return $error;
    } elseif (!preg_match("/^[0-9]*$/", $phone)) { 
      $error = "Only numbers are allowed";
      return $error;
    } elseif (strlen($phone) < 10 || strlen($phone) > 10) {   // Validates the length of the number
      $error = "Number should be of 10 digits";
      return $error;
    }
  }
  public function contactNumber($code, $phone) {
    return $code . $phone;
  }
}

  /*Validating the email Id using the API first then if the email
  is valid using session the email is send to final page orelse displaying error*/ 
class Mail {
  public $mail;
  public function __construct($mail) {
    $this->mail = $mail;
  }
  public function errorCheck() {  //Checking without API
    if (empty($this->mail)) {
      $msg = "Email cannot be empty";
      return $msg;
    } elseif (!filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
      $msg = "Invalid email format used";
      return $msg;
    }
  }
  public function verify() {  //CHecking with API
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
    } else {
      $msg = "Cannot verify the provided email";
      return $msg;
    }
    curl_close($curl);
  }
  public function email() {
    return $this->mail;
  }
}
?>