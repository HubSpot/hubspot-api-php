<?php

namespace Helpers;

use GuzzleHttp\Client;
use Repositories\TokensRepository;

class TrelloApi
{
    public static function search(string $query)
    {
        $params = ['query' => $query];

        return TrelloApi::send('https://api.trello.com/1/search', $params);
    }
    
    public static function getCard(string $cardId)
    {
        $params = ['members' => true];

        return TrelloApi::send('https://api.trello.com/1/cards/'.$cardId, $params);
    }

    protected static function send(string $url, array $params = [])
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $params['key'] = $_ENV['TRELLO_API_KEY'];
        $params['token'] = TokensRepository::getToken(TokensRepository::TRELLO_TOKEN);

        $client = new Client();
        $response = $client->get(
            $url.'?'.http_build_query($params),
            ['headers' => $headers]
        );

        return json_decode($response->getBody()->getContents());
    }
}
