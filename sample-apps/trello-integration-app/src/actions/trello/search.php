<?php

use GuzzleHttp\Client;
use Repositories\TokensRepository;

if (!isset($_GET['q'])) {
    throw new Exception('Invalid Query');
}

$headers = [
    'Accept' => 'application/json',
];

$query = [
    'key' => $_ENV['TRELLO_API_KEY'],
    'token' => TokensRepository::getToken(TokensRepository::TRELLO_TOKEN),
    'query' => $_GET['q'],
];

$client = new Client();
$response = $client->get(
    'https://api.trello.com/1/search?'. http_build_query($query),
    ['headers' => $headers]
);

$data = json_decode($response->getBody()->getContents());

$result = [];
if (!empty($data->cards)) {
    foreach ($data->cards as $card) {
        $result[] = [
            'id' => $card->id,
            'name' => $card->name,
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($result);
