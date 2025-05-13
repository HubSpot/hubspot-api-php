<?php

namespace HubSpot;

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class RetryMiddlewareFactory
{
    public const DEFAULT_MAX_RETRIES = 5;
    public const INTERNAL_ERROR_RANGES = [
        ['from' => 500, 'to' => 503],
        ['from' => 520, 'to' => 599],
    ];

    public static function createInternalErrorsMiddleware(
        ?callable $delayFunction = null,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ) {
        return static::createMiddlewareByHttpCodeRanges(
            static::INTERNAL_ERROR_RANGES,
            $delayFunction,
            $maxRetries
        );
    }

    public static function createRateLimitMiddleware(
        ?callable $delayFunction = null,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ) {
        return static::createMiddlewareByHttpCodes([429], $delayFunction, $maxRetries);
    }

    public static function createMiddlewareByHttpCodes(
        array $codes,
        ?callable $delayFunction,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return Middleware::retry(
            static::getRetryFunction($codes, $maxRetries),
            $delayFunction
        );
    }

    public static function createMiddlewareByHttpCodeRange(
        int $from,
        int $to,
        ?callable $delayFunction,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return static::createMiddlewareByHttpCodeRanges([[$from, $to]], $delayFunction, $maxRetries);
    }

    /**
     * Create middleware by http code ranges.
     *
     * @param array $ranges [['from' => int, 'to' => int]]
     */
    public static function createMiddlewareByHttpCodeRanges(
        array $ranges,
        ?callable $delayFunction,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return Middleware::retry(
            static::getRetryFunctionByRanges($ranges, $maxRetries),
            $delayFunction
        );
    }

    /**
     * Get retry function by code ranges.
     *
     * @param array $ranges [['from' => int, 'to' => int]]
     */
    public static function getRetryFunctionByRanges(
        array $ranges,
        int $maxRetries
    ): callable {
        return function (
            $retries,
            Request $request,
            ?Response $response = null
        ) use ($ranges, $maxRetries) {
            if ($retries >= $maxRetries) {
                return false;
            }

            if (!$response instanceof Response) {
                return false;
            }

            $statusCode = $response->getStatusCode();
            foreach ($ranges as $range) {
                if (key_exists('from', $range) && key_exists('to', $range)) {
                    if ($statusCode >= $range['from'] && $statusCode <= $range['to']) {
                        return true;
                    }
                }
            }

            return false;
        };
    }

    public static function getRetryFunctionByRange(
        int $from,
        int $to,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return static::getRetryFunctionByRanges([['from' => $from, 'to' => $to]], $maxRetries);
    }

    public static function getRetryFunction(
        array $codes,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return function (
            $retries,
            Request $request,
            ?Response $response = null
        ) use ($codes, $maxRetries) {
            if ($retries >= $maxRetries) {
                return false;
            }

            if (($response instanceof Response) && in_array($response->getStatusCode(), $codes)) {
                return true;
            }

            return false;
        };
    }
}
