<?php
/**
 * Riskv1authenticationsOrderInformationBillTo
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
 * Riskv1authenticationsOrderInformationBillTo Class Doc Comment
 *
 * @category    Class
 * @package     CyberSource
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Riskv1authenticationsOrderInformationBillTo implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'riskv1authentications_orderInformation_billTo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'address1' => 'string',
        'address2' => 'string',
        'administrativeArea' => 'string',
        'country' => 'string',
        'locality' => 'string',
        'firstName' => 'string',
        'lastName' => 'string',
        'phoneNumber' => 'string',
        'email' => 'string',
        'postalCode' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'address1' => null,
        'address2' => null,
        'administrativeArea' => null,
        'country' => null,
        'locality' => null,
        'firstName' => null,
        'lastName' => null,
        'phoneNumber' => null,
        'email' => null,
        'postalCode' => null
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
        'address1' => 'address1',
        'address2' => 'address2',
        'administrativeArea' => 'administrativeArea',
        'country' => 'country',
        'locality' => 'locality',
        'firstName' => 'firstName',
        'lastName' => 'lastName',
        'phoneNumber' => 'phoneNumber',
        'email' => 'email',
        'postalCode' => 'postalCode'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'address1' => 'setAddress1',
        'address2' => 'setAddress2',
        'administrativeArea' => 'setAdministrativeArea',
        'country' => 'setCountry',
        'locality' => 'setLocality',
        'firstName' => 'setFirstName',
        'lastName' => 'setLastName',
        'phoneNumber' => 'setPhoneNumber',
        'email' => 'setEmail',
        'postalCode' => 'setPostalCode'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'address1' => 'getAddress1',
        'address2' => 'getAddress2',
        'administrativeArea' => 'getAdministrativeArea',
        'country' => 'getCountry',
        'locality' => 'getLocality',
        'firstName' => 'getFirstName',
        'lastName' => 'getLastName',
        'phoneNumber' => 'getPhoneNumber',
        'email' => 'getEmail',
        'postalCode' => 'getPostalCode'
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
        $this->container['address1'] = isset($data['address1']) ? $data['address1'] : null;
        $this->container['address2'] = isset($data['address2']) ? $data['address2'] : null;
        $this->container['administrativeArea'] = isset($data['administrativeArea']) ? $data['administrativeArea'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['locality'] = isset($data['locality']) ? $data['locality'] : null;
        $this->container['firstName'] = isset($data['firstName']) ? $data['firstName'] : null;
        $this->container['lastName'] = isset($data['lastName']) ? $data['lastName'] : null;
        $this->container['phoneNumber'] = isset($data['phoneNumber']) ? $data['phoneNumber'] : null;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['postalCode'] = isset($data['postalCode']) ? $data['postalCode'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['address1'] === null) {
            $invalid_properties[] = "'address1' can't be null";
        }
        if ((strlen($this->container['address1']) > 60)) {
            $invalid_properties[] = "invalid value for 'address1', the character length must be smaller than or equal to 60.";
        }

        if (!is_null($this->container['address2']) && (strlen($this->container['address2']) > 60)) {
            $invalid_properties[] = "invalid value for 'address2', the character length must be smaller than or equal to 60.";
        }

        if ($this->container['administrativeArea'] === null) {
            $invalid_properties[] = "'administrativeArea' can't be null";
        }
        if ((strlen($this->container['administrativeArea']) > 20)) {
            $invalid_properties[] = "invalid value for 'administrativeArea', the character length must be smaller than or equal to 20.";
        }

        if ($this->container['country'] === null) {
            $invalid_properties[] = "'country' can't be null";
        }
        if ((strlen($this->container['country']) > 2)) {
            $invalid_properties[] = "invalid value for 'country', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['locality']) && (strlen($this->container['locality']) > 50)) {
            $invalid_properties[] = "invalid value for 'locality', the character length must be smaller than or equal to 50.";
        }

        if ($this->container['firstName'] === null) {
            $invalid_properties[] = "'firstName' can't be null";
        }
        if ((strlen($this->container['firstName']) > 60)) {
            $invalid_properties[] = "invalid value for 'firstName', the character length must be smaller than or equal to 60.";
        }

        if ($this->container['lastName'] === null) {
            $invalid_properties[] = "'lastName' can't be null";
        }
        if ((strlen($this->container['lastName']) > 60)) {
            $invalid_properties[] = "invalid value for 'lastName', the character length must be smaller than or equal to 60.";
        }

        if (!is_null($this->container['phoneNumber']) && (strlen($this->container['phoneNumber']) > 15)) {
            $invalid_properties[] = "invalid value for 'phoneNumber', the character length must be smaller than or equal to 15.";
        }

        if ($this->container['email'] === null) {
            $invalid_properties[] = "'email' can't be null";
        }
        if ((strlen($this->container['email']) > 255)) {
            $invalid_properties[] = "invalid value for 'email', the character length must be smaller than or equal to 255.";
        }

        if ($this->container['postalCode'] === null) {
            $invalid_properties[] = "'postalCode' can't be null";
        }
        if ((strlen($this->container['postalCode']) > 10)) {
            $invalid_properties[] = "invalid value for 'postalCode', the character length must be smaller than or equal to 10.";
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

        if ($this->container['address1'] === null) {
            return false;
        }
        if (strlen($this->container['address1']) > 60) {
            return false;
        }
        if (strlen($this->container['address2']) > 60) {
            return false;
        }
        if ($this->container['administrativeArea'] === null) {
            return false;
        }
        if (strlen($this->container['administrativeArea']) > 20) {
            return false;
        }
        if ($this->container['country'] === null) {
            return false;
        }
        if (strlen($this->container['country']) > 2) {
            return false;
        }
        if (strlen($this->container['locality']) > 50) {
            return false;
        }
        if ($this->container['firstName'] === null) {
            return false;
        }
        if (strlen($this->container['firstName']) > 60) {
            return false;
        }
        if ($this->container['lastName'] === null) {
            return false;
        }
        if (strlen($this->container['lastName']) > 60) {
            return false;
        }
        if (strlen($this->container['phoneNumber']) > 15) {
            return false;
        }
        if ($this->container['email'] === null) {
            return false;
        }
        if (strlen($this->container['email']) > 255) {
            return false;
        }
        if ($this->container['postalCode'] === null) {
            return false;
        }
        if (strlen($this->container['postalCode']) > 10) {
            return false;
        }
        return true;
    }


    /**
     * Gets address1
     * @return string
     */
    public function getAddress1()
    {
        return $this->container['address1'];
    }

    /**
     * Sets address1
     * @param string $address1 Payment card billing street address as it appears on the credit card issuer’s records.  #### Atos This field must not contain colons (:).  #### CyberSource through VisaNet **Important** When you populate orderInformation.billTo.address1 and orderInformation.billTo.address2, CyberSource through VisaNet concatenates the two values. If the concatenated value exceeds 40 characters, CyberSource through VisaNet truncates the value at 40 characters before sending it to Visa and the issuing bank. Truncating this value affects AVS results and therefore might also affect risk decisions and chargebacks. Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### FDMS Nashville When the street name is numeric, it must be sent in numeric format. For example, if the address is _One First Street_, it must be sent as _1 1st Street_.  Required if keyed; not used if swiped.  String (20)  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### All other processors: Optional. String (60)  #### For Payouts This field may be sent only for FDC Compass.  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.
     * @return $this
     */
    public function setAddress1($address1)
    {
        if ((strlen($address1) > 60)) {
            throw new \InvalidArgumentException('invalid length for $address1 when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 60.');
        }

        $this->container['address1'] = $address1;

        return $this;
    }

    /**
     * Gets address2
     * @return string
     */
    public function getAddress2()
    {
        return $this->container['address2'];
    }

    /**
     * Sets address2
     * @param string $address2 Used for additional address information. For example: _Attention: Accounts Payable_ Optional field.  For Payouts: This field may be sent only for FDC Compass.  #### Atos This field must not contain colons (:).  #### CyberSource through VisaNet **Important** When you populate `orderInformation.billTo.address1` and `orderInformation.billTo.address2`, CyberSource through VisaNet concatenates the two values. If the concatenated value exceeds 40 characters, CyberSource through VisaNet truncates the value at 40 characters before sending it to Visa and the issuing bank. Truncating this value affects AVS results and therefore might also affect risk decisions and chargebacks. Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### Chase Paymentech Solutions, FDC Compass, and TSYS Acquiring Solutions This value is used for AVS.  #### FDMS Nashville `orderInformation.billTo.address1` and `orderInformation.billTo.address2` together cannot exceed 20 characters. String (20)  #### All Other Processors String (60)
     * @return $this
     */
    public function setAddress2($address2)
    {
        if (!is_null($address2) && (strlen($address2) > 60)) {
            throw new \InvalidArgumentException('invalid length for $address2 when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 60.');
        }

        $this->container['address2'] = $address2;

        return $this;
    }

    /**
     * Gets administrativeArea
     * @return string
     */
    public function getAdministrativeArea()
    {
        return $this->container['administrativeArea'];
    }

    /**
     * Sets administrativeArea
     * @param string $administrativeArea State or province of the billing address. Use the [State, Province, and Territory Codes for the United States and Canada](https://developer.cybersource.com/library/documentation/sbc/quickref/states_and_provinces.pdf).  For Payouts: This field may be sent only for FDC Compass.  ##### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### OmniPay Direct Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setAdministrativeArea($administrativeArea)
    {
        if ((strlen($administrativeArea) > 20)) {
            throw new \InvalidArgumentException('invalid length for $administrativeArea when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 20.');
        }

        $this->container['administrativeArea'] = $administrativeArea;

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
     * @param string $country Payment card billing country. Use the two-character [ISO Standard Country Codes](http://apps.cybersource.com/library/documentation/sbc/quickref/countries_alpha_list.pdf).  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### OmniPay Direct Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setCountry($country)
    {
        if ((strlen($country) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 2.');
        }

        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets locality
     * @return string
     */
    public function getLocality()
    {
        return $this->container['locality'];
    }

    /**
     * Sets locality
     * @param string $locality Payment card billing city.  #### Atos This field must not contain colons (:).  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### For Payouts: This field may be sent only for FDC Compass.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### OmniPay Direct Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setLocality($locality)
    {
        if (!is_null($locality) && (strlen($locality) > 50)) {
            throw new \InvalidArgumentException('invalid length for $locality when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 50.');
        }

        $this->container['locality'] = $locality;

        return $this;
    }

    /**
     * Gets firstName
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['firstName'];
    }

    /**
     * Sets firstName
     * @param string $firstName Customer’s first name. This name must be the same as the name on the card.  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.  #### CyberSource Latin American Processing **Important** For an authorization request, CyberSource Latin American Processing concatenates `orderInformation.billTo.firstName` and `orderInformation.billTo.lastName`. If the concatenated value exceeds 30 characters, CyberSource Latin American Processing declines the authorization request.\\ **Note** CyberSource Latin American Processing is the name of a specific processing connection that CyberSource supports. In the CyberSource API documentation, CyberSource Latin American Processing does not refer to the general topic of processing in Latin America. The information in this field description is for the specific processing connection called _CyberSource Latin American Processing_. It is not for any other Latin American processors that CyberSource supports.  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### For Payouts: This field may be sent only for FDC Compass.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### OmniPay Direct Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setFirstName($firstName)
    {
        if ((strlen($firstName) > 60)) {
            throw new \InvalidArgumentException('invalid length for $firstName when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 60.');
        }

        $this->container['firstName'] = $firstName;

        return $this;
    }

    /**
     * Gets lastName
     * @return string
     */
    public function getLastName()
    {
        return $this->container['lastName'];
    }

    /**
     * Sets lastName
     * @param string $lastName Customer’s last name. This name must be the same as the name on the card.  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### CyberSource Latin American Processing **Important** For an authorization request, CyberSource Latin American Processing concatenates `orderInformation.billTo.firstName` and `orderInformation.billTo.lastName`. If the concatenated value exceeds 30 characters, CyberSource Latin American Processing declines the authorization request.\\ **Note** CyberSource Latin American Processing is the name of a specific processing connection that CyberSource supports. In the CyberSource API documentation, CyberSource Latin American Processing does not refer to the general topic of processing in Latin America. The information in this field description is for the specific processing connection called CyberSource Latin American Processing. It is not for any other Latin American processors that CyberSource supports.  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### For Payouts: This field may be sent only for FDC Compass.  #### OmniPay Direct Optional field.  #### RBS WorldPay Atlanta Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setLastName($lastName)
    {
        if ((strlen($lastName) > 60)) {
            throw new \InvalidArgumentException('invalid length for $lastName when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 60.');
        }

        $this->container['lastName'] = $lastName;

        return $this;
    }

    /**
     * Gets phoneNumber
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->container['phoneNumber'];
    }

    /**
     * Sets phoneNumber
     * @param string $phoneNumber Customer’s phone number.  It is recommended that you include the country code when the order is from outside the U.S.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### For Payouts: This field may be sent only for FDC Compass.  #### OmniPay Direct Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Optional field.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        if (!is_null($phoneNumber) && (strlen($phoneNumber) > 15)) {
            throw new \InvalidArgumentException('invalid length for $phoneNumber when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 15.');
        }

        $this->container['phoneNumber'] = $phoneNumber;

        return $this;
    }

    /**
     * Gets email
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     * @param string $email Customer's email address, including the full domain name.  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.  For processor-specific information, see the `customer_email` request-level field description in [Credit Card Services Using the SCMP API.](http://apps.cybersource.com/library/documentation/dev_guides/CC_Svcs_SCMP_API/html)  #### Invoicing Email address for the customer for sending the invoice. If the invoice is in SENT status and email is updated, the old email customer payment link won't work and you must resend the invoice with the new payment link.  #### Chase Paymentech Solutions Optional field.  ####  Credit Mutuel-CIC Optional field.  #### OmniPay Direct Optional field.  #### SIX Optional field.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### Worldpay VAP Optional field.  #### All other processors Not used.
     * @return $this
     */
    public function setEmail($email)
    {
        if ((strlen($email) > 255)) {
            throw new \InvalidArgumentException('invalid length for $email when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 255.');
        }

        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets postalCode
     * @return string
     */
    public function getPostalCode()
    {
        return $this->container['postalCode'];
    }

    /**
     * Sets postalCode
     * @param string $postalCode Postal code for the billing address. The postal code must consist of 5 to 9 digits.  When the billing country is the U.S., the 9-digit postal code must follow this format: [5 digits][dash][4 digits]  **Example** `12345-6789`  When the billing country is Canada, the 6-digit postal code must follow this format: [alpha][numeric][alpha][space][numeric][alpha][numeric]  **Example** `A1B 2C3`  **Important** It is your responsibility to determine whether a field is required for the transaction you are requesting.  #### For Payouts:  This field may be sent only for FDC Compass.  #### American Express Direct Before sending the postal code to the processor, CyberSource removes all nonalphanumeric characters and, if the remaining value is longer than nine characters, truncates the value starting from the right side.  #### Atos This field must not contain colons (:).  #### CyberSource through VisaNet Credit card networks cannot process transactions that contain non-ASCII characters. CyberSource through VisaNet accepts and stores non-ASCII characters correctly and displays them correctly in reports. However, the limitations of the credit card networks prevent CyberSource through VisaNet from transmitting non-ASCII characters to the credit card networks. Therefore, CyberSource through VisaNet replaces non-ASCII characters with meaningless ASCII characters for transmission to the credit card networks.  #### FDMS Nashville Required if `pointOfSaleInformation.entryMode=keyed` and the address is in the U.S. or Canada. Optional if `pointOfSaleInformation.entryMode=keyed` and the address is **not** in the U.S. or Canada. Not used if swiped.  #### RBS WorldPay Atlanta: For best card-present keyed rates, send the postal code if `pointOfSaleInformation.entryMode=keyed`.  #### TSYS Acquiring Solutions Required when `processingInformation.billPaymentOptions.billPayment=true` and `pointOfSaleInformation.entryMode=keyed`.  #### All other processors: Optional field.
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        if ((strlen($postalCode) > 10)) {
            throw new \InvalidArgumentException('invalid length for $postalCode when calling Riskv1authenticationsOrderInformationBillTo., must be smaller than or equal to 10.');
        }

        $this->container['postalCode'] = $postalCode;

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


