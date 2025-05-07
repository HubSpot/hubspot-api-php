<?php

namespace HubSpot;

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

class RetryMiddlewareFactory
{
    private const DEFAULT_MAX_RETRIES = 5;
    private const INTERNAL_ERROR_RANGES = [
        [500, 503],
        [520, 599]
    ];

    public static function createInternalErrorsMiddleware(
        ?callable $delayFunction = null,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ) {
        return static::createMiddlewareByHttpCodeRanges(
            self::INTERNAL_ERROR_RANGES,
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

    private static function createMiddlewareByHttpCodeRanges(
        array $ranges,
        ?callable $delayFunction,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return Middleware::retry(
            static::getRetryFunctionByRanges($ranges, $maxRetries),
            $delayFunction
        );
    }

    private static function getRetryFunctionByRanges(
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
                if ($statusCode >= $range[0] && $statusCode <= $range[1]) {
                    return true;
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
        return static::getRetryFunctionByRanges([[$from, $to]], $maxRetries);
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
