<?php
/**
 * Copyright � 2015 Inchoo d.o.o.
 * created by Zoran Salamun(zoran.salamun@inchoo.net).
 */

namespace Vexsoluciones\Linkser\Controller\Payment;

/*
 *  Modulo Payment Credomatic
 * 	VexSoluciones
 * */

class Jwt extends \Magento\Framework\App\Action\Action
{
    protected $_context;
    protected $_pageFactory;
    protected $_jsonEncoder;
    protected $_checkoutSession;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Json\EncoderInterface $encoder
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->_context = $context;
        $this->scopeConfig = $scopeConfig;
        $this->_pageFactory = $pageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_jsonEncoder = $encoder;
        parent::__construct($context);
    }

    public function execute()
    {
        $time = time();
        $order_id = $this->_checkoutSession->getQuote()->getData('entity_id');
        $result = $this->resultJsonFactory->create();

        $token = [
            'jti' => $time,
            'iat' => $time,
            'iss' => $this->getConfigData('id_api'),
            'OrgUnitId' => $this->getConfigData('id_org'),
            'Payload' => [
                'OrderDetails' => [
                    'OrderNumber' => $order_id,
                ],
            ],
            'ReferenceId' => $this->getConfigData('key_cyber'),
            'ObjectifyPayload' => true,
            'exp' => $time + (60 * 60), // Tiempo que expirará el token (+1 hora)
        ];

        $jwt = Auth::getJsonWebToken($token, $this->getConfigData('key_api'));
        $resposeEnroller = [
            'token' => $jwt,
        ];

        return $result->setData($resposeEnroller);
    }

    public function getConfigData($config_path)
    {
        return $this->scopeConfig->getValue(
            'payment/linkser_creditcard/'.$config_path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}