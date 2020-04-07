<?php

namespace Helpers;

use Base64Url\Base64Url;

class TelegramBotHelper
{
    public static function generateBotLink(string $email): string
    {
        return 'https://t.me/'
            .getEnvOrException('TELEGRAM_BOT_USERNAME').'?'
            .http_build_query([
                'start' => Base64Url::encode($email),
            ]);
    }
}
