<?php

use Repositories\InvitationsRepository;

if (!array_key_exists('id', $_GET)) {
    header('Location: /invitations/list');
}

$invitation = InvitationsRepository::getById($_GET['id']);

include __DIR__.'/../../views/invitations/show.php';
