<?php

namespace Hubspot\Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use HubSpot\Client\Crm\Contacts\Api\BasicApi;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Configuration;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInputForCreate;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * Exercises the generated client against a mocked transport. These paths differ
 * between Guzzle 7 and Guzzle 8 (removed JSON helpers, removed
 * RequestException::getResponse(), reclassified network exceptions), so they are
 * covered for both major versions.
 *
 * @internal
 *
 * @coversNothing
 */
class GeneratedApiClientTest extends TestCase
{
    /** @test */
    public function itSendsAJsonEncodedBody(): void
    {
        $sent = [];
        $api = $this->apiWithMock([new Response(201, ['Content-Type' => 'application/json'], '{"id":"1","properties":{}}')], $sent);

        $input = new SimplePublicObjectInputForCreate();
        $input->setProperties(['email' => 'test@example.com']);

        $api->create($input);

        $this->assertCount(1, $sent);
        $this->assertSame('POST', $sent[0]->getMethod());
        $this->assertSame('application/json', $sent[0]->getHeaderLine('Content-Type'));
        $this->assertSame(
            ['properties' => ['email' => 'test@example.com']],
            json_decode((string) $sent[0]->getBody(), true)
        );
    }

    /** @test */
    public function itConvertsAnErrorResponseIntoAnApiExceptionWithHeadersAndBody(): void
    {
        $sent = [];
        $api = $this->apiWithMock([new Response(400, ['X-Trace' => 'abc'], '{"message":"bad request"}')], $sent);

        try {
            $api->getById('1');
            $this->fail('Expected ApiException to be thrown');
        } catch (ApiException $e) {
            $this->assertSame(400, $e->getCode());
            $this->assertSame('{"message":"bad request"}', $e->getResponseBody());
            $this->assertSame(['abc'], $e->getResponseHeaders()['X-Trace']);
        }
    }

    /** @test */
    public function itConvertsAResponselessRequestExceptionIntoAnApiException(): void
    {
        $sent = [];
        $api = $this->apiWithMock([
            new RequestException('Body could not be read', new Request('GET', 'https://api.hubapi.com')),
        ], $sent);

        try {
            $api->getById('1');
            $this->fail('Expected ApiException to be thrown');
        } catch (ApiException $e) {
            $this->assertStringContainsString('Body could not be read', $e->getMessage());
            $this->assertNull($e->getResponseBody());
            $this->assertNull($e->getResponseHeaders());
        }
    }

    /** @test */
    public function itConvertsANetworkFailureIntoAnApiException(): void
    {
        $sent = [];
        $api = $this->apiWithMock([
            new ConnectException('cURL error 7: Failed to connect', new Request('GET', 'https://api.hubapi.com')),
        ], $sent);

        try {
            $api->getById('1');
            $this->fail('Expected ApiException to be thrown');
        } catch (ApiException $e) {
            $this->assertStringContainsString('Failed to connect', $e->getMessage());
            $this->assertNull($e->getResponseBody());
        }
    }

    /** @test */
    public function itConvertsAResponselessFailureIntoAnApiExceptionOnTheAsyncPath(): void
    {
        $sent = [];
        $api = $this->apiWithMock([
            new ConnectException('cURL error 7: Failed to connect', new Request('GET', 'https://api.hubapi.com')),
        ], $sent);

        $this->expectException(ApiException::class);

        $api->getByIdAsync('1')->wait();
    }

    /** @test */
    public function itConvertsAnErrorResponseIntoAnApiExceptionOnTheAsyncPath(): void
    {
        $sent = [];
        $api = $this->apiWithMock([new Response(404, ['X-Trace' => 'abc'], '{"message":"not found"}')], $sent);

        try {
            $api->getByIdAsync('1')->wait();
            $this->fail('Expected ApiException to be thrown');
        } catch (ApiException $e) {
            $this->assertSame(404, $e->getCode());
            $this->assertSame('{"message":"not found"}', $e->getResponseBody());
        }
    }

    /**
     * @param array<int, mixed>                  $queue
     * @param array<int, RequestInterface>|mixed $sent
     */
    private function apiWithMock(array $queue, array &$sent): BasicApi
    {
        $stack = HandlerStack::create(new MockHandler($queue));
        $stack->push(function (callable $handler) use (&$sent) {
            return function (RequestInterface $request, array $options) use ($handler, &$sent) {
                $sent[] = $request;

                return $handler($request, $options);
            };
        });

        $config = new Configuration();
        $config->setAccessToken('test-token');

        return new BasicApi(new Client(['handler' => $stack]), $config);
    }
}
