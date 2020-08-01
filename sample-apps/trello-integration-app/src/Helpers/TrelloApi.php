<?php

namespace Helpers;

use GuzzleHttp\Client;

class TrelloApi
{
    public static function search(string $query)
    {
        $params = ['query' => $query];

        return TrelloApi::send('search', $params);
    }

    public static function getBoards(string $member = 'me')
    {
        return TrelloApi::send('members/'.$member.'/boards');
    }

    public static function getBoard(string $id)
    {
        return TrelloApi::send('boards/'.$id);
    }

    public static function getBoardList(string $id)
    {
        return TrelloApi::send('boards/'.$id.'/lists');
    }

    public static function getCard(string $cardId)
    {
        $params = ['members' => true];

        return TrelloApi::send('cards/'.$cardId, $params);
    }

    protected static function send(string $url, array $params = [], $method = 'GET')
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        $params['key'] = $_ENV['TRELLO_API_KEY'];
        $params['token'] = TrelloOAuth::getToken();

        $client = new Client();
        $response = $client->request(
            $method,
            'https://api.trello.com/1/'.$url.'?'.http_build_query($params),
            ['headers' => $headers]
        );

        return json_decode($response->getBody()->getContents());
    }
}
