<?php

namespace HubSpot;

use GuzzleHttp\Middleware;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RetryMiddlewareFactory
{
    public const DEFAULT_MAX_RETRIES = 5;
    public const TRANSIENT_CURL_ERROR_CODES = [52, 55, 56];
    public const INTERNAL_ERROR_RANGES = [
        ['from' => 500, 'to' => 503],
        ['from' => 520, 'to' => 599],
    ];

    public static function createConnectionErrorsMiddleware(
        ?callable $delayFunction = null,
        int $maxRetries = self::DEFAULT_MAX_RETRIES,
        array $curlErrorCodes = self::TRANSIENT_CURL_ERROR_CODES
    ): callable {
        return Middleware::retry(
            static::getRetryFunctionByConnectionErrors($curlErrorCodes, $maxRetries),
            $delayFunction
        );
    }

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
            RequestInterface $request,
            ?ResponseInterface $response = null
        ) use ($ranges, $maxRetries) {
            if ($retries >= $maxRetries) {
                return false;
            }

            if (!$response instanceof ResponseInterface) {
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
            RequestInterface $request,
            ?ResponseInterface $response = null
        ) use ($codes, $maxRetries) {
            if ($retries >= $maxRetries) {
                return false;
            }

            if (($response instanceof ResponseInterface) && in_array($response->getStatusCode(), $codes)) {
                return true;
            }

            return false;
        };
    }

    public static function getRetryFunctionByConnectionErrors(
        array $curlErrorCodes = self::TRANSIENT_CURL_ERROR_CODES,
        int $maxRetries = self::DEFAULT_MAX_RETRIES
    ): callable {
        return function (
            $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            $exception = null
        ) use ($maxRetries, $curlErrorCodes) {
            if ($retries >= $maxRetries) {
                return false;
            }

            // Guzzle 7 reports connection failures as ConnectException, Guzzle 8
            // splits them across ConnectException and NetworkException. Both
            // implement PSR-18's NetworkExceptionInterface.
            if (!$exception instanceof NetworkExceptionInterface) {
                return false;
            }

            if (empty($curlErrorCodes)) {
                return true;
            }

            // RequestException::getHandlerContext() was removed in Guzzle 8, so the
            // cURL errno is read from the exception message in both major versions.
            if (1 === preg_match('/cURL error\s+(\d+):/i', $exception->getMessage(), $matches)) {
                return in_array((int) $matches[1], $curlErrorCodes, true);
            }

            return false;
        };
    }
}
