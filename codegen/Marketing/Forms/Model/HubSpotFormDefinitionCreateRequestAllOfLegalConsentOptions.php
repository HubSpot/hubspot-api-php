<?php
/**
 * HubSpotFormDefinitionCreateRequestAllOfLegalConsentOptions
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Marketing\Forms
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Forms
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

namespace HubSpot\Client\Marketing\Forms\Model;

use \ArrayAccess;
use \HubSpot\Client\Marketing\Forms\ObjectSerializer;

/**
 * HubSpotFormDefinitionCreateRequestAllOfLegalConsentOptions Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Marketing\Forms
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class HubSpotFormDefinitionCreateRequestAllOfLegalConsentOptions implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'HubSpotFormDefinitionCreateRequest_allOf_legalConsentOptions';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => 'string',
        'subscription_type_ids' => 'int[]',
        'lawful_basis' => 'string',
        'privacy_text' => 'string',
        'communications_checkboxes' => '\HubSpot\Client\Marketing\Forms\Model\LegalConsentCheckbox[]',
        'communication_consent_text' => 'string',
        'consent_to_process_checkbox_label' => 'string',
        'consent_to_process_footer_text' => 'string',
        'consent_to_process_text' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'subscription_type_ids' => 'int64',
        'lawful_basis' => null,
        'privacy_text' => null,
        'communications_checkboxes' => null,
        'communication_consent_text' => null,
        'consent_to_process_checkbox_label' => null,
        'consent_to_process_footer_text' => null,
        'consent_to_process_text' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'subscription_type_ids' => false,
        'lawful_basis' => false,
        'privacy_text' => false,
        'communications_checkboxes' => false,
        'communication_consent_text' => false,
        'consent_to_process_checkbox_label' => false,
        'consent_to_process_footer_text' => false,
        'consent_to_process_text' => false
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
        'type' => 'type',
        'subscription_type_ids' => 'subscriptionTypeIds',
        'lawful_basis' => 'lawfulBasis',
        'privacy_text' => 'privacyText',
        'communications_checkboxes' => 'communicationsCheckboxes',
        'communication_consent_text' => 'communicationConsentText',
        'consent_to_process_checkbox_label' => 'consentToProcessCheckboxLabel',
        'consent_to_process_footer_text' => 'consentToProcessFooterText',
        'consent_to_process_text' => 'consentToProcessText'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'subscription_type_ids' => 'setSubscriptionTypeIds',
        'lawful_basis' => 'setLawfulBasis',
        'privacy_text' => 'setPrivacyText',
        'communications_checkboxes' => 'setCommunicationsCheckboxes',
        'communication_consent_text' => 'setCommunicationConsentText',
        'consent_to_process_checkbox_label' => 'setConsentToProcessCheckboxLabel',
        'consent_to_process_footer_text' => 'setConsentToProcessFooterText',
        'consent_to_process_text' => 'setConsentToProcessText'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'subscription_type_ids' => 'getSubscriptionTypeIds',
        'lawful_basis' => 'getLawfulBasis',
        'privacy_text' => 'getPrivacyText',
        'communications_checkboxes' => 'getCommunicationsCheckboxes',
        'communication_consent_text' => 'getCommunicationConsentText',
        'consent_to_process_checkbox_label' => 'getConsentToProcessCheckboxLabel',
        'consent_to_process_footer_text' => 'getConsentToProcessFooterText',
        'consent_to_process_text' => 'getConsentToProcessText'
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

    public const TYPE_NONE = 'none';
    public const TYPE_LEGITIMATE_INTEREST = 'legitimate_interest';
    public const TYPE_EXPLICIT_CONSENT_TO_PROCESS = 'explicit_consent_to_process';
    public const TYPE_IMPLICIT_CONSENT_TO_PROCESS = 'implicit_consent_to_process';
    public const LAWFUL_BASIS_LEAD = 'lead';
    public const LAWFUL_BASIS_CLIENT = 'client';
    public const LAWFUL_BASIS_OTHER = 'other';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_NONE,
            self::TYPE_LEGITIMATE_INTEREST,
            self::TYPE_EXPLICIT_CONSENT_TO_PROCESS,
            self::TYPE_IMPLICIT_CONSENT_TO_PROCESS,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLawfulBasisAllowableValues()
    {
        return [
            self::LAWFUL_BASIS_LEAD,
            self::LAWFUL_BASIS_CLIENT,
            self::LAWFUL_BASIS_OTHER,
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
        $this->setIfExists('type', $data ?? [], 'none');
        $this->setIfExists('subscription_type_ids', $data ?? [], null);
        $this->setIfExists('lawful_basis', $data ?? [], null);
        $this->setIfExists('privacy_text', $data ?? [], null);
        $this->setIfExists('communications_checkboxes', $data ?? [], null);
        $this->setIfExists('communication_consent_text', $data ?? [], null);
        $this->setIfExists('consent_to_process_checkbox_label', $data ?? [], null);
        $this->setIfExists('consent_to_process_footer_text', $data ?? [], null);
        $this->setIfExists('consent_to_process_text', $data ?? [], null);
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

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['subscription_type_ids'] === null) {
            $invalidProperties[] = "'subscription_type_ids' can't be null";
        }
        if ($this->container['lawful_basis'] === null) {
            $invalidProperties[] = "'lawful_basis' can't be null";
        }
        $allowedValues = $this->getLawfulBasisAllowableValues();
        if (!is_null($this->container['lawful_basis']) && !in_array($this->container['lawful_basis'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'lawful_basis', must be one of '%s'",
                $this->container['lawful_basis'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['privacy_text'] === null) {
            $invalidProperties[] = "'privacy_text' can't be null";
        }
        if ($this->container['communications_checkboxes'] === null) {
            $invalidProperties[] = "'communications_checkboxes' can't be null";
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
     * @param string $type 
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets subscription_type_ids
     *
     * @return int[]
     */
    public function getSubscriptionTypeIds()
    {
        return $this->container['subscription_type_ids'];
    }

    /**
     * Sets subscription_type_ids
     *
     * @param int[] $subscription_type_ids 
     *
     * @return self
     */
    public function setSubscriptionTypeIds($subscription_type_ids)
    {
        if (is_null($subscription_type_ids)) {
            throw new \InvalidArgumentException('non-nullable subscription_type_ids cannot be null');
        }
        $this->container['subscription_type_ids'] = $subscription_type_ids;

        return $this;
    }

    /**
     * Gets lawful_basis
     *
     * @return string
     */
    public function getLawfulBasis()
    {
        return $this->container['lawful_basis'];
    }

    /**
     * Sets lawful_basis
     *
     * @param string $lawful_basis 
     *
     * @return self
     */
    public function setLawfulBasis($lawful_basis)
    {
        if (is_null($lawful_basis)) {
            throw new \InvalidArgumentException('non-nullable lawful_basis cannot be null');
        }
        $allowedValues = $this->getLawfulBasisAllowableValues();
        if (!in_array($lawful_basis, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'lawful_basis', must be one of '%s'",
                    $lawful_basis,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['lawful_basis'] = $lawful_basis;

        return $this;
    }

    /**
     * Gets privacy_text
     *
     * @return string
     */
    public function getPrivacyText()
    {
        return $this->container['privacy_text'];
    }

    /**
     * Sets privacy_text
     *
     * @param string $privacy_text 
     *
     * @return self
     */
    public function setPrivacyText($privacy_text)
    {
        if (is_null($privacy_text)) {
            throw new \InvalidArgumentException('non-nullable privacy_text cannot be null');
        }
        $this->container['privacy_text'] = $privacy_text;

        return $this;
    }

    /**
     * Gets communications_checkboxes
     *
     * @return \HubSpot\Client\Marketing\Forms\Model\LegalConsentCheckbox[]
     */
    public function getCommunicationsCheckboxes()
    {
        return $this->container['communications_checkboxes'];
    }

    /**
     * Sets communications_checkboxes
     *
     * @param \HubSpot\Client\Marketing\Forms\Model\LegalConsentCheckbox[] $communications_checkboxes 
     *
     * @return self
     */
    public function setCommunicationsCheckboxes($communications_checkboxes)
    {
        if (is_null($communications_checkboxes)) {
            throw new \InvalidArgumentException('non-nullable communications_checkboxes cannot be null');
        }
        $this->container['communications_checkboxes'] = $communications_checkboxes;

        return $this;
    }

    /**
     * Gets communication_consent_text
     *
     * @return string|null
     */
    public function getCommunicationConsentText()
    {
        return $this->container['communication_consent_text'];
    }

    /**
     * Sets communication_consent_text
     *
     * @param string|null $communication_consent_text 
     *
     * @return self
     */
    public function setCommunicationConsentText($communication_consent_text)
    {
        if (is_null($communication_consent_text)) {
            throw new \InvalidArgumentException('non-nullable communication_consent_text cannot be null');
        }
        $this->container['communication_consent_text'] = $communication_consent_text;

        return $this;
    }

    /**
     * Gets consent_to_process_checkbox_label
     *
     * @return string|null
     */
    public function getConsentToProcessCheckboxLabel()
    {
        return $this->container['consent_to_process_checkbox_label'];
    }

    /**
     * Sets consent_to_process_checkbox_label
     *
     * @param string|null $consent_to_process_checkbox_label 
     *
     * @return self
     */
    public function setConsentToProcessCheckboxLabel($consent_to_process_checkbox_label)
    {
        if (is_null($consent_to_process_checkbox_label)) {
            throw new \InvalidArgumentException('non-nullable consent_to_process_checkbox_label cannot be null');
        }
        $this->container['consent_to_process_checkbox_label'] = $consent_to_process_checkbox_label;

        return $this;
    }

    /**
     * Gets consent_to_process_footer_text
     *
     * @return string|null
     */
    public function getConsentToProcessFooterText()
    {
        return $this->container['consent_to_process_footer_text'];
    }

    /**
     * Sets consent_to_process_footer_text
     *
     * @param string|null $consent_to_process_footer_text 
     *
     * @return self
     */
    public function setConsentToProcessFooterText($consent_to_process_footer_text)
    {
        if (is_null($consent_to_process_footer_text)) {
            throw new \InvalidArgumentException('non-nullable consent_to_process_footer_text cannot be null');
        }
        $this->container['consent_to_process_footer_text'] = $consent_to_process_footer_text;

        return $this;
    }

    /**
     * Gets consent_to_process_text
     *
     * @return string|null
     */
    public function getConsentToProcessText()
    {
        return $this->container['consent_to_process_text'];
    }

    /**
     * Sets consent_to_process_text
     *
     * @param string|null $consent_to_process_text 
     *
     * @return self
     */
    public function setConsentToProcessText($consent_to_process_text)
    {
        if (is_null($consent_to_process_text)) {
            throw new \InvalidArgumentException('non-nullable consent_to_process_text cannot be null');
        }
        $this->container['consent_to_process_text'] = $consent_to_process_text;

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


