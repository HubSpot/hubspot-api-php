# Swagger\Client\PipelineStagesApi

All URIs are relative to *https://api.hubapi.com/crm/v3/pipelines*

Method | HTTP request | Description
------------- | ------------- | -------------
[**archive**](PipelineStagesApi.md#archive) | **DELETE** /{objectType}/{pipelineId}/stages/{stageId} | Archive a pipeline stage
[**create**](PipelineStagesApi.md#create) | **POST** /{objectType}/{pipelineId}/stages | Create a pipeline stage
[**getById**](PipelineStagesApi.md#getById) | **GET** /{objectType}/{pipelineId}/stages/{stageId} | Return a pipeline stage by ID
[**getPage**](PipelineStagesApi.md#getPage) | **GET** /{objectType}/{pipelineId}/stages | Return all stages of a pipeline
[**replace**](PipelineStagesApi.md#replace) | **PUT** /{objectType}/{pipelineId}/stages/{stageId} | Replace a pipeline stage
[**update**](PipelineStagesApi.md#update) | **PATCH** /{objectType}/{pipelineId}/stages/{stageId} | Update a pipeline stage


# **archive**
> archive($object_type, $pipeline_id, $stage_id)

Archive a pipeline stage

Archive the pipeline stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`.

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

$apiInstance = new Swagger\Client\Api\PipelineStagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$stage_id = "stage_id_example"; // string | 

try {
    $apiInstance->archive($object_type, $pipeline_id, $stage_id);
} catch (Exception $e) {
    echo 'Exception when calling PipelineStagesApi->archive: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **stage_id** | **string**|  |

### Return type

void (empty response body)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **create**
> \Swagger\Client\Model\PipelineStage create($object_type, $pipeline_id, $body)

Create a pipeline stage

Create a new stage associated with the pipeline identified by `{pipelineId}`. The entire stage object, including its unique ID, will be returned in the response.

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

$apiInstance = new Swagger\Client\Api\PipelineStagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$body = new \Swagger\Client\Model\PipelineStageInput(); // \Swagger\Client\Model\PipelineStageInput | 

try {
    $result = $apiInstance->create($object_type, $pipeline_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelineStagesApi->create: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **body** | [**\Swagger\Client\Model\PipelineStageInput**](../Model/PipelineStageInput.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\PipelineStage**](../Model/PipelineStage.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getById**
> \Swagger\Client\Model\PipelineStage getById($object_type, $pipeline_id, $stage_id, $archived)

Return a pipeline stage by ID

Return the stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`.

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

$apiInstance = new Swagger\Client\Api\PipelineStagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$stage_id = "stage_id_example"; // string | 
$archived = false; // bool | Whether to return only results that have been archived.

try {
    $result = $apiInstance->getById($object_type, $pipeline_id, $stage_id, $archived);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelineStagesApi->getById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **stage_id** | **string**|  |
 **archived** | **bool**| Whether to return only results that have been archived. | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\PipelineStage**](../Model/PipelineStage.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getPage**
> \Swagger\Client\Model\CollectionResponsePipelineStage getPage($object_type, $pipeline_id, $archived)

Return all stages of a pipeline

Return all the stages associated with the pipeline identified by `{pipelineId}`.

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

$apiInstance = new Swagger\Client\Api\PipelineStagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$archived = false; // bool | Whether to return only results that have been archived.

try {
    $result = $apiInstance->getPage($object_type, $pipeline_id, $archived);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelineStagesApi->getPage: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\CollectionResponsePipelineStage**](../Model/CollectionResponsePipelineStage.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **replace**
> \Swagger\Client\Model\PipelineStage replace($object_type, $pipeline_id, $stage_id, $body)

Replace a pipeline stage

Replace all the properties of an existing pipeline stage with the values provided. The updated stage will be returned in the response.

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

$apiInstance = new Swagger\Client\Api\PipelineStagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$stage_id = "stage_id_example"; // string | 
$body = new \Swagger\Client\Model\PipelineStageInput(); // \Swagger\Client\Model\PipelineStageInput | 

try {
    $result = $apiInstance->replace($object_type, $pipeline_id, $stage_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelineStagesApi->replace: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **stage_id** | **string**|  |
 **body** | [**\Swagger\Client\Model\PipelineStageInput**](../Model/PipelineStageInput.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\PipelineStage**](../Model/PipelineStage.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **update**
> \Swagger\Client\Model\PipelineStage update($object_type, $pipeline_id, $stage_id, $archived, $body)

Update a pipeline stage

Perform a partial update of the pipeline stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`. Any properties not included in this update will keep their existing values. The updated stage will be returned in the response.

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

$apiInstance = new Swagger\Client\Api\PipelineStagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$object_type = "object_type_example"; // string | 
$pipeline_id = "pipeline_id_example"; // string | 
$stage_id = "stage_id_example"; // string | 
$archived = false; // bool | Whether to return only results that have been archived.
$body = new \Swagger\Client\Model\PipelineStagePatchInput(); // \Swagger\Client\Model\PipelineStagePatchInput | 

try {
    $result = $apiInstance->update($object_type, $pipeline_id, $stage_id, $archived, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PipelineStagesApi->update: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **object_type** | **string**|  |
 **pipeline_id** | **string**|  |
 **stage_id** | **string**|  |
 **archived** | **bool**| Whether to return only results that have been archived. | [optional] [default to false]
 **body** | [**\Swagger\Client\Model\PipelineStagePatchInput**](../Model/PipelineStagePatchInput.md)|  | [optional]

### Return type

[**\Swagger\Client\Model\PipelineStage**](../Model/PipelineStage.md)

### Authorization

[hapikey](../../README.md#hapikey), [oauth2](../../README.md#oauth2)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

