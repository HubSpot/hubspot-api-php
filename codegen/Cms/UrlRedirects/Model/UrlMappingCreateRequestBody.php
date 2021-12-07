<?php
/**
 * UrlMappingCreateRequestBody
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  HubSpot\Client\Cms\UrlRedirects
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * URL redirects
 *
 * URL redirect operations
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

namespace HubSpot\Client\Cms\UrlRedirects\Model;

use \ArrayAccess;
use \HubSpot\Client\Cms\UrlRedirects\ObjectSerializer;

/**
 * UrlMappingCreateRequestBody Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Cms\UrlRedirects
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class UrlMappingCreateRequestBody implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UrlMappingCreateRequestBody';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'route_prefix' => 'string',
        'destination' => 'string',
        'redirect_style' => 'int',
        'precedence' => 'int',
        'is_only_after_not_found' => 'bool',
        'is_match_full_url' => 'bool',
        'is_match_query_string' => 'bool',
        'is_pattern' => 'bool',
        'is_trailing_slash_optional' => 'bool',
        'is_protocol_agnostic' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'route_prefix' => null,
        'destination' => null,
        'redirect_style' => 'int32',
        'precedence' => 'int32',
        'is_only_after_not_found' => null,
        'is_match_full_url' => null,
        'is_match_query_string' => null,
        'is_pattern' => null,
        'is_trailing_slash_optional' => null,
        'is_protocol_agnostic' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'route_prefix' => 'routePrefix',
        'destination' => 'destination',
        'redirect_style' => 'redirectStyle',
        'precedence' => 'precedence',
        'is_only_after_not_found' => 'isOnlyAfterNotFound',
        'is_match_full_url' => 'isMatchFullUrl',
        'is_match_query_string' => 'isMatchQueryString',
        'is_pattern' => 'isPattern',
        'is_trailing_slash_optional' => 'isTrailingSlashOptional',
        'is_protocol_agnostic' => 'isProtocolAgnostic'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'route_prefix' => 'setRoutePrefix',
        'destination' => 'setDestination',
        'redirect_style' => 'setRedirectStyle',
        'precedence' => 'setPrecedence',
        'is_only_after_not_found' => 'setIsOnlyAfterNotFound',
        'is_match_full_url' => 'setIsMatchFullUrl',
        'is_match_query_string' => 'setIsMatchQueryString',
        'is_pattern' => 'setIsPattern',
        'is_trailing_slash_optional' => 'setIsTrailingSlashOptional',
        'is_protocol_agnostic' => 'setIsProtocolAgnostic'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'route_prefix' => 'getRoutePrefix',
        'destination' => 'getDestination',
        'redirect_style' => 'getRedirectStyle',
        'precedence' => 'getPrecedence',
        'is_only_after_not_found' => 'getIsOnlyAfterNotFound',
        'is_match_full_url' => 'getIsMatchFullUrl',
        'is_match_query_string' => 'getIsMatchQueryString',
        'is_pattern' => 'getIsPattern',
        'is_trailing_slash_optional' => 'getIsTrailingSlashOptional',
        'is_protocol_agnostic' => 'getIsProtocolAgnostic'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['route_prefix'] = $data['route_prefix'] ?? null;
        $this->container['destination'] = $data['destination'] ?? null;
        $this->container['redirect_style'] = $data['redirect_style'] ?? null;
        $this->container['precedence'] = $data['precedence'] ?? null;
        $this->container['is_only_after_not_found'] = $data['is_only_after_not_found'] ?? null;
        $this->container['is_match_full_url'] = $data['is_match_full_url'] ?? null;
        $this->container['is_match_query_string'] = $data['is_match_query_string'] ?? null;
        $this->container['is_pattern'] = $data['is_pattern'] ?? null;
        $this->container['is_trailing_slash_optional'] = $data['is_trailing_slash_optional'] ?? null;
        $this->container['is_protocol_agnostic'] = $data['is_protocol_agnostic'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['route_prefix'] === null) {
            $invalidProperties[] = "'route_prefix' can't be null";
        }
        if ($this->container['destination'] === null) {
            $invalidProperties[] = "'destination' can't be null";
        }
        if ($this->container['redirect_style'] === null) {
            $invalidProperties[] = "'redirect_style' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets route_prefix
     *
     * @return string
     */
    public function getRoutePrefix()
    {
        return $this->container['route_prefix'];
    }

    /**
     * Sets route_prefix
     *
     * @param string $route_prefix route_prefix
     *
     * @return self
     */
    public function setRoutePrefix($route_prefix)
    {
        $this->container['route_prefix'] = $route_prefix;

        return $this;
    }

    /**
     * Gets destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->container['destination'];
    }

    /**
     * Sets destination
     *
     * @param string $destination destination
     *
     * @return self
     */
    public function setDestination($destination)
    {
        $this->container['destination'] = $destination;

        return $this;
    }

    /**
     * Gets redirect_style
     *
     * @return int
     */
    public function getRedirectStyle()
    {
        return $this->container['redirect_style'];
    }

    /**
     * Sets redirect_style
     *
     * @param int $redirect_style redirect_style
     *
     * @return self
     */
    public function setRedirectStyle($redirect_style)
    {
        $this->container['redirect_style'] = $redirect_style;

        return $this;
    }

    /**
     * Gets precedence
     *
     * @return int|null
     */
    public function getPrecedence()
    {
        return $this->container['precedence'];
    }

    /**
     * Sets precedence
     *
     * @param int|null $precedence precedence
     *
     * @return self
     */
    public function setPrecedence($precedence)
    {
        $this->container['precedence'] = $precedence;

        return $this;
    }

    /**
     * Gets is_only_after_not_found
     *
     * @return bool|null
     */
    public function getIsOnlyAfterNotFound()
    {
        return $this->container['is_only_after_not_found'];
    }

    /**
     * Sets is_only_after_not_found
     *
     * @param bool|null $is_only_after_not_found is_only_after_not_found
     *
     * @return self
     */
    public function setIsOnlyAfterNotFound($is_only_after_not_found)
    {
        $this->container['is_only_after_not_found'] = $is_only_after_not_found;

        return $this;
    }

    /**
     * Gets is_match_full_url
     *
     * @return bool|null
     */
    public function getIsMatchFullUrl()
    {
        return $this->container['is_match_full_url'];
    }

    /**
     * Sets is_match_full_url
     *
     * @param bool|null $is_match_full_url is_match_full_url
     *
     * @return self
     */
    public function setIsMatchFullUrl($is_match_full_url)
    {
        $this->container['is_match_full_url'] = $is_match_full_url;

        return $this;
    }

    /**
     * Gets is_match_query_string
     *
     * @return bool|null
     */
    public function getIsMatchQueryString()
    {
        return $this->container['is_match_query_string'];
    }

    /**
     * Sets is_match_query_string
     *
     * @param bool|null $is_match_query_string is_match_query_string
     *
     * @return self
     */
    public function setIsMatchQueryString($is_match_query_string)
    {
        $this->container['is_match_query_string'] = $is_match_query_string;

        return $this;
    }

    /**
     * Gets is_pattern
     *
     * @return bool|null
     */
    public function getIsPattern()
    {
        return $this->container['is_pattern'];
    }

    /**
     * Sets is_pattern
     *
     * @param bool|null $is_pattern is_pattern
     *
     * @return self
     */
    public function setIsPattern($is_pattern)
    {
        $this->container['is_pattern'] = $is_pattern;

        return $this;
    }

    /**
     * Gets is_trailing_slash_optional
     *
     * @return bool|null
     */
    public function getIsTrailingSlashOptional()
    {
        return $this->container['is_trailing_slash_optional'];
    }

    /**
     * Sets is_trailing_slash_optional
     *
     * @param bool|null $is_trailing_slash_optional is_trailing_slash_optional
     *
     * @return self
     */
    public function setIsTrailingSlashOptional($is_trailing_slash_optional)
    {
        $this->container['is_trailing_slash_optional'] = $is_trailing_slash_optional;

        return $this;
    }

    /**
     * Gets is_protocol_agnostic
     *
     * @return bool|null
     */
    public function getIsProtocolAgnostic()
    {
        return $this->container['is_protocol_agnostic'];
    }

    /**
     * Sets is_protocol_agnostic
     *
     * @param bool|null $is_protocol_agnostic is_protocol_agnostic
     *
     * @return self
     */
    public function setIsProtocolAgnostic($is_protocol_agnostic)
    {
        $this->container['is_protocol_agnostic'] = $is_protocol_agnostic;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


