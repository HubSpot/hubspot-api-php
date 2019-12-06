# PipelinePatchInput

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**label** | **string** | A unique label used to organize pipelines in HubSpot&#39;s UI | [optional] 
**display_order** | **int** | The order for displaying this pipeline. If two pipelines have a matching &#x60;displayOrder&#x60;, they will be sorted alphabetically by label. | [optional] 
**archived** | **bool** | Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it&#39;s provided in any other call, the request will fail and a &#x60;400 Bad Request&#x60; will be returned. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


