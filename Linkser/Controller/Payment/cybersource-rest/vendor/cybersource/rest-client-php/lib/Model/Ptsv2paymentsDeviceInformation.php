<?php
/**
 * Ptsv2paymentsDeviceInformation
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
 * Ptsv2paymentsDeviceInformation Class Doc Comment
 *
 * @category    Class
 * @package     CyberSource
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Ptsv2paymentsDeviceInformation implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ptsv2payments_deviceInformation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'hostName' => 'string',
        'ipAddress' => 'string',
        'userAgent' => 'string',
        'fingerprintSessionId' => 'string',
        'rawData' => '\CyberSource\Model\Ptsv2paymentsDeviceInformationRawData[]',
        'httpAcceptBrowserValue' => 'string',
        'httpAcceptContent' => 'string',
        'httpBrowserEmail' => 'string',
        'httpBrowserLanguage' => 'string',
        'httpBrowserJavaEnabled' => 'bool',
        'httpBrowserJavaScriptEnabled' => 'bool',
        'httpBrowserColorDepth' => 'string',
        'httpBrowserScreenHeight' => 'string',
        'httpBrowserScreenWidth' => 'string',
        'httpBrowserTimeDifference' => 'string',
        'userAgentBrowserValue' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'hostName' => null,
        'ipAddress' => null,
        'userAgent' => null,
        'fingerprintSessionId' => null,
        'rawData' => null,
        'httpAcceptBrowserValue' => null,
        'httpAcceptContent' => null,
        'httpBrowserEmail' => null,
        'httpBrowserLanguage' => null,
        'httpBrowserJavaEnabled' => null,
        'httpBrowserJavaScriptEnabled' => null,
        'httpBrowserColorDepth' => null,
        'httpBrowserScreenHeight' => null,
        'httpBrowserScreenWidth' => null,
        'httpBrowserTimeDifference' => null,
        'userAgentBrowserValue' => null
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
        'hostName' => 'hostName',
        'ipAddress' => 'ipAddress',
        'userAgent' => 'userAgent',
        'fingerprintSessionId' => 'fingerprintSessionId',
        'rawData' => 'rawData',
        'httpAcceptBrowserValue' => 'httpAcceptBrowserValue',
        'httpAcceptContent' => 'httpAcceptContent',
        'httpBrowserEmail' => 'httpBrowserEmail',
        'httpBrowserLanguage' => 'httpBrowserLanguage',
        'httpBrowserJavaEnabled' => 'httpBrowserJavaEnabled',
        'httpBrowserJavaScriptEnabled' => 'httpBrowserJavaScriptEnabled',
        'httpBrowserColorDepth' => 'httpBrowserColorDepth',
        'httpBrowserScreenHeight' => 'httpBrowserScreenHeight',
        'httpBrowserScreenWidth' => 'httpBrowserScreenWidth',
        'httpBrowserTimeDifference' => 'httpBrowserTimeDifference',
        'userAgentBrowserValue' => 'userAgentBrowserValue'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'hostName' => 'setHostName',
        'ipAddress' => 'setIpAddress',
        'userAgent' => 'setUserAgent',
        'fingerprintSessionId' => 'setFingerprintSessionId',
        'rawData' => 'setRawData',
        'httpAcceptBrowserValue' => 'setHttpAcceptBrowserValue',
        'httpAcceptContent' => 'setHttpAcceptContent',
        'httpBrowserEmail' => 'setHttpBrowserEmail',
        'httpBrowserLanguage' => 'setHttpBrowserLanguage',
        'httpBrowserJavaEnabled' => 'setHttpBrowserJavaEnabled',
        'httpBrowserJavaScriptEnabled' => 'setHttpBrowserJavaScriptEnabled',
        'httpBrowserColorDepth' => 'setHttpBrowserColorDepth',
        'httpBrowserScreenHeight' => 'setHttpBrowserScreenHeight',
        'httpBrowserScreenWidth' => 'setHttpBrowserScreenWidth',
        'httpBrowserTimeDifference' => 'setHttpBrowserTimeDifference',
        'userAgentBrowserValue' => 'setUserAgentBrowserValue'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'hostName' => 'getHostName',
        'ipAddress' => 'getIpAddress',
        'userAgent' => 'getUserAgent',
        'fingerprintSessionId' => 'getFingerprintSessionId',
        'rawData' => 'getRawData',
        'httpAcceptBrowserValue' => 'getHttpAcceptBrowserValue',
        'httpAcceptContent' => 'getHttpAcceptContent',
        'httpBrowserEmail' => 'getHttpBrowserEmail',
        'httpBrowserLanguage' => 'getHttpBrowserLanguage',
        'httpBrowserJavaEnabled' => 'getHttpBrowserJavaEnabled',
        'httpBrowserJavaScriptEnabled' => 'getHttpBrowserJavaScriptEnabled',
        'httpBrowserColorDepth' => 'getHttpBrowserColorDepth',
        'httpBrowserScreenHeight' => 'getHttpBrowserScreenHeight',
        'httpBrowserScreenWidth' => 'getHttpBrowserScreenWidth',
        'httpBrowserTimeDifference' => 'getHttpBrowserTimeDifference',
        'userAgentBrowserValue' => 'getUserAgentBrowserValue'
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
        $this->container['hostName'] = isset($data['hostName']) ? $data['hostName'] : null;
        $this->container['ipAddress'] = isset($data['ipAddress']) ? $data['ipAddress'] : null;
        $this->container['userAgent'] = isset($data['userAgent']) ? $data['userAgent'] : null;
        $this->container['fingerprintSessionId'] = isset($data['fingerprintSessionId']) ? $data['fingerprintSessionId'] : null;
        $this->container['rawData'] = isset($data['rawData']) ? $data['rawData'] : null;
        $this->container['httpAcceptBrowserValue'] = isset($data['httpAcceptBrowserValue']) ? $data['httpAcceptBrowserValue'] : null;
        $this->container['httpAcceptContent'] = isset($data['httpAcceptContent']) ? $data['httpAcceptContent'] : null;
        $this->container['httpBrowserEmail'] = isset($data['httpBrowserEmail']) ? $data['httpBrowserEmail'] : null;
        $this->container['httpBrowserLanguage'] = isset($data['httpBrowserLanguage']) ? $data['httpBrowserLanguage'] : null;
        $this->container['httpBrowserJavaEnabled'] = isset($data['httpBrowserJavaEnabled']) ? $data['httpBrowserJavaEnabled'] : null;
        $this->container['httpBrowserJavaScriptEnabled'] = isset($data['httpBrowserJavaScriptEnabled']) ? $data['httpBrowserJavaScriptEnabled'] : null;
        $this->container['httpBrowserColorDepth'] = isset($data['httpBrowserColorDepth']) ? $data['httpBrowserColorDepth'] : null;
        $this->container['httpBrowserScreenHeight'] = isset($data['httpBrowserScreenHeight']) ? $data['httpBrowserScreenHeight'] : null;
        $this->container['httpBrowserScreenWidth'] = isset($data['httpBrowserScreenWidth']) ? $data['httpBrowserScreenWidth'] : null;
        $this->container['httpBrowserTimeDifference'] = isset($data['httpBrowserTimeDifference']) ? $data['httpBrowserTimeDifference'] : null;
        $this->container['userAgentBrowserValue'] = isset($data['userAgentBrowserValue']) ? $data['userAgentBrowserValue'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if (!is_null($this->container['hostName']) && (strlen($this->container['hostName']) > 60)) {
            $invalid_properties[] = "invalid value for 'hostName', the character length must be smaller than or equal to 60.";
        }

        if (!is_null($this->container['ipAddress']) && (strlen($this->container['ipAddress']) > 48)) {
            $invalid_properties[] = "invalid value for 'ipAddress', the character length must be smaller than or equal to 48.";
        }

        if (!is_null($this->container['userAgent']) && (strlen($this->container['userAgent']) > 40)) {
            $invalid_properties[] = "invalid value for 'userAgent', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['httpAcceptBrowserValue']) && (strlen($this->container['httpAcceptBrowserValue']) > 255)) {
            $invalid_properties[] = "invalid value for 'httpAcceptBrowserValue', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['httpAcceptContent']) && (strlen($this->container['httpAcceptContent']) > 256)) {
            $invalid_properties[] = "invalid value for 'httpAcceptContent', the character length must be smaller than or equal to 256.";
        }

        if (!is_null($this->container['httpBrowserLanguage']) && (strlen($this->container['httpBrowserLanguage']) > 8)) {
            $invalid_properties[] = "invalid value for 'httpBrowserLanguage', the character length must be smaller than or equal to 8.";
        }

        if (!is_null($this->container['httpBrowserColorDepth']) && (strlen($this->container['httpBrowserColorDepth']) > 2)) {
            $invalid_properties[] = "invalid value for 'httpBrowserColorDepth', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['httpBrowserScreenHeight']) && (strlen($this->container['httpBrowserScreenHeight']) > 6)) {
            $invalid_properties[] = "invalid value for 'httpBrowserScreenHeight', the character length must be smaller than or equal to 6.";
        }

        if (!is_null($this->container['httpBrowserScreenWidth']) && (strlen($this->container['httpBrowserScreenWidth']) > 6)) {
            $invalid_properties[] = "invalid value for 'httpBrowserScreenWidth', the character length must be smaller than or equal to 6.";
        }

        if (!is_null($this->container['httpBrowserTimeDifference']) && (strlen($this->container['httpBrowserTimeDifference']) > 5)) {
            $invalid_properties[] = "invalid value for 'httpBrowserTimeDifference', the character length must be smaller than or equal to 5.";
        }

        if (!is_null($this->container['userAgentBrowserValue']) && (strlen($this->container['userAgentBrowserValue']) > 255)) {
            $invalid_properties[] = "invalid value for 'userAgentBrowserValue', the character length must be smaller than or equal to 255.";
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

        if (strlen($this->container['hostName']) > 60) {
            return false;
        }
        if (strlen($this->container['ipAddress']) > 48) {
            return false;
        }
        if (strlen($this->container['userAgent']) > 40) {
            return false;
        }
        if (strlen($this->container['httpAcceptBrowserValue']) > 255) {
            return false;
        }
        if (strlen($this->container['httpAcceptContent']) > 256) {
            return false;
        }
        if (strlen($this->container['httpBrowserLanguage']) > 8) {
            return false;
        }
        if (strlen($this->container['httpBrowserColorDepth']) > 2) {
            return false;
        }
        if (strlen($this->container['httpBrowserScreenHeight']) > 6) {
            return false;
        }
        if (strlen($this->container['httpBrowserScreenWidth']) > 6) {
            return false;
        }
        if (strlen($this->container['httpBrowserTimeDifference']) > 5) {
            return false;
        }
        if (strlen($this->container['userAgentBrowserValue']) > 255) {
            return false;
        }
        return true;
    }


    /**
     * Gets hostName
     * @return string
     */
    public function getHostName()
    {
        return $this->container['hostName'];
    }

    /**
     * Sets hostName
     * @param string $hostName DNS resolved hostname from `ipAddress`.
     * @return $this
     */
    public function setHostName($hostName)
    {
        if (!is_null($hostName) && (strlen($hostName) > 60)) {
            throw new \InvalidArgumentException('invalid length for $hostName when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 60.');
        }

        $this->container['hostName'] = $hostName;

        return $this;
    }

    /**
     * Gets ipAddress
     * @return string
     */
    public function getIpAddress()
    {
        return $this->container['ipAddress'];
    }

    /**
     * Sets ipAddress
     * @param string $ipAddress IP address of the customer.  #### Used by **Authorization, Capture, and Credit** Optional field.
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        if (!is_null($ipAddress) && (strlen($ipAddress) > 48)) {
            throw new \InvalidArgumentException('invalid length for $ipAddress when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 48.');
        }

        $this->container['ipAddress'] = $ipAddress;

        return $this;
    }

    /**
     * Gets userAgent
     * @return string
     */
    public function getUserAgent()
    {
        return $this->container['userAgent'];
    }

    /**
     * Sets userAgent
     * @param string $userAgent Customer’s browser as identified from the HTTP header data. For example, `Mozilla` is the value that identifies the Netscape browser.
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        if (!is_null($userAgent) && (strlen($userAgent) > 40)) {
            throw new \InvalidArgumentException('invalid length for $userAgent when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 40.');
        }

        $this->container['userAgent'] = $userAgent;

        return $this;
    }

    /**
     * Gets fingerprintSessionId
     * @return string
     */
    public function getFingerprintSessionId()
    {
        return $this->container['fingerprintSessionId'];
    }

    /**
     * Sets fingerprintSessionId
     * @param string $fingerprintSessionId Field that contains the session ID that you send to Decision Manager to obtain the device fingerprint information. The string can contain uppercase and lowercase letters, digits, hyphen (-), and underscore (_). However, do not use the same uppercase and lowercase letters to indicate different session IDs.  The session ID must be unique for each merchant ID. You can use any string that you are already generating, such as an order number or web session ID.  The session ID must be unique for each page load, regardless of an individual’s web session ID. If a user navigates to a profiled page and is assigned a web session, navigates away from the profiled page, then navigates back to the profiled page, the generated session ID should be different and unique. You may use a web session ID, but it is preferable to use an application GUID (Globally Unique Identifier). This measure ensures that a unique ID is generated every time the page is loaded, even if it is the same user reloading the page.
     * @return $this
     */
    public function setFingerprintSessionId($fingerprintSessionId)
    {
        $this->container['fingerprintSessionId'] = $fingerprintSessionId;

        return $this;
    }

    /**
     * Gets rawData
     * @return \CyberSource\Model\Ptsv2paymentsDeviceInformationRawData[]
     */
    public function getRawData()
    {
        return $this->container['rawData'];
    }

    /**
     * Sets rawData
     * @param \CyberSource\Model\Ptsv2paymentsDeviceInformationRawData[] $rawData
     * @return $this
     */
    public function setRawData($rawData)
    {
        $this->container['rawData'] = $rawData;

        return $this;
    }

    /**
     * Gets httpAcceptBrowserValue
     * @return string
     */
    public function getHttpAcceptBrowserValue()
    {
        return $this->container['httpAcceptBrowserValue'];
    }

    /**
     * Sets httpAcceptBrowserValue
     * @param string $httpAcceptBrowserValue Value of the Accept header sent by the customer’s web browser. **Note** If the customer’s browser provides a value, you must include it in your request.
     * @return $this
     */
    public function setHttpAcceptBrowserValue($httpAcceptBrowserValue)
    {
        if (!is_null($httpAcceptBrowserValue) && (strlen($httpAcceptBrowserValue) > 255)) {
            throw new \InvalidArgumentException('invalid length for $httpAcceptBrowserValue when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 255.');
        }

        $this->container['httpAcceptBrowserValue'] = $httpAcceptBrowserValue;

        return $this;
    }

    /**
     * Gets httpAcceptContent
     * @return string
     */
    public function getHttpAcceptContent()
    {
        return $this->container['httpAcceptContent'];
    }

    /**
     * Sets httpAcceptContent
     * @param string $httpAcceptContent The exact content of the HTTP accept header.
     * @return $this
     */
    public function setHttpAcceptContent($httpAcceptContent)
    {
        if (!is_null($httpAcceptContent) && (strlen($httpAcceptContent) > 256)) {
            throw new \InvalidArgumentException('invalid length for $httpAcceptContent when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 256.');
        }

        $this->container['httpAcceptContent'] = $httpAcceptContent;

        return $this;
    }

    /**
     * Gets httpBrowserEmail
     * @return string
     */
    public function getHttpBrowserEmail()
    {
        return $this->container['httpBrowserEmail'];
    }

    /**
     * Sets httpBrowserEmail
     * @param string $httpBrowserEmail Email address set in the customer’s browser, which may differ from customer email.
     * @return $this
     */
    public function setHttpBrowserEmail($httpBrowserEmail)
    {
        $this->container['httpBrowserEmail'] = $httpBrowserEmail;

        return $this;
    }

    /**
     * Gets httpBrowserLanguage
     * @return string
     */
    public function getHttpBrowserLanguage()
    {
        return $this->container['httpBrowserLanguage'];
    }

    /**
     * Sets httpBrowserLanguage
     * @param string $httpBrowserLanguage Value represents the browser language as defined in IETF BCP47. Example:en-US, refer  https://en.wikipedia.org/wiki/IETF_language_tag for more details.
     * @return $this
     */
    public function setHttpBrowserLanguage($httpBrowserLanguage)
    {
        if (!is_null($httpBrowserLanguage) && (strlen($httpBrowserLanguage) > 8)) {
            throw new \InvalidArgumentException('invalid length for $httpBrowserLanguage when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 8.');
        }

        $this->container['httpBrowserLanguage'] = $httpBrowserLanguage;

        return $this;
    }

    /**
     * Gets httpBrowserJavaEnabled
     * @return bool
     */
    public function getHttpBrowserJavaEnabled()
    {
        return $this->container['httpBrowserJavaEnabled'];
    }

    /**
     * Sets httpBrowserJavaEnabled
     * @param bool $httpBrowserJavaEnabled A Boolean value that represents the ability of the cardholder browser to execute Java. Value is returned from the navigator.javaEnabled property. Possible Values:True/False
     * @return $this
     */
    public function setHttpBrowserJavaEnabled($httpBrowserJavaEnabled)
    {
        $this->container['httpBrowserJavaEnabled'] = $httpBrowserJavaEnabled;

        return $this;
    }

    /**
     * Gets httpBrowserJavaScriptEnabled
     * @return bool
     */
    public function getHttpBrowserJavaScriptEnabled()
    {
        return $this->container['httpBrowserJavaScriptEnabled'];
    }

    /**
     * Sets httpBrowserJavaScriptEnabled
     * @param bool $httpBrowserJavaScriptEnabled A Boolean value that represents the ability of the cardholder browser to execute JavaScript. Possible Values:True/False. **Note**: Merchants should be able to know the values from fingerprint details of cardholder's browser.
     * @return $this
     */
    public function setHttpBrowserJavaScriptEnabled($httpBrowserJavaScriptEnabled)
    {
        $this->container['httpBrowserJavaScriptEnabled'] = $httpBrowserJavaScriptEnabled;

        return $this;
    }

    /**
     * Gets httpBrowserColorDepth
     * @return string
     */
    public function getHttpBrowserColorDepth()
    {
        return $this->container['httpBrowserColorDepth'];
    }

    /**
     * Sets httpBrowserColorDepth
     * @param string $httpBrowserColorDepth Value represents the bit depth of the color palette for displaying images, in bits per pixel. Example : 24, refer https://en.wikipedia.org/wiki/Color_depth for more details
     * @return $this
     */
    public function setHttpBrowserColorDepth($httpBrowserColorDepth)
    {
        if (!is_null($httpBrowserColorDepth) && (strlen($httpBrowserColorDepth) > 2)) {
            throw new \InvalidArgumentException('invalid length for $httpBrowserColorDepth when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 2.');
        }

        $this->container['httpBrowserColorDepth'] = $httpBrowserColorDepth;

        return $this;
    }

    /**
     * Gets httpBrowserScreenHeight
     * @return string
     */
    public function getHttpBrowserScreenHeight()
    {
        return $this->container['httpBrowserScreenHeight'];
    }

    /**
     * Sets httpBrowserScreenHeight
     * @param string $httpBrowserScreenHeight Total height of the Cardholder's scree in pixels, example: 864.
     * @return $this
     */
    public function setHttpBrowserScreenHeight($httpBrowserScreenHeight)
    {
        if (!is_null($httpBrowserScreenHeight) && (strlen($httpBrowserScreenHeight) > 6)) {
            throw new \InvalidArgumentException('invalid length for $httpBrowserScreenHeight when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 6.');
        }

        $this->container['httpBrowserScreenHeight'] = $httpBrowserScreenHeight;

        return $this;
    }

    /**
     * Gets httpBrowserScreenWidth
     * @return string
     */
    public function getHttpBrowserScreenWidth()
    {
        return $this->container['httpBrowserScreenWidth'];
    }

    /**
     * Sets httpBrowserScreenWidth
     * @param string $httpBrowserScreenWidth Total width of the cardholder's screen in pixels. Example: 1536.
     * @return $this
     */
    public function setHttpBrowserScreenWidth($httpBrowserScreenWidth)
    {
        if (!is_null($httpBrowserScreenWidth) && (strlen($httpBrowserScreenWidth) > 6)) {
            throw new \InvalidArgumentException('invalid length for $httpBrowserScreenWidth when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 6.');
        }

        $this->container['httpBrowserScreenWidth'] = $httpBrowserScreenWidth;

        return $this;
    }

    /**
     * Gets httpBrowserTimeDifference
     * @return string
     */
    public function getHttpBrowserTimeDifference()
    {
        return $this->container['httpBrowserTimeDifference'];
    }

    /**
     * Sets httpBrowserTimeDifference
     * @param string $httpBrowserTimeDifference Time difference between UTC time and the cardholder browser local time, in minutes, Example:300
     * @return $this
     */
    public function setHttpBrowserTimeDifference($httpBrowserTimeDifference)
    {
        if (!is_null($httpBrowserTimeDifference) && (strlen($httpBrowserTimeDifference) > 5)) {
            throw new \InvalidArgumentException('invalid length for $httpBrowserTimeDifference when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 5.');
        }

        $this->container['httpBrowserTimeDifference'] = $httpBrowserTimeDifference;

        return $this;
    }

    /**
     * Gets userAgentBrowserValue
     * @return string
     */
    public function getUserAgentBrowserValue()
    {
        return $this->container['userAgentBrowserValue'];
    }

    /**
     * Sets userAgentBrowserValue
     * @param string $userAgentBrowserValue Value of the User-Agent header sent by the customer’s web browser. Note If the customer’s browser provides a value, you must include it in your request.
     * @return $this
     */
    public function setUserAgentBrowserValue($userAgentBrowserValue)
    {
        if (!is_null($userAgentBrowserValue) && (strlen($userAgentBrowserValue) > 255)) {
            throw new \InvalidArgumentException('invalid length for $userAgentBrowserValue when calling Ptsv2paymentsDeviceInformation., must be smaller than or equal to 255.');
        }

        $this->container['userAgentBrowserValue'] = $userAgentBrowserValue;

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

