<?php
/**
 * SettingsResponse
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Extensions\Calling
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CRM Calling Extensions
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.12.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Extensions\Calling\Model;

use \ArrayAccess;
use \HubSpot\Client\Crm\Extensions\Calling\ObjectSerializer;

/**
 * SettingsResponse Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Extensions\Calling
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SettingsResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SettingsResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'created_at' => '\DateTime',
        'supports_custom_objects' => 'bool',
        'uses_remote' => 'bool',
        'is_ready' => 'bool',
        'name' => 'string',
        'width' => 'int',
        'uses_calling_window' => 'bool',
        'supports_inbound_calling' => 'bool',
        'url' => 'string',
        'height' => 'int',
        'updated_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'created_at' => 'date-time',
        'supports_custom_objects' => null,
        'uses_remote' => null,
        'is_ready' => null,
        'name' => null,
        'width' => 'int32',
        'uses_calling_window' => null,
        'supports_inbound_calling' => null,
        'url' => null,
        'height' => 'int32',
        'updated_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'created_at' => false,
        'supports_custom_objects' => false,
        'uses_remote' => false,
        'is_ready' => false,
        'name' => false,
        'width' => false,
        'uses_calling_window' => false,
        'supports_inbound_calling' => false,
        'url' => false,
        'height' => false,
        'updated_at' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'created_at' => 'createdAt',
        'supports_custom_objects' => 'supportsCustomObjects',
        'uses_remote' => 'usesRemote',
        'is_ready' => 'isReady',
        'name' => 'name',
        'width' => 'width',
        'uses_calling_window' => 'usesCallingWindow',
        'supports_inbound_calling' => 'supportsInboundCalling',
        'url' => 'url',
        'height' => 'height',
        'updated_at' => 'updatedAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'created_at' => 'setCreatedAt',
        'supports_custom_objects' => 'setSupportsCustomObjects',
        'uses_remote' => 'setUsesRemote',
        'is_ready' => 'setIsReady',
        'name' => 'setName',
        'width' => 'setWidth',
        'uses_calling_window' => 'setUsesCallingWindow',
        'supports_inbound_calling' => 'setSupportsInboundCalling',
        'url' => 'setUrl',
        'height' => 'setHeight',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'created_at' => 'getCreatedAt',
        'supports_custom_objects' => 'getSupportsCustomObjects',
        'uses_remote' => 'getUsesRemote',
        'is_ready' => 'getIsReady',
        'name' => 'getName',
        'width' => 'getWidth',
        'uses_calling_window' => 'getUsesCallingWindow',
        'supports_inbound_calling' => 'getSupportsInboundCalling',
        'url' => 'getUrl',
        'height' => 'getHeight',
        'updated_at' => 'getUpdatedAt'
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
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('supports_custom_objects', $data ?? [], null);
        $this->setIfExists('uses_remote', $data ?? [], null);
        $this->setIfExists('is_ready', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('width', $data ?? [], null);
        $this->setIfExists('uses_calling_window', $data ?? [], null);
        $this->setIfExists('supports_inbound_calling', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
        $this->setIfExists('height', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['supports_custom_objects'] === null) {
            $invalidProperties[] = "'supports_custom_objects' can't be null";
        }
        if ($this->container['uses_remote'] === null) {
            $invalidProperties[] = "'uses_remote' can't be null";
        }
        if ($this->container['is_ready'] === null) {
            $invalidProperties[] = "'is_ready' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['width'] === null) {
            $invalidProperties[] = "'width' can't be null";
        }
        if ($this->container['uses_calling_window'] === null) {
            $invalidProperties[] = "'uses_calling_window' can't be null";
        }
        if ($this->container['supports_inbound_calling'] === null) {
            $invalidProperties[] = "'supports_inbound_calling' can't be null";
        }
        if ($this->container['url'] === null) {
            $invalidProperties[] = "'url' can't be null";
        }
        if ($this->container['height'] === null) {
            $invalidProperties[] = "'height' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
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
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at When this calling extension was created.
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets supports_custom_objects
     *
     * @return bool
     */
    public function getSupportsCustomObjects()
    {
        return $this->container['supports_custom_objects'];
    }

    /**
     * Sets supports_custom_objects
     *
     * @param bool $supports_custom_objects When true, users will be able to click to dial from custom objects.
     *
     * @return self
     */
    public function setSupportsCustomObjects($supports_custom_objects)
    {
        if (is_null($supports_custom_objects)) {
            throw new \InvalidArgumentException('non-nullable supports_custom_objects cannot be null');
        }
        $this->container['supports_custom_objects'] = $supports_custom_objects;

        return $this;
    }

    /**
     * Gets uses_remote
     *
     * @return bool
     */
    public function getUsesRemote()
    {
        return $this->container['uses_remote'];
    }

    /**
     * Sets uses_remote
     *
     * @param bool $uses_remote When false, this indicates that your calling app does not use the anchored calling remote within the HubSpot app.
     *
     * @return self
     */
    public function setUsesRemote($uses_remote)
    {
        if (is_null($uses_remote)) {
            throw new \InvalidArgumentException('non-nullable uses_remote cannot be null');
        }
        $this->container['uses_remote'] = $uses_remote;

        return $this;
    }

    /**
     * Gets is_ready
     *
     * @return bool
     */
    public function getIsReady()
    {
        return $this->container['is_ready'];
    }

    /**
     * Sets is_ready
     *
     * @param bool $is_ready When true, this indicates that your calling app is ready for production. Users will be able to select your calling app as their provider and can then click to dial within HubSpot.
     *
     * @return self
     */
    public function setIsReady($is_ready)
    {
        if (is_null($is_ready)) {
            throw new \InvalidArgumentException('non-nullable is_ready cannot be null');
        }
        $this->container['is_ready'] = $is_ready;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name The name of your calling service to display to users.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width
     *
     * @param int $width The target width of the iframe that will contain your phone/calling UI.
     *
     * @return self
     */
    public function setWidth($width)
    {
        if (is_null($width)) {
            throw new \InvalidArgumentException('non-nullable width cannot be null');
        }
        $this->container['width'] = $width;

        return $this;
    }

    /**
     * Gets uses_calling_window
     *
     * @return bool
     */
    public function getUsesCallingWindow()
    {
        return $this->container['uses_calling_window'];
    }

    /**
     * Sets uses_calling_window
     *
     * @param bool $uses_calling_window When false, this indicates that your calling app does not require the use of the separate calling window to hold the call connection.
     *
     * @return self
     */
    public function setUsesCallingWindow($uses_calling_window)
    {
        if (is_null($uses_calling_window)) {
            throw new \InvalidArgumentException('non-nullable uses_calling_window cannot be null');
        }
        $this->container['uses_calling_window'] = $uses_calling_window;

        return $this;
    }

    /**
     * Gets supports_inbound_calling
     *
     * @return bool
     */
    public function getSupportsInboundCalling()
    {
        return $this->container['supports_inbound_calling'];
    }

    /**
     * Sets supports_inbound_calling
     *
     * @param bool $supports_inbound_calling When true, this indicates that your calling app supports inbound calling within HubSpot.
     *
     * @return self
     */
    public function setSupportsInboundCalling($supports_inbound_calling)
    {
        if (is_null($supports_inbound_calling)) {
            throw new \InvalidArgumentException('non-nullable supports_inbound_calling cannot be null');
        }
        $this->container['supports_inbound_calling'] = $supports_inbound_calling;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url The URL to your phone/calling UI, built with the [Calling SDK](#).
     *
     * @return self
     */
    public function setUrl($url)
    {
        if (is_null($url)) {
            throw new \InvalidArgumentException('non-nullable url cannot be null');
        }
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param int $height The target height of the iframe that will contain your phone/calling UI.
     *
     * @return self
     */
    public function setHeight($height)
    {
        if (is_null($height)) {
            throw new \InvalidArgumentException('non-nullable height cannot be null');
        }
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at The last time the settings for this calling extension were modified.
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
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
    #[\ReturnTypeWillChange]
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
    public function offsetSet($offset, $value): void
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
    public function offsetUnset($offset): void
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
    #[\ReturnTypeWillChange]
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


