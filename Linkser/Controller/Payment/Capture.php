<?php
/**
 * Copyright � 2015 Inchoo d.o.o.
 * created by Zoran Salamun(zoran.salamun@inchoo.net).
 */

namespace Vexsoluciones\Linkser\Controller\Payment;

class Capture extends \Magento\Framework\App\Action\Action
{
    protected $_context;
    protected $_pageFactory;
    protected $_jsonEncoder;

    protected $_checkoutSession;
    protected $order;
    protected $customerSession;
    private $orderRepository;
    private $log;
    protected $_storeManager;

    protected $_orderAmount;
    protected $soapClientFactory;

    protected $_productRepository;

    public function __construct(
    \Magento\Framework\Webapi\Soap\ClientFactory $soapClientFactory,
    \Magento\Sales\Model\Order $_orderAmount,
    \Magento\Store\Model\StoreManagerInterface $storeManager,
    \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
    \Magento\Customer\Model\Session $customerSession,
    \Magento\Sales\Model\Order\Address $order,
    \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
    \Magento\Checkout\Model\Session $checkoutSession,
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $pageFactory,
    \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
    \Magento\Framework\Json\EncoderInterface $encoder
    // \Magento\Catalog\Model\ProductRepository $productRepository
    ) {
        $this->soapClientFactory = $soapClientFactory;
        $this->_orderAmount = $_orderAmount;
        $this->_storeManager = $storeManager;
        $this->orderRepository = $orderRepository;
        $this->customerSession = $customerSession;
        $this->order = $order;
        $this->scopeConfig = $scopeConfig;
        $this->_checkoutSession = $checkoutSession;
        $this->_context = $context;
        $this->_pageFactory = $pageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_jsonEncoder = $encoder;
        // $this->_productRepository = $productRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = json_decode($_POST['u_data'], true);

        $order_id = $data['idorder'];
        $customer = $this->customerSession->getCustomer();
        $order = $this->orderRepository->get($order_id);
        $result = $this->resultJsonFactory->create();

        return $result->setData(['carajo']);

        $address = $order->getBillingAddress();
        $currency_system = $this->_storeManager->getStore()->getBaseCurrencyCode();  // OBTENER SIGLAS DE LA MONEDA CONFIGURADA EN LA TIENDA

        $resource = [
            'code' => $order_id,
            'expirationMonth' => $data['cc_month'],
            'expirationYear' => $data['cc_year'],
            'number' => $data['cc_card'],
            'id' => $this->getConfigData('merchan_cyber'),
            'key' => $this->getConfigData('key_cyber'),
            'secret' => $this->getConfigData('key_secret_cyber'),
            'customer' => $customer,
            'address' => $address,
            'total' => $data['totalsp'],
            'transactionId' => $data['transactionId'],
            'isTest' => $this->getConfigData('testmode'),
            'currency' => $currency_system,
        ];

        $orderInformationBillToArr = [
            'firstName' => $resource['customer']->getFirstname(),
            'lastName' => $resource['customer']->getLastname(),
            'address1' => $resource['address']->getData('street'),
            'locality' => $resource['address']->getData('street'),
            'administrativeArea' => $resource['address']->getData('street'),
            'postalCode' => '00000',
            'country' => 'BOL',
            'email' => $resource['customer']->getEmail(),
            'phoneNumber' => '+591'.$resource['address']->getTelephone(),
          ];

        if ($data['action'] == 'validate') {
            $authPayment = new Auth($resource);
            $resposeEnroller = $authPayment->AuthorizationWithPayerAuthValidation();
        }
    }

    public function UpdateStatus($idorder, $orstatus)
    {
        $orderId = $idorder;
        //@var \Magento\Sales\Api\Data\OrderInterface $order
        $order = $this->orderRepository->get($orderId);
        // $order->setState(\Magento\Sales\Model\Order::STATE_COMPLETE)->setStatus(\Magento\Sales\Model\Order::STATE_COMPLETE);
        $order->setState($orstatus)->setStatus($orstatus);
        $this->orderRepository->save($order);
    }

    public function getConfigData($config_path)
    {
        return $this->scopeConfig->getValue(
            'payment/linkser_creditcard/'.$config_path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}