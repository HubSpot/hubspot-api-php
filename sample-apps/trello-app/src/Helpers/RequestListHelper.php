<?php

namespace Helpers;

class RequestListHelper
{
    const LIST_NAME = 'RequestList';
    const LIMIT = 90;

    public static function ableToPerform(): bool
    {
        $currentTime = round(microtime(true) * 1000);
        $begin = $currentTime - 10000;

        $range = static::getRange();

        return (count($range) < static::LIMIT) || (static::getLastElement($range) < $begin);
    }

    public static function addTimestamp(): void
    {
        RedisHelper::getClient()->lpush(static::LIST_NAME, round(microtime(true) * 1000));
    }

    public static function getRange(): array
    {
        return RedisHelper::getClient()->lrange(static::LIST_NAME, 0, static::LIMIT);
    }

    protected static function getLastElement(array $array)
    {
        end($array);

        return current($array);
    }
}
