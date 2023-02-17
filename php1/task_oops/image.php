<?php
/*Validating the image first then
storing it in the upload file.*/ 
class Image {
    public $size;
    public $name;
    public $dir;
    public $tmp_loc;

    // Created a parameterized constructor
    public function __construct($size, $name, $dir, $tmp_loc) {
      $this->size = $size;
      $this->name = $name;
      $this->dir = $dir;
      $this->tmp_loc = $tmp_loc;
    }

    //Validation of image file
    public function checkImage(): string {
      $store = $this->dir . basename($this->name);
      $type = strtolower(pathinfo($store, PATHINFO_EXTENSION));
      if ($this->size > 500000) {
        $error = "File is too large, the size should be less than 500KB";
        return $error;
      } elseif ($type != "jpg" && $type != "png" && $type != "jpeg") {
        $error = 'Only JPG, JPEG, PNG files are allowed';
        return $error;
      }
      return "";
    }

    // Stores the image in the provide path and returns the path
    public function storeImage(): string {
      $store = $this->dir . basename($this->name);
      move_uploaded_file($this->tmp_loc,$store);
      return $store;
    }
  }
  
?>