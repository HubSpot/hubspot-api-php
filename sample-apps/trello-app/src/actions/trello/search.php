<?php

$headers = array(
  'Accept' => 'application/json'
);

$query = array(
  'key' => '12d414a90ef767aebdcbc58e4fc70692',
  'token' => 'c060666587095589d77900f387a28b8f',//$_SESSION['trello']['oauth_token'],
  'query' => 'test'
);

$response = Unirest\Request::get(
  'https://api.trello.com/1/search',
  $headers,
  $query
);

var_dump($response);
