<?php

use Enums\EventTypeCode;
use Enums\UserInvitationAction;
use Helpers\HubspotClientHelper;
use Helpers\TimelineEventHelper;
use HubSpot\Client\Crm\Contacts\Model\BatchReadInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use Repositories\InvitationsRepository;
use Repositories\UsersRepository;
use Telegram\TelegramBot;

TelegramBot::init();
$hubSpot = HubspotClientHelper::createFactory();

$sendInvitationAndCreateTimelineEvent = function ($invitation, $email) {
    $chatId = UsersRepository::getTelegramChatIdByEmail($email);
    if (!empty($chatId)) {
        TelegramBot::sendInvitation($invitation, $chatId);
        TimelineEventHelper::createEvent(
            $chatId,
            EventTypeCode::USER_INVITATION_ACTION,
            [
                'name' => $invitation['name'],
                'action' => UserInvitationAction::RECEIVED,
                'event_url' => $invitation['event_url'],
            ]
        );
    }
};

$invitation = InvitationsRepository::getById($_GET['id']);
$ids = [];

foreach ($_POST['contactIds'] as $id) {
    $contactId = new SimplePublicObjectId();
    $contactId->setId($id);
    $ids[] = $contactId;
}

$request = new BatchReadInputSimplePublicObjectId();
$request->setInputs($ids);

$contacts = $hubSpot->crm()->contacts()->batchApi()->read($request);

foreach ($contacts->getResults() as $contact) {
    $sendInvitationAndCreateTimelineEvent($invitation, $contact->getProperties()['email']);
}

header('Location: /invitations/contacts?send=true&id='.$_GET['id']);
