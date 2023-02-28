<?php

/**
 * Collecting the data from the json file
 * 
 */ 
class DataCollect {
  public $info;
  public $arr = [];

  /**
   * 
   * Constructor
   *
   * @param array $info
   *
   */
  public function __construct($info) {
    $this->info = $info;
  }

  /**
   * 
   * Fetching the data which is going to be displayed in the paragraphs
   *
   * @return array
   */
  public function bodyArray():array {
    for ($i=0; $i<count($this->info['data']); $i++) {
      if ($this->info['data'][$i]['attributes']['field_services'] != null) {
        $body[] = $this->info['data'][$i]['attributes']['field_services']['processed'];
      }
    }
    return $body;
  }

  /**
   * 
   * Fetching the data which is going to be displayed as the headings
   *
   * @return array
   */
  public function titleArray():array {
    for ($i=0; $i<count($this->info['data']); $i++) {
      if ($this->info['data'][$i]['attributes']['field_services'] != null) {
        $title[] = $this->info['data'][$i]['attributes']['title'];
      }
    }
    return $title;
  }

  /**
   * 
   * Fetching the links of the image and storing in an array
   *
   * @return void
   */
  public function setImage($data):void {
    array_push($this->arr,"https://www.innoraft.com/" . $data['data']['attributes']['uri']['url']);
  }


  /**
   * 
   * Returning the image array
   *
   * @return array
   */
  public function getImage():array {
    return $this->arr;
  }

  /**
   * 
   * Fetching the links for the buttons to redirect to a specific page
   *
   * @return array
   */
  public function linksArray():array {
    for ($i=0; $i<count($this->info['data']); $i++) {
      if ($this->info['data'][$i]['attributes']['field_services'] != null) {
        $links[] = 'https://www.innoraft.com' . $this->info['data'][$i]['attributes']['path']['alias'];
      }
    }
    return $links;
  }
}