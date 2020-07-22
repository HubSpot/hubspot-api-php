<?php

use Helpers\TrelloOAuth;

if (isset($_GET['token'])) {
    TrelloOAuth::saveToken($_GET['token']);
}

header('Location: /');
