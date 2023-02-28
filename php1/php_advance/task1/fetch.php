<?php

use GuzzleHttp\Client;

require '../../vendor/autoload.php';
require 'class-data.php';

session_start();

if ($_SESSION['user'] == "") {
  if (!isset($_SESSION['username'])) {
    header('Location:../../login/login.php');
    $_SESSION['question']  =  "A1";
  }
}

$body_value = array();

$client = new Client();

$response = $client->request('GET', 'https://www.innoraft.com/jsonapi/node/services');

$content = json_decode($response->getBody()->getContents(),true);

$data_obj = new DataCollect($content);
$para = $data_obj->bodyArray();
$heading = $data_obj->titleArray();
$links = $data_obj->linksArray();

for ($i=0; $i<count($content['data']); $i++) {
  if ($content['data'][$i]['attributes']['field_services'] != null) {
    $link = $content['data'][$i]['relationships']['field_image']['links']['related']['href'];
    $request = $client->request('GET',$link);
    $information = json_decode($request->getBody(),true);
    $data_obj->setImage($information);
  }
}
$image = $data_obj->getImage();

?>