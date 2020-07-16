<?php

namespace Helpers;

use GuzzleHttp\Client;
use Repositories\TokensRepository;

class TrelloApi
{
    public static function getCard(string $cardId)
    {
        $query = ['members' => true];

        return TrelloApi::send('https://api.trello.com/1/cards/'.$cardId, $query);
    }

    protected static function send(string $url, array $query = [], string $method = 'get')
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $query['key'] = $_ENV['TRELLO_API_KEY'];
        $query['token'] = TokensRepository::getToken(TokensRepository::TRELLO_TOKEN);

        $client = new Client();
        $response = $client->get(
            $url.'?'.http_build_query($query),
            ['headers' => $headers]
        );

        return json_decode($response->getBody()->getContents());
    }
}

/*
 *

$query = [
    'key' => $_ENV['TRELLO_API_KEY'],
    'token' => TokensRepository::getToken(TokensRepository::TRELLO_TOKEN),
    'query' => $_GET['q'],
];

$client = new Client();
$response = $client->get(
    'https://api.trello.com/1/search?'.http_build_query($query),
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
 */
