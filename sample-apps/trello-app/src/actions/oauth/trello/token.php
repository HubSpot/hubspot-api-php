<?php

use Repositories\TokensRepository;

if (isset($_GET['token'])) {
    TokensRepository::save($_GET['token'], TokensRepository::TRELLO_TOKEN);
}

header('Location: /');
