<?php

namespace Longman\TelegramBot\Commands\SystemCommands;

use Enums\EventTypeCode;
use Enums\UserInvitationAction;
use Helpers\TimelineEventHelper;
use Longman\TelegramBot\Commands\SystemCommand;
use Longman\TelegramBot\Request;
use Repositories\InvitationsRepository;
use Telegram\InvitationReply;
use Telegram\TelegramBot;

class CallbackqueryCommand extends SystemCommand
{
    /**
     * @throws \Longman\TelegramBot\Exception\TelegramException
     * @throws \Exception
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     */
    public function execute()
    {
        $invitationReply = new InvitationReply($this->getCallbackQuery()->getData());
        $this->createTimelineEvent($invitationReply);

        $data = [
            'callback_query_id' => $this->getCallbackQuery()->getId(),
            'text' => 'Your response has been processed!',
            'cache_time' => 5,
        ];

        if ($invitationReply->isYesReply()) {
            $invitationId = $invitationReply->getInvitationId();
            TelegramBot::sendInvitationLink(InvitationsRepository::getById($invitationId), $this->getCallbackQuery()->getMessage()->getChat()->getId());
        }

        return Request::answerCallbackQuery($data);
    }

    protected function createTimelineEvent(InvitationReply $invitationReply)
    {
        $chatId = $this->getCallbackQuery()->getMessage()->getChat()->getId();
        $invitationId = $invitationReply->getInvitationId();
        $action = $invitationReply->isYesReply() ? UserInvitationAction::ACCEPTED : UserInvitationAction::REJECTED;
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
