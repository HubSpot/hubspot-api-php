<?php

use Helpers\DBClientHelper;
use Telegram\TelegramBot;

require __DIR__.'/../../../vendor/autoload.php';

DBClientHelper::runMigrations();

$telegramUpdatesHandler = TelegramBot::init();

while (true) {
    $telegramUpdatesHandler->processUpdates();
    sleep(1);
}
