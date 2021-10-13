<?php
/**
 * Ptsv2paymentsTravelInformationAutoRentalReturnAddress
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
 * Ptsv2paymentsTravelInformationAutoRentalReturnAddress Class Doc Comment
 *
 * @category    Class
 * @package     CyberSource
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Ptsv2paymentsTravelInformationAutoRentalReturnAddress implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsv2payments_travelInformation_autoRental_returnAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'locationId' => 'string',
        'location' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'city' => null,
        'state' => null,
        'country' => null,
        'locationId' => null,
        'location' => null
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
        'city' => 'city',
        'state' => 'state',
        'country' => 'country',
        'locationId' => 'locationId',
        'location' => 'location'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'city' => 'setCity',
        'state' => 'setState',
        'country' => 'setCountry',
        'locationId' => 'setLocationId',
        'location' => 'setLocation'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'city' => 'getCity',
        'state' => 'getState',
        'country' => 'getCountry',
        'locationId' => 'getLocationId',
        'location' => 'getLocation'
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
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['locationId'] = isset($data['locationId']) ? $data['locationId'] : null;
        $this->container['location'] = isset($data['location']) ? $data['location'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['city']) && (strlen($this->container['city']) > 25)) {
            $invalid_properties[] = "invalid value for 'city', the character length must be smaller than or equal to 25.";
        }

        if (!is_null($this->container['state']) && (strlen($this->container['state']) > 3)) {
            $invalid_properties[] = "invalid value for 'state', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['country']) && (strlen($this->container['country']) > 3)) {
            $invalid_properties[] = "invalid value for 'country', the character length must be smaller than or equal to 3.";
        }

        if (!is_null($this->container['locationId']) && (strlen($this->container['locationId']) > 10)) {
            $invalid_properties[] = "invalid value for 'locationId', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['location']) && (strlen($this->container['location']) > 38)) {
            $invalid_properties[] = "invalid value for 'location', the character length must be smaller than or equal to 38.";
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

        if (strlen($this->container['city']) > 25) {
            return false;
        }
        if (strlen($this->container['state']) > 3) {
            return false;
        }
        if (strlen($this->container['country']) > 3) {
            return false;
        }
        if (strlen($this->container['locationId']) > 10) {
            return false;
        }
        if (strlen($this->container['location']) > 38) {
            return false;
        }
        return true;
    }


    /**
     * Gets city
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     * @param string $city City where the auto was returned to the rental agency.
     * @return $this
     */
    public function setCity($city)
    {
        if (!is_null($city) && (strlen($city) > 25)) {
            throw new \InvalidArgumentException('invalid length for $city when calling Ptsv2paymentsTravelInformationAutoRentalReturnAddress., must be smaller than or equal to 25.');
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets state
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param string $state State in which the auto was returned to the rental agency. Use the [State, Province, and Territory Codes for the United States and Canada](https://developer.cybersource.com/library/documentation/sbc/quickref/states_and_provinces.pdf).  For authorizations, this field is supported for Visa, MasterCard, and American Express.  For captures, this field is supported only for MasterCard and American Express.
     * @return $this
     */
    public function setState($state)
    {
        if (!is_null($state) && (strlen($state) > 3)) {
            throw new \InvalidArgumentException('invalid length for $state when calling Ptsv2paymentsTravelInformationAutoRentalReturnAddress., must be smaller than or equal to 3.');
        }

        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets country
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     * @param string $country Country where the auto was returned to the rental agency. Use the [ISO Standard Country Codes](https://developer.cybersource.com/library/documentation/sbc/quickref/countries_alpha_list.pdf).
     * @return $this
     */
    public function setCountry($country)
    {
        if (!is_null($country) && (strlen($country) > 3)) {
            throw new \InvalidArgumentException('invalid length for $country when calling Ptsv2paymentsTravelInformationAutoRentalReturnAddress., must be smaller than or equal to 3.');
        }

        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets locationId
     * @return string
     */
    public function getLocationId()
    {
        return $this->container['locationId'];
    }

    /**
     * Sets locationId
     * @param string $locationId Code, address, phone number, etc. used to identify the location of the auto rental return. This field is supported only for MasterCard and American Express.
     * @return $this
     */
    public function setLocationId($locationId)
    {
        if (!is_null($locationId) && (strlen($locationId) > 10)) {
            throw new \InvalidArgumentException('invalid length for $locationId when calling Ptsv2paymentsTravelInformationAutoRentalReturnAddress., must be smaller than or equal to 10.');
        }

        $this->container['locationId'] = $locationId;

        return $this;
    }

    /**
     * Gets location
     * @return string
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     * @param string $location This field contains the location where the taxi passenger was dropped off or where the auto rental vehicle was returned.
     * @return $this
     */
    public function setLocation($location)
    {
        if (!is_null($location) && (strlen($location) > 38)) {
            throw new \InvalidArgumentException('invalid length for $location when calling Ptsv2paymentsTravelInformationAutoRentalReturnAddress., must be smaller than or equal to 38.');
        }

        $this->container['location'] = $location;

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


