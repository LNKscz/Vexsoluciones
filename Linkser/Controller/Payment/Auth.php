<?php

namespace Vexsoluciones\Linkser\Controller\Payment;

require_once __DIR__.'/cybersource-rest/vendor/autoload.php';
use Firebase\JWT\JWT as JWT;

class Auth
{
    public $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function EnrollWithPendingAuthentication($returnURL)
    {
        $clientReferenceInformationArr = [
            'code' => $this->resource['code'],
        ];

        $clientReferenceInformation = new \CyberSource\Model\Riskv1decisionsClientReferenceInformation($clientReferenceInformationArr);

        $orderInformationAmountDetailsArr = [
          'currency' => $this->resource['currency'],
          'totalAmount' => $this->resource['total'],
        ];

        $orderInformationAmountDetails = new \CyberSource\Model\Riskv1authenticationsOrderInformationAmountDetails($orderInformationAmountDetailsArr);

        $orderInformationBillToArr = [
            'address1' => $this->resource['address']->getData('street'),
            'administrativeArea' => $this->resource['address']->getData('region'),
            'country' => 'BOL',
            'locality' => $this->resource['address']->getData('city'),
            'firstName' => $this->resource['address']->getData('firstname'),
            'lastName' => $this->resource['address']->getData('lastname'),
            'phoneNumber' => '+591'.$this->resource['address']->getTelephone(),
            'email' => $this->resource['address']->getData('email'),
            'postalCode' => '0000',
        ];

        $orderInformationBillTo = new \CyberSource\Model\Riskv1authenticationsOrderInformationBillTo($orderInformationBillToArr);

        $orderInformationArr = [
            'amountDetails' => $orderInformationAmountDetails,
            'billTo' => $orderInformationBillTo,
        ];
        $orderInformation = new \CyberSource\Model\Riskv1authenticationsOrderInformation($orderInformationArr);

        $paymentInformationCardArr = [
            'type' => $this->resource['type'],
            'expirationMonth' => $this->resource['expirationMonth'],
            'expirationYear' => $this->resource['expirationYear'],
            'number' => $this->resource['number'],
        ];

        $paymentInformationCard = new \CyberSource\Model\Riskv1authenticationsPaymentInformationCard($paymentInformationCardArr);

        $paymentInformationArr = [
            'card' => $paymentInformationCard,
        ];
        $paymentInformation = new \CyberSource\Model\Riskv1authenticationsPaymentInformation($paymentInformationArr);

        $buyerInformationArr = [
            'mobilePhone' => '+591'.$this->resource['address']->getTelephone(),
        ];
        $buyerInformation = new \CyberSource\Model\Riskv1authenticationsBuyerInformation($buyerInformationArr);

        $consumerAuthenticationInformationArr = [
            'transactionMode' => 'MOTO',
            'returnUrl' => $returnURL,
        ];
        $consumerAuthenticationInformation = new \CyberSource\Model\Riskv1decisionsConsumerAuthenticationInformation($consumerAuthenticationInformationArr);

        $requestObjArr = [
            'clientReferenceInformation' => $clientReferenceInformation,
            'orderInformation' => $orderInformation,
            'paymentInformation' => $paymentInformation,
            'buyerInformation' => $buyerInformation,
            'consumerAuthenticationInformation' => $consumerAuthenticationInformation,
        ];
        $requestObj = new \CyberSource\Model\CheckPayerAuthEnrollmentRequest($requestObjArr);

        $configCybersources = [
            'merchantID' => $this->resource['id'],
            'apiKeyID' => $this->resource['key'],
            'secretKey' => $this->resource['secret'],
            'opcion' => $this->resource['isTest'] == 1 ? 0 : 1,
        ];

        $commonElement = new ExternalConfiguration($configCybersources);
        $config = $commonElement->ConnectionHost();
        $merchantConfig = $commonElement->merchantConfigObject();

        $api_client = new \CyberSource\ApiClient($config, $merchantConfig);
        $api_instance = new \CyberSource\Api\PayerAuthenticationApi($api_client);

        try {
            $apiResponse = $api_instance->checkPayerAuthEnrollment($requestObj);

            return $apiResponse;
        } catch (\Cybersource\ApiException $e) {
            // return $e->getResponseBody();
            return $e->getMessage();
        }
    }

    public function SetupCompletionWithCardNumber()
    {
        $clientReferenceInformationArr = [
            'code' => $this->resource['code'],
        ];
        $clientReferenceInformation = new \CyberSource\Model\Riskv1decisionsClientReferenceInformation($clientReferenceInformationArr);
        $paymentInformationCardArr = [
                'type' => $this->resource['type'],
                'expirationMonth' => $this->resource['expirationMonth'],
                'expirationYear' => $this->resource['expirationYear'],
                'number' => $this->resource['number'],
        ];

        $paymentInformationCard = new \CyberSource\Model\Riskv1authenticationsetupsPaymentInformationCard($paymentInformationCardArr);

        $paymentInformationArr = [
                'card' => $paymentInformationCard,
        ];

        $paymentInformation = new \CyberSource\Model\Riskv1authenticationsetupsPaymentInformation($paymentInformationArr);

        $requestObjArr = [
                'clientReferenceInformation' => $clientReferenceInformation,
                'paymentInformation' => $paymentInformation,
        ];

        $requestObj = new \CyberSource\Model\PayerAuthSetupRequest($requestObjArr);

        $configCybersources = [
            'merchantID' => $this->resource['id'],
            'apiKeyID' => $this->resource['key'],
            'secretKey' => $this->resource['secret'],
            'opcion' => $this->resource['isTest'] == 1 ? 0 : 1,
        ];

        $commonElement = new ExternalConfiguration($configCybersources);
        $config = $commonElement->ConnectionHost();
        $merchantConfig = $commonElement->merchantConfigObject();

        $api_client = new \CyberSource\ApiClient($config, $merchantConfig);
        $api_instance = new \CyberSource\Api\PayerAuthenticationApi($api_client);

        try {
            $apiResponse = $api_instance->payerAuthSetup($requestObj);

            return $apiResponse;
            // require_once "auth.php";
            // echo "</pre>";
        } catch (\Cybersource\ApiException $e) {
            return $e->getMessage();
        }
    }

    public function paymentAuthCapture3DS($data)
    {
        $clientReferenceInformationArr = [
                'code' => $this->resource['code'],
        ];
        $clientReferenceInformation = new \CyberSource\Model\Ptsv2paymentsClientReferenceInformation($clientReferenceInformationArr);

        $processingInformationArr = [
                'capture' => true,
                'commerceIndicator' => $data['commerceIndicator'],
        ];
        $processingInformation = new \CyberSource\Model\Ptsv2paymentsProcessingInformation($processingInformationArr);

        $paymentInformationCardArr = [
                'number' => $this->resource['number'],
                'expirationMonth' => $this->resource['expirationMonth'],
                'expirationYear' => $this->resource['expirationYear'],
        ];

        $paymentInformationCard = new \CyberSource\Model\Ptsv2paymentsPaymentInformationCard($paymentInformationCardArr);

        $paymentConsumerAuthenticationArr = [
          'veresEnrolled' => $data['veresEnrolled'],
          'ucafCollectionIndicator' => $data['ucafCollectionIndicator'],
          'directoryServerTransactionId' => $data['directoryServerTransactionId'],
          'paSpecificationVersion' => $data['paSpecificationVersion'],
        ];

        $paymentConsumerAuthentication = new \CyberSource\Model\Ptsv2paymentsConsumerAuthenticationInformation($paymentConsumerAuthenticationArr);

        $paymentInformationArr = [
                'card' => $paymentInformationCard,
        ];
        $paymentInformation = new \CyberSource\Model\Ptsv2paymentsPaymentInformation($paymentInformationArr);

        $orderInformationAmountDetailsArr = [
                'totalAmount' => $this->resource['total'],
                'currency' => $this->resource['currency'],
        ];
        $orderInformationAmountDetails = new \CyberSource\Model\Ptsv2paymentsOrderInformationAmountDetails($orderInformationAmountDetailsArr);

        $orderInformationBillToArr = [
                'firstName' => $this->resource['address']->getData('firstname'),
                'lastName' => $this->resource['address']->getData('lastname'),
                'address1' => $this->resource['address']->getData('street'),
                'locality' => $this->resource['address']->getData('city'),
                'administrativeArea' => $this->resource['address']->getData('region'),
                'postalCode' => '0000',
                'country' => 'BOL',
                'email' => $this->resource['address']->getData('email'),
                'phoneNumber' => '+591'.$this->resource['address']->getTelephone(),
        ];

        $orderInformationBillTo = new \CyberSource\Model\Ptsv2paymentsOrderInformationBillTo($orderInformationBillToArr);

        $orderInformationArr = [
                'amountDetails' => $orderInformationAmountDetails,
                'billTo' => $orderInformationBillTo,
        ];
        $orderInformation = new \CyberSource\Model\Ptsv2paymentsOrderInformation($orderInformationArr);

        $requestObjArr = [
          'clientReferenceInformation' => $clientReferenceInformation,
          'processingInformation' => $processingInformation,
          'paymentInformation' => $paymentInformation,
          'orderInformation' => $orderInformation,
          'consumerAuthenticationInformation' => $paymentConsumerAuthentication,
        ];

        $requestObj = new \CyberSource\Model\CreatePaymentRequest($requestObjArr);

        $configCybersources = [
          'merchantID' => $this->resource['id'],
          'apiKeyID' => $this->resource['key'],
          'secretKey' => $this->resource['secret'],
          'opcion' => $this->resource['isTest'] == 1 ? 0 : 1,
        ];

        $commonElement = new ExternalConfiguration($configCybersources);
        $config = $commonElement->ConnectionHost();
        $merchantConfig = $commonElement->merchantConfigObject();

        $api_client = new \CyberSource\ApiClient($config, $merchantConfig);
        $api_instance = new \CyberSource\Api\PaymentsApi($api_client);

        try {
            $apiResponse = $api_instance->createPayment($requestObj);

            return $apiResponse;
        } catch (Cybersource\ApiException $e) {
            return $e->getMessage();
        }
    }

    public function paymentAuthCapture()
    {
        $clientReferenceInformationArr = [
          'code' => $this->resource['code'],
        ];

        $clientReferenceInformation = new \CyberSource\Model\Ptsv2paymentsClientReferenceInformation($clientReferenceInformationArr);

        $processingInformationArr = [
          'capture' => true,
        ];

        $processingInformation = new \CyberSource\Model\Ptsv2paymentsProcessingInformation($processingInformationArr);

        $paymentInformationCardArr = [
                'number' => $this->resource['number'],
                'expirationMonth' => $this->resource['expirationMonth'],
                'expirationYear' => $this->resource['expirationYear'],
        ];

        $paymentInformationCard = new \CyberSource\Model\Ptsv2paymentsPaymentInformationCard($paymentInformationCardArr);

        $paymentInformationArr = [
                'card' => $paymentInformationCard,
        ];
        $paymentInformation = new \CyberSource\Model\Ptsv2paymentsPaymentInformation($paymentInformationArr);

        $orderInformationAmountDetailsArr = [
                'totalAmount' => $this->resource['total'],
                'currency' => $this->resource['currency'],
        ];
        $orderInformationAmountDetails = new \CyberSource\Model\Ptsv2paymentsOrderInformationAmountDetails($orderInformationAmountDetailsArr);

        $orderInformationBillToArr = [
                'firstName' => $this->resource['address']->getData('firstname'),
                'lastName' => $this->resource['address']->getData('lastname'),
                'address1' => $this->resource['address']->getData('street'),
                'locality' => $this->resource['address']->getData('city'),
                'administrativeArea' => $this->resource['address']->getData('region'),
                'postalCode' => '0000',
                'country' => 'BOL',
                'email' => $this->resource['address']->getData('email'),
                'phoneNumber' => '+591'.$this->resource['address']->getTelephone(),
        ];

        $orderInformationBillTo = new \CyberSource\Model\Ptsv2paymentsOrderInformationBillTo($orderInformationBillToArr);

        $orderInformationArr = [
                'amountDetails' => $orderInformationAmountDetails,
                'billTo' => $orderInformationBillTo,
        ];
        $orderInformation = new \CyberSource\Model\Ptsv2paymentsOrderInformation($orderInformationArr);

        $requestObjArr = [
          'clientReferenceInformation' => $clientReferenceInformation,
          'processingInformation' => $processingInformation,
          'paymentInformation' => $paymentInformation,
          'orderInformation' => $orderInformation,
        ];

        $requestObj = new \CyberSource\Model\CreatePaymentRequest($requestObjArr);

        $configCybersources = [
          'merchantID' => $this->resource['id'],
          'apiKeyID' => $this->resource['key'],
          'secretKey' => $this->resource['secret'],
          'opcion' => $this->resource['isTest'] == 1 ? 0 : 1,
        ];

        $commonElement = new ExternalConfiguration($configCybersources);
        $config = $commonElement->ConnectionHost();
        $merchantConfig = $commonElement->merchantConfigObject();

        $api_client = new \CyberSource\ApiClient($config, $merchantConfig);
        $api_instance = new \CyberSource\Api\PaymentsApi($api_client);

        try {
            $apiResponse = $api_instance->createPayment($requestObj);

            return $apiResponse;
        } catch (Cybersource\ApiException $e) {
            return $e->getMessage();
        }
    }

    public function AuthorizationWithPayerAuthValidation()
    {
        $clientReferenceInformationArr = [
          'code' => $this->resource['code'],
        ];
        $clientReferenceInformation = new \CyberSource\Model\Ptsv2paymentsClientReferenceInformation($clientReferenceInformationArr);
        $processingInformationActionList = [];
        $processingInformationActionList[0] = 'VALIDATE_CONSUMER_AUTHENTICATION';
        $processingInformationArr = [
            'actionList' => $processingInformationActionList,
            'capture' => true,
        ];

        $processingInformation = new \CyberSource\Model\Ptsv2paymentsProcessingInformation($processingInformationArr);

        $paymentInformationCardArr = [
            'number' => $this->resource['number'],
            'expirationMonth' => $this->resource['expirationMonth'],
            'expirationYear' => $this->resource['expirationYear'],
        ];

        $paymentInformationCard = new \CyberSource\Model\Ptsv2paymentsPaymentInformationCard($paymentInformationCardArr);

        $paymentInformationArr = [
            'card' => $paymentInformationCard,
        ];
        $paymentInformation = new \CyberSource\Model\Ptsv2paymentsPaymentInformation($paymentInformationArr);
        $orderInformationAmountDetailsArr = [
            'totalAmount' => $this->resource['total'],
            'currency' => $this->resource['currency'],
        ];
        $orderInformationAmountDetails = new \CyberSource\Model\Ptsv2paymentsOrderInformationAmountDetails($orderInformationAmountDetailsArr);

        $orderInformationBillToArr = [
          'firstName' => $this->resource['address']->getData('firstname'),
          'lastName' => $this->resource['address']->getData('lastname'),
          'address1' => $this->resource['address']->getData('street'),
          'locality' => $this->resource['address']->getData('city'),
          'administrativeArea' => $this->resource['address']->getData('region'),
          'postalCode' => '00000',
          'country' => 'BOL',
          'email' => $this->resource['address']->getData('email'),
          'phoneNumber' => '591'.$this->resource['address']->getTelephone(),
        ];
        $orderInformationBillTo = new \CyberSource\Model\Ptsv2paymentsOrderInformationBillTo($orderInformationBillToArr);

        $orderInformationArr = [
            'amountDetails' => $orderInformationAmountDetails,
            'billTo' => $orderInformationBillTo,
        ];
        $orderInformation = new \CyberSource\Model\Ptsv2paymentsOrderInformation($orderInformationArr);

        $consumerAuthenticationInformationArr = [
            'authenticationTransactionId' => $this->resource['transactionId'],
        ];
        $consumerAuthenticationInformation = new \CyberSource\Model\Ptsv2paymentsConsumerAuthenticationInformation($consumerAuthenticationInformationArr);

        $requestObjArr = [
            'clientReferenceInformation' => $clientReferenceInformation,
            'processingInformation' => $processingInformation,
            'paymentInformation' => $paymentInformation,
            'orderInformation' => $orderInformation,
            'consumerAuthenticationInformation' => $consumerAuthenticationInformation,
        ];
        $requestObj = new \CyberSource\Model\CreatePaymentRequest($requestObjArr);
        $configCybersources = [
          'merchantID' => $this->resource['id'],
          'apiKeyID' => $this->resource['key'],
          'secretKey' => $this->resource['secret'],
          'opcion' => $this->resource['isTest'] == 1 ? 0 : 1,
        ];
        $commonElement = new ExternalConfiguration($configCybersources);
        $config = $commonElement->ConnectionHost();
        $merchantConfig = $commonElement->merchantConfigObject();

        $api_client = new \CyberSource\ApiClient($config, $merchantConfig);
        $api_instance = new \CyberSource\Api\PaymentsApi($api_client);

        try {
            $apiResponse = $api_instance->createPayment($requestObj);

            return $apiResponse;
        } catch (Cybersource\ApiException $e) {
            return $e->getMessage();
        }
    }

    public static function getJsonWebToken($body, $key)
    {
        return JWT::encode($body, $key);
    }

    public static function decodeJsonWebToken($token, $key)
    {
        return JWT::decode($token, $key);
    }
}