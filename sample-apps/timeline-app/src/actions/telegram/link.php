<?php

use Helpers\TelegramBotHelper;

if (isset($_POST['email'])) {
    $botLink = TelegramBotHelper::generateBotLink($_POST['email']);
}

include __DIR__.'/../../views/telegram/link.php';
