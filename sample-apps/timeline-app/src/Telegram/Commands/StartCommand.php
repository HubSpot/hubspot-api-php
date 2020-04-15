<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Base64Url\Base64Url;
use Enums\EventTypeCode;
use Helpers\TimelineEventHelper;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Repositories\UsersRepository;
use Throwable;

class StartCommand extends SystemCommand
{
    protected $usage = '/start';

    /**
     * @throws TelegramException
     *
     * @return ServerResponse
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chatId = $message->getChat()->getId();
        list(, $base64EncodedEmail) = explode(' ', $message->getText());
        if (!empty($base64EncodedEmail)) {
            try {
                $email = Base64Url::decode($base64EncodedEmail);
                UsersRepository::assignEmailToTelegramChatId($email, $chatId);
                $this->createTimelineEvent($chatId);
            } catch (Throwable $t) {
                var_dump($t->getMessage());
            }
        }

        $text = 'Hi there!'.PHP_EOL.'Type /events to see available events!';
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
        ];

        return Request::sendMessage($data);
    }

    protected function createTimelineEvent($chatId)
    {
        TimelineEventHelper::createEvent(
            $chatId,
            EventTypeCode::BOT_ADDED
        );
    }
}
