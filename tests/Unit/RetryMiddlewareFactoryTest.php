<?php

namespace Hubspot\Tests\Unit;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\NetworkException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ResponseTransferException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use HubSpot\RetryMiddlewareFactory;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class RetryMiddlewareFactoryTest extends TestCase
{
    public function testRetriesTransferFailuresUsingActualGuzzleExceptionTypes(): void
    {
        $request = new Request('GET', 'https://api.hubapi.com/test');
        foreach (RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES as $errno) {
            $exception = $this->connectionException($errno, $request);

            $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors();
            $this->assertTrue($retry(0, $request, null, $exception), "cURL error {$errno}");
            $this->assertFalse($retry(5, $request, null, $exception));
            $restricted = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([7]);
            $this->assertFalse($restricted(0, $request, null, $exception));
            $unrestricted = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([]);
            $this->assertTrue($unrestricted(0, $request, null, $exception));
        }
    }

    public function testRetriesTransferFailuresThatHappenAfterResponseHeaders(): void
    {
        $request = new Request('GET', 'https://api.hubapi.com/test');
        foreach (RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES as $errno) {
            $exception = $this->responseTransferException($errno, $request);

            $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors();
            $this->assertTrue($retry(0, $request, null, $exception), "cURL error {$errno}");
            $this->assertFalse($retry(5, $request, null, $exception));
            $restricted = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([7]);
            $this->assertFalse($restricted(0, $request, null, $exception));
            $unrestricted = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([]);
            $this->assertTrue($unrestricted(0, $request, null, $exception));
        }
    }

    public function testRetriesCurlErrorCodesRequestedByTheCaller(): void
    {
        $request = new Request('GET', 'https://api.hubapi.com/test');
        // CURLE_PARTIAL_FILE, not part of the default set.
        $exception = $this->responseTransferException(18, $request);

        $requested = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([18]);
        $this->assertTrue($requested(0, $request, null, $exception));
        $default = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors();
        $this->assertFalse($default(0, $request, null, $exception));
        $unrestricted = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors([]);
        $this->assertTrue($unrestricted(0, $request, null, $exception));
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

    public function testDoesNotRetryHttpErrorsContainingCurlErrorMessages(): void
    {
        $request = new Request('POST', 'https://api.hubapi.com/test');
        foreach ([400, 500] as $statusCode) {
            $response = new Response($statusCode, ['Content-Type' => 'application/json'], '{"message":"cURL error 56: upstream failure"}');
            $exception = RequestException::create($request, $response);
            $this->assertStringContainsString('cURL error 56:', $exception->getMessage());

            foreach ([RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, [56], []] as $curlErrorCodes) {
                $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors($curlErrorCodes);
                $this->assertFalse($retry(0, $request, null, $exception));
            }
        }
    }

    /** @test */
    public function itStopsRetryingWhenMaxRetriesReached(): void
    {
        $retry = RetryMiddlewareFactory::getRetryFunctionByConnectionErrors(RetryMiddlewareFactory::TRANSIENT_CURL_ERROR_CODES, 1);
        $request = new Request('GET', 'https://api.hubapi.com/test');
        $exception = $this->connectionException(56, $request);

        $this->assertFalse($retry(1, $request, null, $exception));
    }

    /**
     * Builds a failure before response headers using the installed Guzzle version.
     */
    private function connectionException(int $errno, Request $request): \Exception
    {
        $message = sprintf('cURL error %d: transfer failed', $errno);

        if (class_exists(NetworkException::class)) {
            return new NetworkException($message, $request);
        }

        if (in_array($errno, [6, 7, 28, 35, 52], true)) {
            return new ConnectException($message, $request, null, ['errno' => $errno]);
        }

        return new RequestException($message, $request, null, null, ['errno' => $errno]);
    }

    /**
     * Builds a failure after response headers using the installed Guzzle version.
     */
    private function responseTransferException(int $errno, Request $request): \Exception
    {
        $message = sprintf('cURL error %d: transfer failed', $errno);

        if (class_exists(ResponseTransferException::class)) {
            return new ResponseTransferException($message, $request, new Response(200));
        }

        return new RequestException($message, $request, new Response(200), null, ['errno' => $errno]);
    }
}
