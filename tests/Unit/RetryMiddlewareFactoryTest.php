<?php

namespace Hubspot\Tests\Unit;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use HubSpot\RetryMiddlewareFactory;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class RetryMiddlewareFactoryTest extends TestCase
{
    /** @test */
    public function itRetriesRetriableConnectionErrorsByMessage(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 3);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new ConnectException(
            'cURL error 56: OpenSSL SSL_read unexpected eof while reading',
            $request
        );

        $this->assertTrue($retry(0, $request, null, $exception));
    }

    /** @test */
    public function itRetriesRetriableSendErrors(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 3);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new ConnectException(
            'cURL error 55: Send failure: Broken pipe',
            $request
        );

        $this->assertTrue($retry(0, $request, null, $exception));
    }

    /** @test */
    public function itDoesNotRetryNonRetriableConnectionErrors(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 3);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new ConnectException(
            'cURL error 60: SSL certificate problem',
            $request
        );

        $this->assertFalse($retry(0, $request, null, $exception));
    }

    /** @test */
    public function itDoesNotRetryConnectionErrorsWithoutACurlErrno(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 3);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new ConnectException('Connection failed', $request);

        $this->assertFalse($retry(0, $request, null, $exception));
    }

    /** @test */
    public function itRetriesAnyConnectionErrorWhenNoCurlErrorCodesAreGiven(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([], 3);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new ConnectException('Connection failed', $request);

        $this->assertTrue($retry(0, $request, null, $exception));
    }

    /** @test */
    public function itDoesNotRetryExceptionsThatAreNotNetworkFailures(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 3);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new RequestException('cURL error 56: something else', $request);

        $this->assertFalse($retry(0, $request, null, $exception));
    }

    /** @test */
    public function itStopsRetryingWhenMaxRetriesReached(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 1);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = new ConnectException(
            'cURL error 56: OpenSSL SSL_read unexpected eof while reading',
            $request
        );

        $this->assertFalse($retry(1, $request, null, $exception));
    }
}
