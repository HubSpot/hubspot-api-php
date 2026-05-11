<?php

namespace HubSpot;

class Delay
{
    public static function getConstantDelayFunction(int $secondsDelay = 10)
    {
        return function ($retries) use ($secondsDelay) {
            return 1000 * $secondsDelay;
        };
    }

    public static function getLinearDelayFunction()
    {
        return function ($retries) {
            return 1000 * $retries;
        };
    }

    /**
     * @deprecated Pass null as the delay function instead — Guzzle will apply its built-in exponential delay via \GuzzleHttp\RetryMiddleware::exponentialDelay.
     */
    public static function getExponentialDelayFunction(int $base)
    {
        return function ($retries) use ($base) {
            return 1000 * pow($base, $retries);
        };
    }
}
