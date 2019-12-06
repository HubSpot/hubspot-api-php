# Swagger\Client\PipelinesApi

All URIs are relative to *https://api.hubapi.com/crm/v3/pipelines*

Method | HTTP request | Description
------------- | ------------- | -------------
[**archive**](PipelinesApi.md#archive) | **DELETE** /{objectType}/{pipelineId} | Archive a pipeline
[**create**](PipelinesApi.md#create) | **POST** /{objectType} | Create a pipeline
[**getById**](PipelinesApi.md#getById) | **GET** /{objectType}/{pipelineId} | Return a pipeline by ID
[**getPage**](PipelinesApi.md#getPage) | **GET** /{objectType} | Retrieve all pipelines
[**replace**](PipelinesApi.md#replace) | **PUT** /{objectType}/{pipelineId} | Replace a pipeline
[**update**](PipelinesApi.md#update) | **PATCH** /{objectType}/{pipelineId} | Update a pipeline


# **archive**
> archive($object_type, $pipeline_id)

Archive a pipeline

Archive the pipeline identified by `{pipelineId}`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: hapikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('hapikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('hapikey', 'Bearer');
// Configure OAuth2 access token for authorization: oauth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\PipelinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 

try {
    $apiInstance->archive($object_type, $pipeline_id);
} catch (Exception $e) {
    echo 'Exception when calling PipelinesApi->archive: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |

### Return type

void (empty response body)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **create**
> \Swagger\Client\Model\Pipeline create($object_type, $body)

Create a pipeline

Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: hapikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('hapikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('hapikey', 'Bearer');
// Configure OAuth2 access token for authorization: oauth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\PipelinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$body = new \Swagger\Client\Model\PipelineInput(); // \Swagger\Client\Model\PipelineInput | 

try {
    $result = $apiInstance->create($object_type, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelinesApi->create: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **body** | [**\Swagger\Client\Model\PipelineInput**](../Model/PipelineInput.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\Pipeline**](../Model/Pipeline.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getById**
> \Swagger\Client\Model\Pipeline getById($object_type, $pipeline_id, $archived)

Return a pipeline by ID

Return a single pipeline object identified by its unique `{pipelineId}`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: hapikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('hapikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('hapikey', 'Bearer');
// Configure OAuth2 access token for authorization: oauth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\PipelinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$archived = false; // bool | Whether to return only results that have been archived.

try {
    $result = $apiInstance->getById($object_type, $pipeline_id, $archived);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelinesApi->getById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **archived** | **bool**| Whether to return only results that have been archived. | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\Pipeline**](../Model/Pipeline.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPage**
> \Swagger\Client\Model\CollectionResponsePipeline getPage($object_type, $archived)

Retrieve all pipelines

Return all pipelines for the object type specified by `{objectType}`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: hapikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('hapikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('hapikey', 'Bearer');
// Configure OAuth2 access token for authorization: oauth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\PipelinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$archived = false; // bool | Whether to return only results that have been archived.

try {
    $result = $apiInstance->getPage($object_type, $archived);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelinesApi->getPage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **archived** | **bool**| Whether to return only results that have been archived. | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\CollectionResponsePipeline**](../Model/CollectionResponsePipeline.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **replace**
> \Swagger\Client\Model\Pipeline replace($object_type, $pipeline_id, $body)

Replace a pipeline

Replace all the properties of an existing pipeline with the values provided. This will overwrite any existing pipeline stages. The updated pipeline will be returned in the response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: hapikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('hapikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('hapikey', 'Bearer');
// Configure OAuth2 access token for authorization: oauth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\PipelinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$body = new \Swagger\Client\Model\PipelineInput(); // \Swagger\Client\Model\PipelineInput | 

try {
    $result = $apiInstance->replace($object_type, $pipeline_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelinesApi->replace: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **body** | [**\Swagger\Client\Model\PipelineInput**](../Model/PipelineInput.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\Pipeline**](../Model/Pipeline.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **update**
> \Swagger\Client\Model\Pipeline update($object_type, $pipeline_id, $archived, $body)

Update a pipeline

Perform a partial update of the pipeline identified by `{pipelineId}`. The updated pipeline will be returned in the response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: hapikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('hapikey', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('hapikey', 'Bearer');
// Configure OAuth2 access token for authorization: oauth2
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$apiInstance = new Swagger\Client\Api\PipelinesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$archived = false; // bool | Whether to return only results that have been archived.
$body = new \Swagger\Client\Model\PipelinePatchInput(); // \Swagger\Client\Model\PipelinePatchInput | 

try {
    $result = $apiInstance->update($object_type, $pipeline_id, $archived, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelinesApi->update: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **archived** | **bool**| Whether to return only results that have been archived. | [optional] [default to false]
 **body** | [**\Swagger\Client\Model\PipelinePatchInput**](../Model/PipelinePatchInput.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\Pipeline**](../Model/Pipeline.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

