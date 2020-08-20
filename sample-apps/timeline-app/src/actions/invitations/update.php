<?php

use Repositories\InvitationsRepository;

if (!array_key_exists('id', $_GET)) {
    header('Location: /invitations/list');
}

$invitation = InvitationsRepository::getById($_GET['id']);

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $invitation['name'] = $_POST['name'];
    $invitation['text'] = $_POST['text'];
    $invitation['event_url'] = $_POST['event_url'];
    InvitationsRepository::update($invitation);

    header('Location: /invitations/list');
}

include __DIR__.'/../../views/invitations/form.php';
