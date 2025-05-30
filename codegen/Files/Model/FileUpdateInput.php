<?php
/**
 * FileUpdateInput
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Files
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Files
 *
 * Upload and manage files.
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

namespace HubSpot\Client\Files\Model;

use \ArrayAccess;
use \HubSpot\Client\Files\ObjectSerializer;

/**
 * FileUpdateInput Class Doc Comment
 *
 * @category Class
 * @description Object for updating files.
 * @package  HubSpot\Client\Files
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FileUpdateInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FileUpdateInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'access' => 'string',
        'parent_folder_id' => 'string',
        'name' => 'string',
        'parent_folder_path' => 'string',
        'clear_expires' => 'bool',
        'is_usable_in_content' => 'bool',
        'expires_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'access' => null,
        'parent_folder_id' => null,
        'name' => null,
        'parent_folder_path' => null,
        'clear_expires' => null,
        'is_usable_in_content' => null,
        'expires_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'access' => false,
        'parent_folder_id' => false,
        'name' => false,
        'parent_folder_path' => false,
        'clear_expires' => false,
        'is_usable_in_content' => false,
        'expires_at' => false
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
        'access' => 'access',
        'parent_folder_id' => 'parentFolderId',
        'name' => 'name',
        'parent_folder_path' => 'parentFolderPath',
        'clear_expires' => 'clearExpires',
        'is_usable_in_content' => 'isUsableInContent',
        'expires_at' => 'expiresAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'access' => 'setAccess',
        'parent_folder_id' => 'setParentFolderId',
        'name' => 'setName',
        'parent_folder_path' => 'setParentFolderPath',
        'clear_expires' => 'setClearExpires',
        'is_usable_in_content' => 'setIsUsableInContent',
        'expires_at' => 'setExpiresAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'access' => 'getAccess',
        'parent_folder_id' => 'getParentFolderId',
        'name' => 'getName',
        'parent_folder_path' => 'getParentFolderPath',
        'clear_expires' => 'getClearExpires',
        'is_usable_in_content' => 'getIsUsableInContent',
        'expires_at' => 'getExpiresAt'
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

    public const ACCESS_PUBLIC_INDEXABLE = 'PUBLIC_INDEXABLE';
    public const ACCESS_PUBLIC_NOT_INDEXABLE = 'PUBLIC_NOT_INDEXABLE';
    public const ACCESS_HIDDEN_INDEXABLE = 'HIDDEN_INDEXABLE';
    public const ACCESS_HIDDEN_NOT_INDEXABLE = 'HIDDEN_NOT_INDEXABLE';
    public const ACCESS_HIDDEN_PRIVATE = 'HIDDEN_PRIVATE';
    public const ACCESS__PRIVATE = 'PRIVATE';
    public const ACCESS_HIDDEN_SENSITIVE = 'HIDDEN_SENSITIVE';
    public const ACCESS_SENSITIVE = 'SENSITIVE';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAccessAllowableValues()
    {
        return [
            self::ACCESS_PUBLIC_INDEXABLE,
            self::ACCESS_PUBLIC_NOT_INDEXABLE,
            self::ACCESS_HIDDEN_INDEXABLE,
            self::ACCESS_HIDDEN_NOT_INDEXABLE,
            self::ACCESS_HIDDEN_PRIVATE,
            self::ACCESS__PRIVATE,
            self::ACCESS_HIDDEN_SENSITIVE,
            self::ACCESS_SENSITIVE,
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
        $this->setIfExists('access', $data ?? [], null);
        $this->setIfExists('parent_folder_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('parent_folder_path', $data ?? [], null);
        $this->setIfExists('clear_expires', $data ?? [], null);
        $this->setIfExists('is_usable_in_content', $data ?? [], null);
        $this->setIfExists('expires_at', $data ?? [], null);
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

        $allowedValues = $this->getAccessAllowableValues();
        if (!is_null($this->container['access']) && !in_array($this->container['access'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'access', must be one of '%s'",
                $this->container['access'],
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
     * Gets access
     *
     * @return string|null
     */
    public function getAccess()
    {
        return $this->container['access'];
    }

    /**
     * Sets access
     *
     * @param string|null $access NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @return self
     */
    public function setAccess($access)
    {
        if (is_null($access)) {
            throw new \InvalidArgumentException('non-nullable access cannot be null');
        }
        $allowedValues = $this->getAccessAllowableValues();
        if (!in_array($access, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'access', must be one of '%s'",
                    $access,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['access'] = $access;

        return $this;
    }

    /**
     * Gets parent_folder_id
     *
     * @return string|null
     */
    public function getParentFolderId()
    {
        return $this->container['parent_folder_id'];
    }

    /**
     * Sets parent_folder_id
     *
     * @param string|null $parent_folder_id FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     *
     * @return self
     */
    public function setParentFolderId($parent_folder_id)
    {
        if (is_null($parent_folder_id)) {
            throw new \InvalidArgumentException('non-nullable parent_folder_id cannot be null');
        }
        $this->container['parent_folder_id'] = $parent_folder_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name New name for the file.
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
     * Gets parent_folder_path
     *
     * @return string|null
     */
    public function getParentFolderPath()
    {
        return $this->container['parent_folder_path'];
    }

    /**
     * Sets parent_folder_path
     *
     * @param string|null $parent_folder_path Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     *
     * @return self
     */
    public function setParentFolderPath($parent_folder_path)
    {
        if (is_null($parent_folder_path)) {
            throw new \InvalidArgumentException('non-nullable parent_folder_path cannot be null');
        }
        $this->container['parent_folder_path'] = $parent_folder_path;

        return $this;
    }

    /**
     * Gets clear_expires
     *
     * @return bool|null
     */
    public function getClearExpires()
    {
        return $this->container['clear_expires'];
    }

    /**
     * Sets clear_expires
     *
     * @param bool|null $clear_expires clear_expires
     *
     * @return self
     */
    public function setClearExpires($clear_expires)
    {
        if (is_null($clear_expires)) {
            throw new \InvalidArgumentException('non-nullable clear_expires cannot be null');
        }
        $this->container['clear_expires'] = $clear_expires;

        return $this;
    }

    /**
     * Gets is_usable_in_content
     *
     * @return bool|null
     */
    public function getIsUsableInContent()
    {
        return $this->container['is_usable_in_content'];
    }

    /**
     * Sets is_usable_in_content
     *
     * @param bool|null $is_usable_in_content Mark whether the file should be used in new content or not.
     *
     * @return self
     */
    public function setIsUsableInContent($is_usable_in_content)
    {
        if (is_null($is_usable_in_content)) {
            throw new \InvalidArgumentException('non-nullable is_usable_in_content cannot be null');
        }
        $this->container['is_usable_in_content'] = $is_usable_in_content;

        return $this;
    }

    /**
     * Gets expires_at
     *
     * @return \DateTime|null
     */
    public function getExpiresAt()
    {
        return $this->container['expires_at'];
    }

    /**
     * Sets expires_at
     *
     * @param \DateTime|null $expires_at expires_at
     *
     * @return self
     */
    public function setExpiresAt($expires_at)
    {
        if (is_null($expires_at)) {
            throw new \InvalidArgumentException('non-nullable expires_at cannot be null');
        }
        $this->container['expires_at'] = $expires_at;

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


