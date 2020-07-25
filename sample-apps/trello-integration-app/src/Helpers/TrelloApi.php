<?php

namespace Helpers;

use GuzzleHttp\Client;

class TrelloApi
{
    public static function search(string $query)
    {
        $params = ['query' => $query];

        return TrelloApi::send('https://api.trello.com/1/search', $params);
    }
    
    public static function getBoards(string $member = 'me')
    {
        return TrelloApi::send('https://api.trello.com/1/members/'.$member.'/boards');
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
        $params['token'] = TrelloOAuth::getToken();

        $client = new Client();
        $response = $client->get(
            $url.'?'.http_build_query($params),
            ['headers' => $headers]
        );

        return json_decode($response->getBody()->getContents());
    }
}
