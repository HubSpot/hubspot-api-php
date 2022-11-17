<?php
/**
 * Property
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Properties
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Properties
 *
 * All HubSpot objects store data in default and custom properties. These endpoints provide access to read and modify object properties in HubSpot.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Properties\Model;

use \ArrayAccess;
use \HubSpot\Client\Crm\Properties\ObjectSerializer;

/**
 * Property Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Properties
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Property implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Property';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'updated_at' => '\DateTime',
        'created_at' => '\DateTime',
        'archived_at' => '\DateTime',
        'name' => 'string',
        'label' => 'string',
        'type' => 'string',
        'field_type' => 'string',
        'description' => 'string',
        'group_name' => 'string',
        'options' => '\HubSpot\Client\Crm\Properties\Model\Option[]',
        'created_user_id' => 'string',
        'updated_user_id' => 'string',
        'referenced_object_type' => 'string',
        'display_order' => 'int',
        'calculated' => 'bool',
        'external_options' => 'bool',
        'archived' => 'bool',
        'has_unique_value' => 'bool',
        'hidden' => 'bool',
        'hubspot_defined' => 'bool',
        'show_currency_symbol' => 'bool',
        'modification_metadata' => '\HubSpot\Client\Crm\Properties\Model\PropertyModificationMetadata',
        'form_field' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'updated_at' => 'date-time',
        'created_at' => 'date-time',
        'archived_at' => 'date-time',
        'name' => null,
        'label' => null,
        'type' => null,
        'field_type' => null,
        'description' => null,
        'group_name' => null,
        'options' => null,
        'created_user_id' => null,
        'updated_user_id' => null,
        'referenced_object_type' => null,
        'display_order' => 'int32',
        'calculated' => null,
        'external_options' => null,
        'archived' => null,
        'has_unique_value' => null,
        'hidden' => null,
        'hubspot_defined' => null,
        'show_currency_symbol' => null,
        'modification_metadata' => null,
        'form_field' => null
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
        'updated_at' => 'updatedAt',
        'created_at' => 'createdAt',
        'archived_at' => 'archivedAt',
        'name' => 'name',
        'label' => 'label',
        'type' => 'type',
        'field_type' => 'fieldType',
        'description' => 'description',
        'group_name' => 'groupName',
        'options' => 'options',
        'created_user_id' => 'createdUserId',
        'updated_user_id' => 'updatedUserId',
        'referenced_object_type' => 'referencedObjectType',
        'display_order' => 'displayOrder',
        'calculated' => 'calculated',
        'external_options' => 'externalOptions',
        'archived' => 'archived',
        'has_unique_value' => 'hasUniqueValue',
        'hidden' => 'hidden',
        'hubspot_defined' => 'hubspotDefined',
        'show_currency_symbol' => 'showCurrencySymbol',
        'modification_metadata' => 'modificationMetadata',
        'form_field' => 'formField'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'updated_at' => 'setUpdatedAt',
        'created_at' => 'setCreatedAt',
        'archived_at' => 'setArchivedAt',
        'name' => 'setName',
        'label' => 'setLabel',
        'type' => 'setType',
        'field_type' => 'setFieldType',
        'description' => 'setDescription',
        'group_name' => 'setGroupName',
        'options' => 'setOptions',
        'created_user_id' => 'setCreatedUserId',
        'updated_user_id' => 'setUpdatedUserId',
        'referenced_object_type' => 'setReferencedObjectType',
        'display_order' => 'setDisplayOrder',
        'calculated' => 'setCalculated',
        'external_options' => 'setExternalOptions',
        'archived' => 'setArchived',
        'has_unique_value' => 'setHasUniqueValue',
        'hidden' => 'setHidden',
        'hubspot_defined' => 'setHubspotDefined',
        'show_currency_symbol' => 'setShowCurrencySymbol',
        'modification_metadata' => 'setModificationMetadata',
        'form_field' => 'setFormField'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'updated_at' => 'getUpdatedAt',
        'created_at' => 'getCreatedAt',
        'archived_at' => 'getArchivedAt',
        'name' => 'getName',
        'label' => 'getLabel',
        'type' => 'getType',
        'field_type' => 'getFieldType',
        'description' => 'getDescription',
        'group_name' => 'getGroupName',
        'options' => 'getOptions',
        'created_user_id' => 'getCreatedUserId',
        'updated_user_id' => 'getUpdatedUserId',
        'referenced_object_type' => 'getReferencedObjectType',
        'display_order' => 'getDisplayOrder',
        'calculated' => 'getCalculated',
        'external_options' => 'getExternalOptions',
        'archived' => 'getArchived',
        'has_unique_value' => 'getHasUniqueValue',
        'hidden' => 'getHidden',
        'hubspot_defined' => 'getHubspotDefined',
        'show_currency_symbol' => 'getShowCurrencySymbol',
        'modification_metadata' => 'getModificationMetadata',
        'form_field' => 'getFormField'
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
        $this->container['updated_at'] = $data['updated_at'] ?? null;
        $this->container['created_at'] = $data['created_at'] ?? null;
        $this->container['archived_at'] = $data['archived_at'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['label'] = $data['label'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['field_type'] = $data['field_type'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['group_name'] = $data['group_name'] ?? null;
        $this->container['options'] = $data['options'] ?? null;
        $this->container['created_user_id'] = $data['created_user_id'] ?? null;
        $this->container['updated_user_id'] = $data['updated_user_id'] ?? null;
        $this->container['referenced_object_type'] = $data['referenced_object_type'] ?? null;
        $this->container['display_order'] = $data['display_order'] ?? null;
        $this->container['calculated'] = $data['calculated'] ?? null;
        $this->container['external_options'] = $data['external_options'] ?? null;
        $this->container['archived'] = $data['archived'] ?? null;
        $this->container['has_unique_value'] = $data['has_unique_value'] ?? null;
        $this->container['hidden'] = $data['hidden'] ?? null;
        $this->container['hubspot_defined'] = $data['hubspot_defined'] ?? null;
        $this->container['show_currency_symbol'] = $data['show_currency_symbol'] ?? null;
        $this->container['modification_metadata'] = $data['modification_metadata'] ?? null;
        $this->container['form_field'] = $data['form_field'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['label'] === null) {
            $invalidProperties[] = "'label' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['field_type'] === null) {
            $invalidProperties[] = "'field_type' can't be null";
        }
        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ($this->container['group_name'] === null) {
            $invalidProperties[] = "'group_name' can't be null";
        }
        if ($this->container['options'] === null) {
            $invalidProperties[] = "'options' can't be null";
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
     * Gets updated_at
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime|null $updated_at updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime|null $created_at created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets archived_at
     *
     * @return \DateTime|null
     */
    public function getArchivedAt()
    {
        return $this->container['archived_at'];
    }

    /**
     * Sets archived_at
     *
     * @param \DateTime|null $archived_at When the property was archived.
     *
     * @return self
     */
    public function setArchivedAt($archived_at)
    {
        $this->container['archived_at'] = $archived_at;

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
     * @param string $name The internal property name, which must be used when referencing the property via the API.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->container['label'];
    }

    /**
     * Sets label
     *
     * @param string $label A human-readable property label that will be shown in HubSpot.
     *
     * @return self
     */
    public function setLabel($label)
    {
        $this->container['label'] = $label;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type The property data type.
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets field_type
     *
     * @return string
     */
    public function getFieldType()
    {
        return $this->container['field_type'];
    }

    /**
     * Sets field_type
     *
     * @param string $field_type Controls how the property appears in HubSpot.
     *
     * @return self
     */
    public function setFieldType($field_type)
    {
        $this->container['field_type'] = $field_type;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description A description of the property that will be shown as help text in HubSpot.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets group_name
     *
     * @return string
     */
    public function getGroupName()
    {
        return $this->container['group_name'];
    }

    /**
     * Sets group_name
     *
     * @param string $group_name The name of the property group the property belongs to.
     *
     * @return self
     */
    public function setGroupName($group_name)
    {
        $this->container['group_name'] = $group_name;

        return $this;
    }

    /**
     * Gets options
     *
     * @return \HubSpot\Client\Crm\Properties\Model\Option[]
     */
    public function getOptions()
    {
        return $this->container['options'];
    }

    /**
     * Sets options
     *
     * @param \HubSpot\Client\Crm\Properties\Model\Option[] $options A list of valid options for the property. This field is required for enumerated properties, but will be empty for other property types.
     *
     * @return self
     */
    public function setOptions($options)
    {
        $this->container['options'] = $options;

        return $this;
    }

    /**
     * Gets created_user_id
     *
     * @return string|null
     */
    public function getCreatedUserId()
    {
        return $this->container['created_user_id'];
    }

    /**
     * Sets created_user_id
     *
     * @param string|null $created_user_id The internal user ID of the user who created the property in HubSpot. This field may not exist if the property was created outside of HubSpot.
     *
     * @return self
     */
    public function setCreatedUserId($created_user_id)
    {
        $this->container['created_user_id'] = $created_user_id;

        return $this;
    }

    /**
     * Gets updated_user_id
     *
     * @return string|null
     */
    public function getUpdatedUserId()
    {
        return $this->container['updated_user_id'];
    }

    /**
     * Sets updated_user_id
     *
     * @param string|null $updated_user_id The internal user ID of the user who updated the property in HubSpot. This field may not exist if the property was updated outside of HubSpot.
     *
     * @return self
     */
    public function setUpdatedUserId($updated_user_id)
    {
        $this->container['updated_user_id'] = $updated_user_id;

        return $this;
    }

    /**
     * Gets referenced_object_type
     *
     * @return string|null
     */
    public function getReferencedObjectType()
    {
        return $this->container['referenced_object_type'];
    }

    /**
     * Sets referenced_object_type
     *
     * @param string|null $referenced_object_type If this property is related to other object(s), they'll be listed here.
     *
     * @return self
     */
    public function setReferencedObjectType($referenced_object_type)
    {
        $this->container['referenced_object_type'] = $referenced_object_type;

        return $this;
    }

    /**
     * Gets display_order
     *
     * @return int|null
     */
    public function getDisplayOrder()
    {
        return $this->container['display_order'];
    }

    /**
     * Sets display_order
     *
     * @param int|null $display_order Properties are shown in order, starting with the lowest positive integer value.
     *
     * @return self
     */
    public function setDisplayOrder($display_order)
    {
        $this->container['display_order'] = $display_order;

        return $this;
    }

    /**
     * Gets calculated
     *
     * @return bool|null
     */
    public function getCalculated()
    {
        return $this->container['calculated'];
    }

    /**
     * Sets calculated
     *
     * @param bool|null $calculated For default properties, true indicates that the property is calculated by a HubSpot process. It has no effect for custom properties.
     *
     * @return self
     */
    public function setCalculated($calculated)
    {
        $this->container['calculated'] = $calculated;

        return $this;
    }

    /**
     * Gets external_options
     *
     * @return bool|null
     */
    public function getExternalOptions()
    {
        return $this->container['external_options'];
    }

    /**
     * Sets external_options
     *
     * @param bool|null $external_options For default properties, true indicates that the options are stored externally to the property settings.
     *
     * @return self
     */
    public function setExternalOptions($external_options)
    {
        $this->container['external_options'] = $external_options;

        return $this;
    }

    /**
     * Gets archived
     *
     * @return bool|null
     */
    public function getArchived()
    {
        return $this->container['archived'];
    }

    /**
     * Sets archived
     *
     * @param bool|null $archived Whether or not the property is archived.
     *
     * @return self
     */
    public function setArchived($archived)
    {
        $this->container['archived'] = $archived;

        return $this;
    }

    /**
     * Gets has_unique_value
     *
     * @return bool|null
     */
    public function getHasUniqueValue()
    {
        return $this->container['has_unique_value'];
    }

    /**
     * Sets has_unique_value
     *
     * @param bool|null $has_unique_value Whether or not the property's value must be unique. Once set, this can't be changed.
     *
     * @return self
     */
    public function setHasUniqueValue($has_unique_value)
    {
        $this->container['has_unique_value'] = $has_unique_value;

        return $this;
    }

    /**
     * Gets hidden
     *
     * @return bool|null
     */
    public function getHidden()
    {
        return $this->container['hidden'];
    }

    /**
     * Sets hidden
     *
     * @param bool|null $hidden Whether or not the property will be hidden from the HubSpot UI. It's recommended this be set to false for custom properties.
     *
     * @return self
     */
    public function setHidden($hidden)
    {
        $this->container['hidden'] = $hidden;

        return $this;
    }

    /**
     * Gets hubspot_defined
     *
     * @return bool|null
     */
    public function getHubspotDefined()
    {
        return $this->container['hubspot_defined'];
    }

    /**
     * Sets hubspot_defined
     *
     * @param bool|null $hubspot_defined This will be true for default object properties built into HubSpot.
     *
     * @return self
     */
    public function setHubspotDefined($hubspot_defined)
    {
        $this->container['hubspot_defined'] = $hubspot_defined;

        return $this;
    }

    /**
     * Gets show_currency_symbol
     *
     * @return bool|null
     */
    public function getShowCurrencySymbol()
    {
        return $this->container['show_currency_symbol'];
    }

    /**
     * Sets show_currency_symbol
     *
     * @param bool|null $show_currency_symbol Whether or not the property will display the currency symbol set in the account settings.
     *
     * @return self
     */
    public function setShowCurrencySymbol($show_currency_symbol)
    {
        $this->container['show_currency_symbol'] = $show_currency_symbol;

        return $this;
    }

    /**
     * Gets modification_metadata
     *
     * @return \HubSpot\Client\Crm\Properties\Model\PropertyModificationMetadata|null
     */
    public function getModificationMetadata()
    {
        return $this->container['modification_metadata'];
    }

    /**
     * Sets modification_metadata
     *
     * @param \HubSpot\Client\Crm\Properties\Model\PropertyModificationMetadata|null $modification_metadata modification_metadata
     *
     * @return self
     */
    public function setModificationMetadata($modification_metadata)
    {
        $this->container['modification_metadata'] = $modification_metadata;

        return $this;
    }

    /**
     * Gets form_field
     *
     * @return bool|null
     */
    public function getFormField()
    {
        return $this->container['form_field'];
    }

    /**
     * Sets form_field
     *
     * @param bool|null $form_field Whether or not the property can be used in a HubSpot form.
     *
     * @return self
     */
    public function setFormField($form_field)
    {
        $this->container['form_field'] = $form_field;

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


