<?php

/**
 * Copyright � 2015 Inchoo d.o.o.
 * created by Zoran Salamun(zoran.salamun@inchoo.net).
 */

namespace Vexsoluciones\Linkser\Controller\Payment;

class Validate extends \Magento\Framework\App\Action\Action
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
    protected $_soap;

    protected $_commentFactory;

    public function __construct(
        \Magento\Framework\Webapi\Soap\ClientFactory $soapClientFactory,
        \Vexsoluciones\Linkser\Setup\UpgradeSchema $upgradeSchema,
        \Magento\Sales\Model\Order $_orderAmount,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Sales\Model\Order\Address $order,
        \Vexsoluciones\Linkser\Model\BrandFactory $brandFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Json\EncoderInterface $encoder
        // \Magento\Catalog\Model\ProductRepository $productRepository
    ) {
        $this->soapClientFactory = $soapClientFactory;
        $this->upgradeSchema = $upgradeSchema;
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

        $this->_commentFactory = $brandFactory;
        // $this->_productRepository = $productRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productRepository = $objectManager->get('Magento\Catalog\Model\ProductRepository');
        $country = 'Bolivia';
        $reference = $this->_checkoutSession->getLastRealOrder();
        $reference_code = $reference->getIncrementId();
        $order_id = $reference->getEntityId();
        $order = $this->orderRepository->get($order_id);
        $address = $order->getBillingAddress();

        $result = $this->resultJsonFactory->create();

        $data = json_decode($_POST['u_data'], true);
        $total = $data['totalsp'];
        $bin = new Bins();

        $quota = $this->_checkoutSession->getQuote();

        $currency_system = $this->_storeManager->getStore()->getBaseCurrencyCode();  // OBTENER SIGLAS DE LA MONEDA CONFIGURADA EN LA TIENDA
        // // $currency_system = 'BOB';  // OBTENER SIGLAS DE LA MONEDA CONFIGURADA EN LA TIENDA
        $numeric_code_currency = [
            'USD' => '840', //	Dolar estadounidense
            'BOB' => '068', //	BOLIVIANO
        ];

        $isLinkserBin = $bin->validate_bin_linkser($data['cc_bin']);
        $resource = [
            'code' => $order_id,
            'type' => $this->getCartType($data['cc_type']),
            'expirationMonth' => $data['cc_month'],
            'expirationYear' => $data['cc_year'],
            'number' => $data['cc_card'],
            'id' => $this->getConfigData('merchan_cyber'),
            'key' => $this->getConfigData('key_cyber'),
            'secret' => $this->getConfigData('key_secret_cyber'),
            'address' => $address,
            'total' => $total,
            'currency' => $currency_system,
            'isTest' => $this->getConfigData('testmode'),
        ];
        
        $OrderStatus = $order->getStatus();

        $model = $this->_commentFactory->create()->load($order_id, 'id_order');

        if (!$isLinkserBin) {
            // procesar con cybersource

            if (!$model->getId()) {
                $model = $this->_commentFactory->create();
                $model->setData('id_order', $order_id);
                $model->setData('status', 1);
                $model->setData('type', 1);
                $model->setData('code', 0);
                $model->setData('status_order', $OrderStatus);
            } else {
                $model->setData('status_order', $OrderStatus);
            }
            $model->save();

            if ($this->getConfigData('payment_auth')) {
                // validate paymentauth
                // $apiResponse = $authPayment->SetupCompletionWithCardNumber();

                if ($data['action'] == 'auth') {
                    $authPayment = new Auth($resource);
                    $resposeEnroller = $authPayment->EnrollWithPendingAuthentication($this->_storeManager->getStore()->getBaseUrl() . 'linkser/payment/capture');
                    $status = $resposeEnroller[0]->getStatus();

                    // TODO validar estado de la peticion
                    if ($status == 'PENDING_AUTHENTICATION') {
                        // $Orstatus = $this->getConfigData('order_status_cancelado');
                        // $this->UpdateStatus($order_id, $Orstatus);
                        $payment_data = [
                            'url' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getAcsUrl(),
                            'referenceID' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getAuthenticationTransactionId(),
                            'payload' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getPareq(),
                            'status' => 'auth_payment',
                        ];

                        return $result->setData($payment_data);
                    } elseif ($status == 'AUTHENTICATION_SUCCESSFUL') {
                        // procesar autorizacion con capture 3ds
                        // $authPayment = new Auth($resource);

                        $dat = [
                            'commerceIndicator' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getEcommerceIndicator(),
                            'veresEnrolled' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getVeresEnrolled(),
                            'ucafCollectionIndicator' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getUcafCollectionIndicator() != null ? $resposeEnroller[0]->getConsumerAuthenticationInformation()->getUcafCollectionIndicator() : '',
                            'directoryServerTransactionId' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getDirectoryServerTransactionId() != null ? $resposeEnroller[0]->getConsumerAuthenticationInformation()->getDirectoryServerTransactionId() : '',
                            'paSpecificationVersion' => $resposeEnroller[0]->getConsumerAuthenticationInformation()->getSpecificationVersion(),
                        ];

                        // return $result->setData($dat);

                        $payment = $authPayment->paymentAuthCapture3DS($dat);
                        if ($payment[1] == 201) {
                            if ($payment[0]->getStatus() == 'AUTHORIZED') {
                                $Orstatus = $this->getConfigData('order_status_aceptado');
                                $this->UpdateStatus($order_id, $Orstatus);
                                $payment_data = [
                                    'status' => 'success',
                                ];
                                $model->setData('status', 2)->setData('code', $payment[1])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                            } else {
                                $Orstatus = $this->getConfigData('order_status_cancelado');
                                $this->UpdateStatus($order_id, $Orstatus);
                                $payment_data = [
                                    'status' => 'failed',
                                    'message' => 'Error al procesar la verificación',
                                ];
                                $model->setData('status', 0)->setData('code', $payment[1])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                            }
                        } else {
                            $Orstatus = $this->getConfigData('order_status_cancelado');
                            $this->UpdateStatus($order_id, $Orstatus);
                            $payment_data = [
                                'status' => 'failed',
                                'message' => 'Error al procesar la verificación',
                            ];
                            $model->setData('status', 0)->setData('code', $payment[1])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                        }

                        return $result->setData($payment_data);
                    } elseif ($status == 'AUTHENTICATION_FAILED') {
                        $error_data = [
                            'status' => 'failed',
                            'message' => 'Error al procesar la verificación',
                        ];
                        $model->setData('status', 0)->setData('code', 00)->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();

                        return $result->setData($error_data);
                    }
                } elseif ($data['action'] == 'validate') {
                    $resource['transactionId'] = $data['transactionId'];
                    $authPayment = new Auth($resource);
                    $resposeValidateCapture = $authPayment->AuthorizationWithPayerAuthValidation();

                    if ($resposeValidateCapture[1] == 201) {
                        if ($resposeValidateCapture[0]->getStatus() == 'AUTHORIZED') {
                            $Orstatus = $this->getConfigData('order_status_aceptado');
                            $this->UpdateStatus($order_id, $Orstatus);
                            $capture_data = [
                                'status' => 'success',
                            ];
                            $model->setData('status', 2)->setData('code', $resposeValidateCapture[1])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                        } else {
                            $Orstatus = $this->getConfigData('order_status_cancelado');
                            $this->UpdateStatus($order_id, $Orstatus);
                            $capture_data = [
                                'status' => 'failed',
                                'message' => 'Error al procesar la verificación',
                            ];
                            $model->setData('status', 0)->setData('code', $resposeValidateCapture[1])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                        }
                    } else {
                        $capture_data = [
                            'status' => 'failed',
                            'message' => 'Error al procesar la verificación',
                        ];
                        $model->setData('status', 0)->setData('code', 00)->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                    }

                    return $result->setData($capture_data);
                }
            }

            $authPayment = new Auth($resource);
            $payment = $authPayment->paymentAuthCapture();
            if ($payment[1] == 201) {
                if ($payment[0]->getStatus() == 'AUTHORIZED') {
                    $Orstatus = $this->getConfigData('order_status_aceptado');
                    $this->UpdateStatus($order_id, $Orstatus);
                    $payment_data = [
                        'status' => 'success',
                    ];
                    $model->setData('status', 2)->setData('code', 00)->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                } else {
                    $Orstatus = $this->getConfigData('order_status_cancelado');
                    $this->UpdateStatus($order_id, $Orstatus);
                    $payment_data = [
                        'status' => 'failed',
                        'message' => 'Error al procesar la verificación',
                    ];
                    $model->setData('status', 0)->setData('code', 00)->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                }
            } else {
                $Orstatus = $this->getConfigData('order_status_cancelado');
                $this->UpdateStatus($order_id, $Orstatus);
                $payment_data = [
                    'status' => 'failed',
                    'message' => 'Error al procesar la verificación',
                ];
                $model->setData('status', 0)->setData('code', 00)->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
            }

            return $result->setData($payment_data);
        } else {
            // porcesar con linker

            if (!$model->getId()) {
                $model = $this->_commentFactory->create();
                $model->setData('id_order', $order_id);
                $model->setData('status', 1);
                $model->setData('type', 2);
                $model->setData('code', 0);
                $model->setData('status_order', $OrderStatus);
            } else {
                $model->setData('status_order', $OrderStatus);
            }
            $model->save();

            if ((bool) $this->getConfigData('testmode')) {
                $url = 'https://lnksrvssaup2.linkser.com.bo:9483/wsComercioEcomme/ServiciosEcommeLNK?wsdl';
            } else {
                $url = 'https://lnksrvws1.linkser.com.bo:9483/wsComercioEcomme/ServiciosEcommeLNK?wsdl';
            }

            if (array_key_exists($currency_system, $numeric_code_currency)) {
                //Verdadero si existe la moneda en el array
                $currency = $numeric_code_currency[$currency_system];
            } else {
                $currency = '840';
            }

            $_directoryList = $objectManager->get('\Magento\Framework\Filesystem\DirectoryList');
            $dirKeyLinkser = $_directoryList->getPath('media') . '/keys_linkser/public_linkser/publica.rsa';
            $dirKeyPublic = $_directoryList->getPath('media') . '/keys_linkser/public_store/publica.rsa';
            $dirKeyPrivate = $_directoryList->getPath('media') . '/keys_linkser/private_store/privada.rsa';
            $critografia = new Criptografia($dirKeyLinkser, $dirKeyPrivate, $dirKeyPublic);

            $code = $this->getConfigData('code_id');
            $secret = $this->getConfigData('secret_key');
            $termial = $this->getConfigData('terminal_id');
            $key = $this->getConfigData('key');

            $codInstitucionEncriptadoStr = $critografia->EncryptData($code);
            $llavePublicaStr = $critografia->getKeyPu();

            $llaveRegisroEncriptadoStr = $critografia->EncryptData($key);
            $SoapResult = $this->soapClientFactory->create($url, [
                'trace' => true,
                'keep_alive' => true,
                'connection_timeout' => 5000,
                'cache_wsdl' => WSDL_CACHE_NONE,
                'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
            ]);
            $reto = $SoapResult->getReto([]);

            $setKey = $SoapResult->setRegistrar(
                [
                    'cod_institucion' => $codInstitucionEncriptadoStr,
                    'llave_publica' => $llavePublicaStr,
                    'llave_registro' => $llaveRegisroEncriptadoStr,
                ]
            );

            if ($setKey instanceof SoapFault) {
                $Orstatus = $this->getConfigData('order_status_cancelado');

                $tum = ['status' => 'failed', 'message' => 'Error del Sistema.'];
                $model->setData('status', 0)->setData('code', 00)->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();

                return $result->setData($tum);
            }

            $numeroTarjetaEncriptadoStr = $critografia->EncryptData($data['cc_card']);
            $cvv2EncriptadoStr = $critografia->EncryptData($data['cc_vv']);

            $punto = number_format((float) $total, 2, '.', '');
            $amount_format = str_pad($punto, 13, '0', STR_PAD_LEFT);
            $amount = str_replace('.', '', $amount_format);

            $dataExpiry = trim($data['cc_year']) . trim(strlen($data['cc_month']) == 1 ? '0' . $data['cc_month'] : $data['cc_month']);
            $fechaExpiraEncriptadoStr = $critografia->EncryptData($dataExpiry);

            $order_id = str_pad($order_id, 6, '0', STR_PAD_LEFT);

            $secuencia = substr($order_id, 0, 6);
            $fecha = date('Ymd');
            $hora = date('His');
            $validation = $critografia->sing($code . $reto->return);

            $params_linkser = [
                'cod_institucion' => $codInstitucionEncriptadoStr,
                'secuencia' => $secuencia,
                'cod_comercio' => $secret,
                'cod_terminal' => $termial,
                'tarjeta' => $numeroTarjetaEncriptadoStr,
                'nombre_cliente' => $address->getData('firstname') . ' ' . $address->getData('lastname'),
                'fecha_expiracion' => $fechaExpiraEncriptadoStr,
                'cvv2' => $cvv2EncriptadoStr,
                'monto' => $amount,
                'moneda' => $currency,
                'fecha_envio' => $fecha,
                'hora_envio' => $hora,
                'reto' => $reto->return,
                'validacionDigital' => $validation,
                'llave_registro' => $llaveRegisroEncriptadoStr,
            ];
            try {
                $payme = $SoapResult->me_set_Autho_Ecomm($params_linkser);
                // return $result->setData($params_linkser);

                if (count($payme->return) < 6) {
                    $Orstatus = $this->getConfigData('order_status_cancelado');
                    $this->UpdateStatus($order_id, $Orstatus);
                    $dat = ['status' => 'failed', 'message' => $payme->return[1], $payme->return[2]];
                    $model->setData('status', 0)->setData('code', $payme->return[2])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                } elseif ($payme->return[2] == 0) {
                    // Success operation
                    $Orstatus = $this->getConfigData('order_status_aceptado');
                    $this->UpdateStatus($order_id, $Orstatus);
                    $dat = ['status' => 'success'];
                    $model->setData('status', 2)->setData('code', $payme->return[2])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                } elseif ($payme->return[2] == 8 || $payme->return[2] == 91 || $payme->return[2] == 92) {
                    $params = [
                        'cod_institucion' => $codInstitucionEncriptadoStr,
                        'secuencia' => $secuencia,
                        'fecha_transaccion' => $fecha,
                        'fecha_envio' => $fecha,
                        'hora_envio' => $hora,
                        'reto' => $reto->return,
                        'validacionDigital' => $validation,
                        'llave_registro' => $llaveRegisroEncriptadoStr,
                    ];

                    $SoapResult->me_set_Rever_Ecomm($params);
                    $Orstatus = $this->getConfigData('order_status_cancelado');
                    $this->UpdateStatus($order_id, $Orstatus);
                    $dat = ['status' => 'failed', 'message' => $payme->return[1], 'type' => $payme->return[2]];
                    $model->setData('status', 3)->setData('code', $payme->return[2])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                } else {
                    $Orstatus = $this->getConfigData('order_status_cancelado');
                    $this->UpdateStatus($order_id, $Orstatus);
                    $dat = ['status' => 'failed', 'message' => $payme->return[3], 'type' => $payme->return[2]];
                    $model->setData('status', 0)->setData('code', $payme->return[2])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();
                }

                return $result->setData($dat);
            } catch (\SoapFault $fault) {
                $tum = ['status' => 'failed', 'message' => $fault->faultstring, 'type' => 'soapFault'];
                $model->setData('status', 0)->setData('code', $payme->return[2])->setData('fecha', date('Y-m-d H:i:s'))->setData('status_order', $Orstatus)->save();

                return $result->setData($fault->faultstring);
            }
        }
    }

    public function getCartType($type)
    {
        if ($type == 'VI') {
            return 001;
        } elseif ($type == 'MC') {
            return 002;
        } elseif ($type == 'AE') {
            return 003;
        } elseif ($type == 'DN') {
            return 005;
        }
        //     case "discover" :
        //         return 004;
        //     break;
        //     case "maestro" :
        //         return 024;
        //     break;
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

    public function get_bin_card($bin)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://lookup.binlist.net/{$bin}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function getConfigData($config_path)
    {
        return $this->scopeConfig->getValue(
            'payment/linkser_creditcard/' . $config_path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
