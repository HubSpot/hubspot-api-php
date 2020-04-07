<?php

use Repositories\InvitationsRepository;

$invitations = InvitationsRepository::list();

include __DIR__.'/../../views/invitations/list.php';
