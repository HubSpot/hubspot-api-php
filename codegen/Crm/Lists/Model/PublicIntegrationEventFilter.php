<?php
/**
 * PublicIntegrationEventFilter
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Lists
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Lists
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

namespace HubSpot\Client\Crm\Lists\Model;

use \ArrayAccess;
use \HubSpot\Client\Crm\Lists\ObjectSerializer;

/**
 * PublicIntegrationEventFilter Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Lists
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PublicIntegrationEventFilter implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PublicIntegrationEventFilter';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'event_type_id' => 'int',
        'filter_lines' => '\HubSpot\Client\Crm\Lists\Model\PublicEventFilterMetadata[]',
        'filter_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'event_type_id' => 'int32',
        'filter_lines' => null,
        'filter_type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'event_type_id' => false,
        'filter_lines' => false,
        'filter_type' => false
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
        'event_type_id' => 'eventTypeId',
        'filter_lines' => 'filterLines',
        'filter_type' => 'filterType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'event_type_id' => 'setEventTypeId',
        'filter_lines' => 'setFilterLines',
        'filter_type' => 'setFilterType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'event_type_id' => 'getEventTypeId',
        'filter_lines' => 'getFilterLines',
        'filter_type' => 'getFilterType'
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

    public const FILTER_TYPE_INTEGRATION_EVENT = 'INTEGRATION_EVENT';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFilterTypeAllowableValues()
    {
        return [
            self::FILTER_TYPE_INTEGRATION_EVENT,
        ];
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
        $this->setIfExists('event_type_id', $data ?? [], null);
        $this->setIfExists('filter_lines', $data ?? [], null);
        $this->setIfExists('filter_type', $data ?? [], 'INTEGRATION_EVENT');
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

        if ($this->container['event_type_id'] === null) {
            $invalidProperties[] = "'event_type_id' can't be null";
        }
        if ($this->container['filter_lines'] === null) {
            $invalidProperties[] = "'filter_lines' can't be null";
        }
        if ($this->container['filter_type'] === null) {
            $invalidProperties[] = "'filter_type' can't be null";
        }
        $allowedValues = $this->getFilterTypeAllowableValues();
        if (!is_null($this->container['filter_type']) && !in_array($this->container['filter_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'filter_type', must be one of '%s'",
                $this->container['filter_type'],
                implode("', '", $allowedValues)
            );
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
     * Gets event_type_id
     *
     * @return int
     */
    public function getEventTypeId()
    {
        return $this->container['event_type_id'];
    }

    /**
     * Sets event_type_id
     *
     * @param int $event_type_id event_type_id
     *
     * @return self
     */
    public function setEventTypeId($event_type_id)
    {
        if (is_null($event_type_id)) {
            throw new \InvalidArgumentException('non-nullable event_type_id cannot be null');
        }
        $this->container['event_type_id'] = $event_type_id;

        return $this;
    }

    /**
     * Gets filter_lines
     *
     * @return \HubSpot\Client\Crm\Lists\Model\PublicEventFilterMetadata[]
     */
    public function getFilterLines()
    {
        return $this->container['filter_lines'];
    }

    /**
     * Sets filter_lines
     *
     * @param \HubSpot\Client\Crm\Lists\Model\PublicEventFilterMetadata[] $filter_lines filter_lines
     *
     * @return self
     */
    public function setFilterLines($filter_lines)
    {
        if (is_null($filter_lines)) {
            throw new \InvalidArgumentException('non-nullable filter_lines cannot be null');
        }
        $this->container['filter_lines'] = $filter_lines;

        return $this;
    }

    /**
     * Gets filter_type
     *
     * @return string
     */
    public function getFilterType()
    {
        return $this->container['filter_type'];
    }

    /**
     * Sets filter_type
     *
     * @param string $filter_type filter_type
     *
     * @return self
     */
    public function setFilterType($filter_type)
    {
        if (is_null($filter_type)) {
            throw new \InvalidArgumentException('non-nullable filter_type cannot be null');
        }
        $allowedValues = $this->getFilterTypeAllowableValues();
        if (!in_array($filter_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'filter_type', must be one of '%s'",
                    $filter_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['filter_type'] = $filter_type;

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


