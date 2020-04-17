<?php

namespace Telegram;

use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use Repositories\TelegramUpdatesRepository;

class TelegramBot
{
    const COMMANDS_PATHS = [
        __DIR__.'/Commands',
    ];
    protected $telegram;

    public function __construct(string $botApiKey, string $botUsername)
    {
        $this->telegram = new Telegram($botApiKey, $botUsername);
        $this->telegram->useGetUpdatesWithoutDatabase();
        $this->telegram->addCommandsPaths(self::COMMANDS_PATHS);
    }

    public static function init()
    {
        return new static(
            getEnvOrException('TELEGRAM_BOT_API_TOKEN'),
            getEnvOrException('TELEGRAM_BOT_USERNAME')
        );
    }

    public function processUpdates(): void
    {
        $maxUpdateId = TelegramUpdatesRepository::findMaxId();
        $updates = Request::getUpdates(['offset' => $maxUpdateId + 1])->getResult();
        foreach ($updates as $update) {
            TelegramUpdatesRepository::save(['id' => $update->update_id]);
            $this->telegram->processUpdate($update);
        }
    }

    public static function sendInvitation(array $invitation, int $chatId)
    {
        $invitationId = $invitation['id'];
        $data = [
            'chat_id' => $chatId,
            'text' => $invitation['text'],
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => 'YES', 'callback_data' => InvitationReply::encodeYesReply($invitationId)],
                        ['text' => 'NO', 'callback_data' => InvitationReply::encodeNoReply($invitationId)],
                    ],
                ],
            ]),
        ];

        return Request::sendMessage($data);
    }

    public static function sendInvitationLink(array $invitation, int $chatId)
    {
        $invitationId = $invitation['id'];
        $data = [
            'chat_id' => $chatId,
            'text' => 'Thank You! Press here to learn more about the event',
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => 'Go To '.$invitation['name'], 'url' => $invitation['event_url']],
                    ],
                ],
            ]),
        ];

        return Request::sendMessage($data);
    }
}
