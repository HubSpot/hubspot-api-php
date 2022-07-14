<?php

namespace HubSpot\Utils;

class Timestamp
{
    public static function getCurrentTimestamp13Digits(): int
    {
        return intval(microtime(true) * 1000);
    }
}
