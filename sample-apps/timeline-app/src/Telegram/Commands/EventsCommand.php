<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Enums\EventTypeCode;
use Enums\UserInvitationAction;
use Helpers\TimelineEventHelper;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Repositories\InvitationsRepository;
use Telegram\TelegramBot;

class EventsCommand extends SystemCommand
{
    protected $usage = '/events';

    /**
     * @throws TelegramException
     *
     * @return ServerResponse
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chatId = $message->getChat()->getId();

        $invitation = InvitationsRepository::getRandom();

        if (empty($invitation)) {
            $data = [
                'chat_id' => $chatId,
                'text' => 'No more upcoming events :(',
            ];

            return Request::sendMessage($data);
        }

        TelegramBot::sendInvitation($invitation, $chatId);
        $this->createTimelineEvent($invitation['id']);
    }

    protected function createTimelineEvent($invitationId)
    {
        $chatId = $this->getMessage()->getChat()->getId();
        $action = UserInvitationAction::RECEIVED;
        TimelineEventHelper::createEvent(
            $chatId,
            EventTypeCode::USER_INVITATION_ACTION,
            [
                'name' => InvitationsRepository::getById($invitationId)['name'],
                'action' => $action,
                'event_url' => InvitationsRepository::getById($invitationId)['event_url'],
            ]
        );
    }
}
