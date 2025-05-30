<?php
/**
 * FormDisplayOptions
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
 * FormDisplayOptions Class Doc Comment
 *
 * @category Class
 * @description Options for styling the form.
 * @package  HubSpot\Client\Marketing\Forms
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FormDisplayOptions implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FormDisplayOptions';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'render_raw_html' => 'bool',
        'css_class' => 'string',
        'theme' => 'string',
        'submit_button_text' => 'string',
        'style' => '\HubSpot\Client\Marketing\Forms\Model\FormStyle'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'render_raw_html' => null,
        'css_class' => null,
        'theme' => null,
        'submit_button_text' => null,
        'style' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'render_raw_html' => false,
        'css_class' => false,
        'theme' => false,
        'submit_button_text' => false,
        'style' => false
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
        'render_raw_html' => 'renderRawHtml',
        'css_class' => 'cssClass',
        'theme' => 'theme',
        'submit_button_text' => 'submitButtonText',
        'style' => 'style'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'render_raw_html' => 'setRenderRawHtml',
        'css_class' => 'setCssClass',
        'theme' => 'setTheme',
        'submit_button_text' => 'setSubmitButtonText',
        'style' => 'setStyle'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'render_raw_html' => 'getRenderRawHtml',
        'css_class' => 'getCssClass',
        'theme' => 'getTheme',
        'submit_button_text' => 'getSubmitButtonText',
        'style' => 'getStyle'
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

    public const THEME_DEFAULT_STYLE = 'default_style';
    public const THEME_CANVAS = 'canvas';
    public const THEME_LINEAR = 'linear';
    public const THEME_ROUND = 'round';
    public const THEME_SHARP = 'sharp';
    public const THEME_LEGACY = 'legacy';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getThemeAllowableValues()
    {
        return [
            self::THEME_DEFAULT_STYLE,
            self::THEME_CANVAS,
            self::THEME_LINEAR,
            self::THEME_ROUND,
            self::THEME_SHARP,
            self::THEME_LEGACY,
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
        $this->setIfExists('render_raw_html', $data ?? [], null);
        $this->setIfExists('css_class', $data ?? [], null);
        $this->setIfExists('theme', $data ?? [], null);
        $this->setIfExists('submit_button_text', $data ?? [], null);
        $this->setIfExists('style', $data ?? [], null);
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

        if ($this->container['render_raw_html'] === null) {
            $invalidProperties[] = "'render_raw_html' can't be null";
        }
        if ($this->container['theme'] === null) {
            $invalidProperties[] = "'theme' can't be null";
        }
        $allowedValues = $this->getThemeAllowableValues();
        if (!is_null($this->container['theme']) && !in_array($this->container['theme'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'theme', must be one of '%s'",
                $this->container['theme'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['submit_button_text'] === null) {
            $invalidProperties[] = "'submit_button_text' can't be null";
        }
        if ($this->container['style'] === null) {
            $invalidProperties[] = "'style' can't be null";
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
     * Gets render_raw_html
     *
     * @return bool
     */
    public function getRenderRawHtml()
    {
        return $this->container['render_raw_html'];
    }

    /**
     * Sets render_raw_html
     *
     * @param bool $render_raw_html Whether the form will render as raw HTML as opposed to inside an iFrame.
     *
     * @return self
     */
    public function setRenderRawHtml($render_raw_html)
    {
        if (is_null($render_raw_html)) {
            throw new \InvalidArgumentException('non-nullable render_raw_html cannot be null');
        }
        $this->container['render_raw_html'] = $render_raw_html;

        return $this;
    }

    /**
     * Gets css_class
     *
     * @return string|null
     */
    public function getCssClass()
    {
        return $this->container['css_class'];
    }

    /**
     * Sets css_class
     *
     * @param string|null $css_class 
     *
     * @return self
     */
    public function setCssClass($css_class)
    {
        if (is_null($css_class)) {
            throw new \InvalidArgumentException('non-nullable css_class cannot be null');
        }
        $this->container['css_class'] = $css_class;

        return $this;
    }

    /**
     * Gets theme
     *
     * @return string
     */
    public function getTheme()
    {
        return $this->container['theme'];
    }

    /**
     * Sets theme
     *
     * @param string $theme The theme used for styling the input fields. This will not apply if the form is added to a HubSpot CMS page.
     *
     * @return self
     */
    public function setTheme($theme)
    {
        if (is_null($theme)) {
            throw new \InvalidArgumentException('non-nullable theme cannot be null');
        }
        $allowedValues = $this->getThemeAllowableValues();
        if (!in_array($theme, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'theme', must be one of '%s'",
                    $theme,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['theme'] = $theme;

        return $this;
    }

    /**
     * Gets submit_button_text
     *
     * @return string
     */
    public function getSubmitButtonText()
    {
        return $this->container['submit_button_text'];
    }

    /**
     * Sets submit_button_text
     *
     * @param string $submit_button_text The text displayed on the form submit button.
     *
     * @return self
     */
    public function setSubmitButtonText($submit_button_text)
    {
        if (is_null($submit_button_text)) {
            throw new \InvalidArgumentException('non-nullable submit_button_text cannot be null');
        }
        $this->container['submit_button_text'] = $submit_button_text;

        return $this;
    }

    /**
     * Gets style
     *
     * @return \HubSpot\Client\Marketing\Forms\Model\FormStyle
     */
    public function getStyle()
    {
        return $this->container['style'];
    }

    /**
     * Sets style
     *
     * @param \HubSpot\Client\Marketing\Forms\Model\FormStyle $style style
     *
     * @return self
     */
    public function setStyle($style)
    {
        if (is_null($style)) {
            throw new \InvalidArgumentException('non-nullable style cannot be null');
        }
        $this->container['style'] = $style;

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


