<?php
/**
 * OwnersApi
 * PHP version 7.3
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Owners
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CRM Owners
 *
 * HubSpot uses **owners** to assign CRM objects to specific people in your organization. The endpoints described here are used to get a list of the owners that are available for an account. To assign an owner to an object, set the hubspot_owner_id property using the appropriate CRM object update or create a request.  If teams are available for your HubSpot tier, these endpoints will also indicate which team an owner belongs to. Team membership can be one of PRIMARY (default), SECONDARY, or CHILD.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Owners\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Crm\Owners\ApiException;
use HubSpot\Client\Crm\Owners\Configuration;
use HubSpot\Client\Crm\Owners\HeaderSelector;
use HubSpot\Client\Crm\Owners\ObjectSerializer;

/**
 * OwnersApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Owners
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OwnersApi
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
     * Read an owner by given &#x60;id&#x60; or &#x60;userId&#x60;
     *
     * @param  int $owner_id owner_id (required)
     * @param  string $id_property id_property (optional, default to 'id')
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \HubSpot\Client\Crm\Owners\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Crm\Owners\Model\PublicOwner|\HubSpot\Client\Crm\Owners\Model\Error
     */
    public function getById($owner_id, $id_property = 'id', $archived = false)
    {
        list($response) = $this->getByIdWithHttpInfo($owner_id, $id_property, $archived);
        return $response;
    }

    /**
     * Operation getByIdWithHttpInfo
     *
     * Read an owner by given &#x60;id&#x60; or &#x60;userId&#x60;
     *
     * @param  int $owner_id (required)
     * @param  string $id_property (optional, default to 'id')
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \HubSpot\Client\Crm\Owners\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Crm\Owners\Model\PublicOwner|\HubSpot\Client\Crm\Owners\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getByIdWithHttpInfo($owner_id, $id_property = 'id', $archived = false)
    {
        $request = $this->getByIdRequest($owner_id, $id_property, $archived);

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
                    if ('\HubSpot\Client\Crm\Owners\Model\PublicOwner' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Owners\Model\PublicOwner', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Crm\Owners\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Owners\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Crm\Owners\Model\PublicOwner';
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
                        '\HubSpot\Client\Crm\Owners\Model\PublicOwner',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Owners\Model\Error',
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
     * Read an owner by given &#x60;id&#x60; or &#x60;userId&#x60;
     *
     * @param  int $owner_id (required)
     * @param  string $id_property (optional, default to 'id')
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getByIdAsync($owner_id, $id_property = 'id', $archived = false)
    {
        return $this->getByIdAsyncWithHttpInfo($owner_id, $id_property, $archived)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getByIdAsyncWithHttpInfo
     *
     * Read an owner by given &#x60;id&#x60; or &#x60;userId&#x60;
     *
     * @param  int $owner_id (required)
     * @param  string $id_property (optional, default to 'id')
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getByIdAsyncWithHttpInfo($owner_id, $id_property = 'id', $archived = false)
    {
        $returnType = '\HubSpot\Client\Crm\Owners\Model\PublicOwner';
        $request = $this->getByIdRequest($owner_id, $id_property, $archived);

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
     * @param  int $owner_id (required)
     * @param  string $id_property (optional, default to 'id')
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getByIdRequest($owner_id, $id_property = 'id', $archived = false)
    {
        // verify the required parameter 'owner_id' is set
        if ($owner_id === null || (is_array($owner_id) && count($owner_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $owner_id when calling getById'
            );
        }

        $resourcePath = '/crm/v3/owners/{ownerId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($id_property !== null) {
            if('form' === 'form' && is_array($id_property)) {
                foreach($id_property as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['idProperty'] = $id_property;
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


        // path params
        if ($owner_id !== null) {
            $resourcePath = str_replace(
                '{' . 'ownerId' . '}',
                ObjectSerializer::toPathValue($owner_id),
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
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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
     * Get a page of owners
     *
     * @param  string $email Filter by email address (optional) (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  int $limit The maximum number of results to display per page. (optional, default to 100)
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \HubSpot\Client\Crm\Owners\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging|\HubSpot\Client\Crm\Owners\Model\Error
     */
    public function getPage($email = null, $after = null, $limit = 100, $archived = false)
    {
        list($response) = $this->getPageWithHttpInfo($email, $after, $limit, $archived);
        return $response;
    }

    /**
     * Operation getPageWithHttpInfo
     *
     * Get a page of owners
     *
     * @param  string $email Filter by email address (optional) (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  int $limit The maximum number of results to display per page. (optional, default to 100)
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \HubSpot\Client\Crm\Owners\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging|\HubSpot\Client\Crm\Owners\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPageWithHttpInfo($email = null, $after = null, $limit = 100, $archived = false)
    {
        $request = $this->getPageRequest($email, $after, $limit, $archived);

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
                    if ('\HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Crm\Owners\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Owners\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging';
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
                        '\HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Owners\Model\Error',
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
     * Get a page of owners
     *
     * @param  string $email Filter by email address (optional) (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  int $limit The maximum number of results to display per page. (optional, default to 100)
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPageAsync($email = null, $after = null, $limit = 100, $archived = false)
    {
        return $this->getPageAsyncWithHttpInfo($email, $after, $limit, $archived)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPageAsyncWithHttpInfo
     *
     * Get a page of owners
     *
     * @param  string $email Filter by email address (optional) (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  int $limit The maximum number of results to display per page. (optional, default to 100)
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPageAsyncWithHttpInfo($email = null, $after = null, $limit = 100, $archived = false)
    {
        $returnType = '\HubSpot\Client\Crm\Owners\Model\CollectionResponsePublicOwnerForwardPaging';
        $request = $this->getPageRequest($email, $after, $limit, $archived);

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
     * @param  string $email Filter by email address (optional) (optional)
     * @param  string $after The paging cursor token of the last successfully read resource will be returned as the &#x60;paging.next.after&#x60; JSON property of a paged response containing more results. (optional)
     * @param  int $limit The maximum number of results to display per page. (optional, default to 100)
     * @param  bool $archived Whether to return only results that have been archived. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPageRequest($email = null, $after = null, $limit = 100, $archived = false)
    {

        $resourcePath = '/crm/v3/owners/';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($email !== null) {
            if('form' === 'form' && is_array($email)) {
                foreach($email as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['email'] = $email;
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
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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