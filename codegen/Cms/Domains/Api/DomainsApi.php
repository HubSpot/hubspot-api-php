<?php
/**
 * DomainsApi
 * PHP version 7.2
 *
 * @category Class
 * @package  HubSpot\Client\Cms\Domains
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Domains
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Cms\Domains\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Cms\Domains\ApiException;
use HubSpot\Client\Cms\Domains\Configuration;
use HubSpot\Client\Cms\Domains\HeaderSelector;
use HubSpot\Client\Cms\Domains\ObjectSerializer;

/**
 * DomainsApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Cms\Domains
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DomainsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getById
     *
     * Get a single domain
     *
     * @param  string $domain_id The unique ID of the domain. (required)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \HubSpot\Client\Cms\Domains\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Cms\Domains\Model\Domain|\HubSpot\Client\Cms\Domains\Model\Error
     */
    public function getById($domain_id, $archived = null)
    {
        list($response) = $this->getByIdWithHttpInfo($domain_id, $archived);
        return $response;
    }

    /**
     * Operation getByIdWithHttpInfo
     *
     * Get a single domain
     *
     * @param  string $domain_id The unique ID of the domain. (required)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \HubSpot\Client\Cms\Domains\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Cms\Domains\Model\Domain|\HubSpot\Client\Cms\Domains\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getByIdWithHttpInfo($domain_id, $archived = null)
    {
        $request = $this->getByIdRequest($domain_id, $archived);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Cms\Domains\Model\Domain' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Cms\Domains\Model\Domain', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Cms\Domains\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Cms\Domains\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Cms\Domains\Model\Domain';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Cms\Domains\Model\Domain',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Cms\Domains\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getByIdAsync
     *
     * Get a single domain
     *
     * @param  string $domain_id The unique ID of the domain. (required)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getByIdAsync($domain_id, $archived = null)
    {
        return $this->getByIdAsyncWithHttpInfo($domain_id, $archived)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getByIdAsyncWithHttpInfo
     *
     * Get a single domain
     *
     * @param  string $domain_id The unique ID of the domain. (required)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getByIdAsyncWithHttpInfo($domain_id, $archived = null)
    {
        $returnType = '\HubSpot\Client\Cms\Domains\Model\Domain';
        $request = $this->getByIdRequest($domain_id, $archived);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getById'
     *
     * @param  string $domain_id The unique ID of the domain. (required)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getByIdRequest($domain_id, $archived = null)
    {
        // verify the required parameter 'domain_id' is set
        if ($domain_id === null || (is_array($domain_id) && count($domain_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $domain_id when calling getById'
            );
        }

        $resourcePath = '/cms/v3/domains/{domainId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($archived !== null) {
            if('form' === 'form' && is_array($archived)) {
                foreach($archived as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['archived'] = $archived;
            }
        }


        // path params
        if ($domain_id !== null) {
            $resourcePath = str_replace(
                '{' . 'domainId' . '}',
                ObjectSerializer::toPathValue($domain_id),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getPage
     *
     * Get current domains
     *
     * @param  int $created_at Only return domains created at this date. (optional)
     * @param  int $created_after Only return domains created after this date. (optional)
     * @param  int $created_before Only return domains created before this date. (optional)
     * @param  int $updated_at Only return domains updated at this date. (optional)
     * @param  int $updated_after Only return domains updated after this date. (optional)
     * @param  int $updated_before Only return domains updated before this date. (optional)
     * @param  string[] $sort sort (optional)
     * @param  string[] $properties properties (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  string $before before (optional)
     * @param  int $limit Maximum number of results per page. (optional)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \HubSpot\Client\Cms\Domains\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain|\HubSpot\Client\Cms\Domains\Model\Error
     */
    public function getPage($created_at = null, $created_after = null, $created_before = null, $updated_at = null, $updated_after = null, $updated_before = null, $sort = null, $properties = null, $after = null, $before = null, $limit = null, $archived = null)
    {
        list($response) = $this->getPageWithHttpInfo($created_at, $created_after, $created_before, $updated_at, $updated_after, $updated_before, $sort, $properties, $after, $before, $limit, $archived);
        return $response;
    }

    /**
     * Operation getPageWithHttpInfo
     *
     * Get current domains
     *
     * @param  int $created_at Only return domains created at this date. (optional)
     * @param  int $created_after Only return domains created after this date. (optional)
     * @param  int $created_before Only return domains created before this date. (optional)
     * @param  int $updated_at Only return domains updated at this date. (optional)
     * @param  int $updated_after Only return domains updated after this date. (optional)
     * @param  int $updated_before Only return domains updated before this date. (optional)
     * @param  string[] $sort (optional)
     * @param  string[] $properties (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  string $before (optional)
     * @param  int $limit Maximum number of results per page. (optional)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \HubSpot\Client\Cms\Domains\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain|\HubSpot\Client\Cms\Domains\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPageWithHttpInfo($created_at = null, $created_after = null, $created_before = null, $updated_at = null, $updated_after = null, $updated_before = null, $sort = null, $properties = null, $after = null, $before = null, $limit = null, $archived = null)
    {
        $request = $this->getPageRequest($created_at, $created_after, $created_before, $updated_at, $updated_after, $updated_before, $sort, $properties, $after, $before, $limit, $archived);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Cms\Domains\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Cms\Domains\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Cms\Domains\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPageAsync
     *
     * Get current domains
     *
     * @param  int $created_at Only return domains created at this date. (optional)
     * @param  int $created_after Only return domains created after this date. (optional)
     * @param  int $created_before Only return domains created before this date. (optional)
     * @param  int $updated_at Only return domains updated at this date. (optional)
     * @param  int $updated_after Only return domains updated after this date. (optional)
     * @param  int $updated_before Only return domains updated before this date. (optional)
     * @param  string[] $sort (optional)
     * @param  string[] $properties (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  string $before (optional)
     * @param  int $limit Maximum number of results per page. (optional)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPageAsync($created_at = null, $created_after = null, $created_before = null, $updated_at = null, $updated_after = null, $updated_before = null, $sort = null, $properties = null, $after = null, $before = null, $limit = null, $archived = null)
    {
        return $this->getPageAsyncWithHttpInfo($created_at, $created_after, $created_before, $updated_at, $updated_after, $updated_before, $sort, $properties, $after, $before, $limit, $archived)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPageAsyncWithHttpInfo
     *
     * Get current domains
     *
     * @param  int $created_at Only return domains created at this date. (optional)
     * @param  int $created_after Only return domains created after this date. (optional)
     * @param  int $created_before Only return domains created before this date. (optional)
     * @param  int $updated_at Only return domains updated at this date. (optional)
     * @param  int $updated_after Only return domains updated after this date. (optional)
     * @param  int $updated_before Only return domains updated before this date. (optional)
     * @param  string[] $sort (optional)
     * @param  string[] $properties (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  string $before (optional)
     * @param  int $limit Maximum number of results per page. (optional)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPageAsyncWithHttpInfo($created_at = null, $created_after = null, $created_before = null, $updated_at = null, $updated_after = null, $updated_before = null, $sort = null, $properties = null, $after = null, $before = null, $limit = null, $archived = null)
    {
        $returnType = '\HubSpot\Client\Cms\Domains\Model\CollectionResponseWithTotalDomain';
        $request = $this->getPageRequest($created_at, $created_after, $created_before, $updated_at, $updated_after, $updated_before, $sort, $properties, $after, $before, $limit, $archived);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getPage'
     *
     * @param  int $created_at Only return domains created at this date. (optional)
     * @param  int $created_after Only return domains created after this date. (optional)
     * @param  int $created_before Only return domains created before this date. (optional)
     * @param  int $updated_at Only return domains updated at this date. (optional)
     * @param  int $updated_after Only return domains updated after this date. (optional)
     * @param  int $updated_before Only return domains updated before this date. (optional)
     * @param  string[] $sort (optional)
     * @param  string[] $properties (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  string $before (optional)
     * @param  int $limit Maximum number of results per page. (optional)
     * @param  bool $archived Whether to return only results that have been archived. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPageRequest($created_at = null, $created_after = null, $created_before = null, $updated_at = null, $updated_after = null, $updated_before = null, $sort = null, $properties = null, $after = null, $before = null, $limit = null, $archived = null)
    {

        $resourcePath = '/cms/v3/domains/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($created_at !== null) {
            if('form' === 'form' && is_array($created_at)) {
                foreach($created_at as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['createdAt'] = $created_at;
            }
        }
        // query params
        if ($created_after !== null) {
            if('form' === 'form' && is_array($created_after)) {
                foreach($created_after as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['createdAfter'] = $created_after;
            }
        }
        // query params
        if ($created_before !== null) {
            if('form' === 'form' && is_array($created_before)) {
                foreach($created_before as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['createdBefore'] = $created_before;
            }
        }
        // query params
        if ($updated_at !== null) {
            if('form' === 'form' && is_array($updated_at)) {
                foreach($updated_at as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['updatedAt'] = $updated_at;
            }
        }
        // query params
        if ($updated_after !== null) {
            if('form' === 'form' && is_array($updated_after)) {
                foreach($updated_after as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['updatedAfter'] = $updated_after;
            }
        }
        // query params
        if ($updated_before !== null) {
            if('form' === 'form' && is_array($updated_before)) {
                foreach($updated_before as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['updatedBefore'] = $updated_before;
            }
        }
        // query params
        if ($sort !== null) {
            if('form' === 'form' && is_array($sort)) {
                foreach($sort as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['sort'] = $sort;
            }
        }
        // query params
        if ($properties !== null) {
            if('form' === 'form' && is_array($properties)) {
                foreach($properties as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['properties'] = $properties;
            }
        }
        // query params
        if ($after !== null) {
            if('form' === 'form' && is_array($after)) {
                foreach($after as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['after'] = $after;
            }
        }
        // query params
        if ($before !== null) {
            if('form' === 'form' && is_array($before)) {
                foreach($before as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['before'] = $before;
            }
        }
        // query params
        if ($limit !== null) {
            if('form' === 'form' && is_array($limit)) {
                foreach($limit as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['limit'] = $limit;
            }
        }
        // query params
        if ($archived !== null) {
            if('form' === 'form' && is_array($archived)) {
                foreach($archived as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['archived'] = $archived;
            }
        }




        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
