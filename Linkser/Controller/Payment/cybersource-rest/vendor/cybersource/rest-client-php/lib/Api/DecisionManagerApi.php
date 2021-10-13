<?php
/**
 * DecisionManagerApi
 * PHP version 5
 *
 * @category Class
 * @package  CyberSource
 * @author   Swagger Codegen team
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

namespace CyberSource\Api;

use \CyberSource\ApiClient;
use \CyberSource\ApiException;
use \CyberSource\Configuration;
use \CyberSource\ObjectSerializer;

/**
 * DecisionManagerApi Class Doc Comment
 *
 * @category Class
 * @package  CyberSource
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DecisionManagerApi
{
    /**
     * API Client
     *
     * @var \CyberSource\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \CyberSource\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\CyberSource\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \CyberSource\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \CyberSource\ApiClient $apiClient set the API client
     *
     * @return DecisionManagerApi
     */
    public function setApiClient(\CyberSource\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation addNegative
     *
     * List Management
     *
     * @param string $type The list to be updated. It can be &#39;positive&#39;, &#39;negative&#39; or &#39;review&#39;. (required)
     * @param \CyberSource\Model\AddNegativeListRequest $addNegativeListRequest  (required)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\RiskV1UpdatePost201Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function addNegative($type, $addNegativeListRequest)
    {
        list($response, $statusCode, $httpHeader) = $this->addNegativeWithHttpInfo($type, $addNegativeListRequest);
        return [$response, $statusCode, $httpHeader];
    }

    /**
     * Operation addNegativeWithHttpInfo
     *
     * List Management
     *
     * @param string $type The list to be updated. It can be &#39;positive&#39;, &#39;negative&#39; or &#39;review&#39;. (required)
     * @param \CyberSource\Model\AddNegativeListRequest $addNegativeListRequest  (required)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\RiskV1UpdatePost201Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function addNegativeWithHttpInfo($type, $addNegativeListRequest)
    {
        // verify the required parameter 'type' is set
        if ($type === null) {
            throw new \InvalidArgumentException('Missing the required parameter $type when calling addNegative');
        }
        // verify the required parameter 'addNegativeListRequest' is set
        if ($addNegativeListRequest === null) {
            throw new \InvalidArgumentException('Missing the required parameter $addNegativeListRequest when calling addNegative');
        }
        // parse inputs
        $resourcePath = "/risk/v1/lists/{type}/entries";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/hal+json;charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

        // path params
        if ($type !== null) {
            $resourcePath = str_replace(
                "{" . "type" . "}",
                $this->apiClient->getSerializer()->toPathValue($type),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($addNegativeListRequest)) {
            $_tempBody = $addNegativeListRequest;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\CyberSource\Model\RiskV1UpdatePost201Response',
                '/risk/v1/lists/{type}/entries'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\CyberSource\Model\RiskV1UpdatePost201Response', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\RiskV1UpdatePost201Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\RiskV1DecisionsPost400Response1', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation createBundledDecisionManagerCase
     *
     * Create Decision Manager
     *
     * @param \CyberSource\Model\CreateBundledDecisionManagerCaseRequest $createBundledDecisionManagerCaseRequest  (required)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\RiskV1DecisionsPost201Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function createBundledDecisionManagerCase($createBundledDecisionManagerCaseRequest)
    {
        list($response, $statusCode, $httpHeader) = $this->createBundledDecisionManagerCaseWithHttpInfo($createBundledDecisionManagerCaseRequest);
        return [$response, $statusCode, $httpHeader];
    }

    /**
     * Operation createBundledDecisionManagerCaseWithHttpInfo
     *
     * Create Decision Manager
     *
     * @param \CyberSource\Model\CreateBundledDecisionManagerCaseRequest $createBundledDecisionManagerCaseRequest  (required)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\RiskV1DecisionsPost201Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function createBundledDecisionManagerCaseWithHttpInfo($createBundledDecisionManagerCaseRequest)
    {
        // verify the required parameter 'createBundledDecisionManagerCaseRequest' is set
        if ($createBundledDecisionManagerCaseRequest === null) {
            throw new \InvalidArgumentException('Missing the required parameter $createBundledDecisionManagerCaseRequest when calling createBundledDecisionManagerCase');
        }
        // parse inputs
        $resourcePath = "/risk/v1/decisions";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/hal+json;charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

        // body params
        $_tempBody = null;
        if (isset($createBundledDecisionManagerCaseRequest)) {
            $_tempBody = $createBundledDecisionManagerCaseRequest;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\CyberSource\Model\RiskV1DecisionsPost201Response',
                '/risk/v1/decisions'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\CyberSource\Model\RiskV1DecisionsPost201Response', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\RiskV1DecisionsPost201Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\RiskV1DecisionsPost400Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 502:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\PtsV2PaymentsPost502Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation fraudUpdate
     *
     * Fraud Marking
     *
     * @param string $id Request ID of the transaction that you want to mark as suspect or remove from history. (required)
     * @param \CyberSource\Model\FraudMarkingActionRequest $fraudMarkingActionRequest  (required)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\RiskV1UpdatePost201Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function fraudUpdate($id, $fraudMarkingActionRequest)
    {
        list($response, $statusCode, $httpHeader) = $this->fraudUpdateWithHttpInfo($id, $fraudMarkingActionRequest);
        return [$response, $statusCode, $httpHeader];
    }

    /**
     * Operation fraudUpdateWithHttpInfo
     *
     * Fraud Marking
     *
     * @param string $id Request ID of the transaction that you want to mark as suspect or remove from history. (required)
     * @param \CyberSource\Model\FraudMarkingActionRequest $fraudMarkingActionRequest  (required)
     * @throws \CyberSource\ApiException on non-2xx response
     * @return array of \CyberSource\Model\RiskV1UpdatePost201Response, HTTP status code, HTTP response headers (array of strings)
     */
    public function fraudUpdateWithHttpInfo($id, $fraudMarkingActionRequest)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling fraudUpdate');
        }
        // verify the required parameter 'fraudMarkingActionRequest' is set
        if ($fraudMarkingActionRequest === null) {
            throw new \InvalidArgumentException('Missing the required parameter $fraudMarkingActionRequest when calling fraudUpdate');
        }
        // parse inputs
        $resourcePath = "/risk/v1/decisions/{id}/marking";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/hal+json;charset=utf-8']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // body params
        $_tempBody = null;
        if (isset($fraudMarkingActionRequest)) {
            $_tempBody = $fraudMarkingActionRequest;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\CyberSource\Model\RiskV1UpdatePost201Response',
                '/risk/v1/decisions/{id}/marking'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\CyberSource\Model\RiskV1UpdatePost201Response', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\RiskV1UpdatePost201Response', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\CyberSource\Model\RiskV1DecisionsPost400Response1', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
