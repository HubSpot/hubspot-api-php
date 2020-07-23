<?php

use Helpers\TrelloApi;

if (!isset($_GET['q'])) {
    throw new Exception('Invalid Query');
}

$response = TrelloApi::search($_GET['q']);

$result = [];
if (!empty($response->cards)) {
    foreach ($response->cards as $card) {
        $result[] = [
            'id' => $card->id,
            'name' => $card->name,
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($result);
