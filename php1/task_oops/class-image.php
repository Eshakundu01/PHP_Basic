<?php
/**
 * Validating the image first then storing it in the upload file
 * 
 */ 
class Image {
  public $size;
  public $name;
  public $dir;
  public $tmp_loc;

  /**
   * 
   * Constructor
   *
   * @param int $size
   * @param string $name
   * @param string $dir
   * @param string $tmp_loc
   */
  public function __construct($size, $name, $dir, $tmp_loc) {
    $this->size = $size;
    $this->name = $name;
    $this->dir = $dir;
    $this->tmp_loc = $tmp_loc;
  }

  /**
   * 
   * Validates the uploaded image file
   *
   * @return string
   */
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

  /**
   * 
   * Stores the uploaded image file in a folder
   *
   * @return string
   */
  public function storeImage(): string {
    $store = $this->dir . basename($this->name);
    move_uploaded_file($this->tmp_loc,$store);
    return $store;
  }
}
  
?>