<?php
/**
 * Ptsv2paymentsRecurringPaymentInformation
 *
 * PHP version 5
 *
 * @category Class
 * @package  CyberSource
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * CyberSource Merged Spec
 *
 * All CyberSource API specs merged together. These are available at https://developer.cybersource.com/api/reference/api-reference.html
 *
 * OpenAPI spec version: 0.0.1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace CyberSource\Model;

use \ArrayAccess;

/**
 * Ptsv2paymentsRecurringPaymentInformation Class Doc Comment
 *
 * @category    Class
 * @description This object contains recurring payment information.
 * @package     CyberSource
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Ptsv2paymentsRecurringPaymentInformation implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsv2payments_recurringPaymentInformation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'endDate' => 'string',
        'frequency' => 'int',
        'originalPurchaseDate' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'endDate' => null,
        'frequency' => null,
        'originalPurchaseDate' => null
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'endDate' => 'endDate',
        'frequency' => 'frequency',
        'originalPurchaseDate' => 'originalPurchaseDate'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'endDate' => 'setEndDate',
        'frequency' => 'setFrequency',
        'originalPurchaseDate' => 'setOriginalPurchaseDate'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'endDate' => 'getEndDate',
        'frequency' => 'getFrequency',
        'originalPurchaseDate' => 'getOriginalPurchaseDate'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['endDate'] = isset($data['endDate']) ? $data['endDate'] : null;
        $this->container['frequency'] = isset($data['frequency']) ? $data['frequency'] : null;
        $this->container['originalPurchaseDate'] = isset($data['originalPurchaseDate']) ? $data['originalPurchaseDate'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['endDate']) && (strlen($this->container['endDate']) > 10)) {
            $invalid_properties[] = "invalid value for 'endDate', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['originalPurchaseDate']) && (strlen($this->container['originalPurchaseDate']) > 17)) {
            $invalid_properties[] = "invalid value for 'originalPurchaseDate', the character length must be smaller than or equal to 17.";
        }

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if (strlen($this->container['endDate']) > 10) {
            return false;
        }
        if (strlen($this->container['originalPurchaseDate']) > 17) {
            return false;
        }
        return true;
    }


    /**
     * Gets endDate
     * @return string
     */
    public function getEndDate()
    {
        return $this->container['endDate'];
    }

    /**
     * Sets endDate
     * @param string $endDate The date after which no further recurring authorizations should be performed. Format: `YYYY-MM-DD` **Note** This field is required for recurring transactions.
     * @return $this
     */
    public function setEndDate($endDate)
    {
        if (!is_null($endDate) && (strlen($endDate) > 10)) {
            throw new \InvalidArgumentException('invalid length for $endDate when calling Ptsv2paymentsRecurringPaymentInformation., must be smaller than or equal to 10.');
        }

        $this->container['endDate'] = $endDate;

        return $this;
    }

    /**
     * Gets frequency
     * @return int
     */
    public function getFrequency()
    {
        return $this->container['frequency'];
    }

    /**
     * Sets frequency
     * @param int $frequency Integer value indicating the minimum number of days between recurring authorizations. A frequency of monthly is indicated by the value 28. Multiple of 28 days will be used to indicate months.  Example: 6 months = 168  Example values accepted (31 days): - 31 - 031 - 0031  **Note** This field is required for recurring transactions.
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->container['frequency'] = $frequency;

        return $this;
    }

    /**
     * Gets originalPurchaseDate
     * @return string
     */
    public function getOriginalPurchaseDate()
    {
        return $this->container['originalPurchaseDate'];
    }

    /**
     * Sets originalPurchaseDate
     * @param string $originalPurchaseDate Date of original purchase. Required for recurring transactions. Format: `YYYY-MM-DDTHH:MM:SSZ` **Note**: If this field is empty, the current date is used.
     * @return $this
     */
    public function setOriginalPurchaseDate($originalPurchaseDate)
    {
        if (!is_null($originalPurchaseDate) && (strlen($originalPurchaseDate) > 17)) {
            throw new \InvalidArgumentException('invalid length for $originalPurchaseDate when calling Ptsv2paymentsRecurringPaymentInformation., must be smaller than or equal to 17.');
        }

        $this->container['originalPurchaseDate'] = $originalPurchaseDate;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
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
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\CyberSource\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\CyberSource\ObjectSerializer::sanitizeForSerialization($this));
    }
}


