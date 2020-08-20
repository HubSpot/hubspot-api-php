<?php

use Repositories\InvitationsRepository;

if (array_key_exists('id', $_GET)) {
    InvitationsRepository::delete($_GET['id']);
}

header('Location: /invitations/list');
