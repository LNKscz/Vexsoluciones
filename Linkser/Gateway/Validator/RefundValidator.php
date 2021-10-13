<?php

namespace Vexsoluciones\Linkser\Gateway\Validator;

// use Vexsoluciones\Linkser\Helper\ConfigHelper;
// use Vexsoluciones\Linkser\Helper\PaymentHelper;
use Magento\Framework\HTTP\Header;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Payment\Gateway\Validator\ResultInterface;
use Magento\Payment\Gateway\Validator\ResultInterfaceFactory;

class RefundValidator extends AbstractValidator
{
    /**
     * @var ConfigHelper
     */
    private $config;

    /**
     * @var Header
     */
    private $httpHeader;

    /**
     * @var RemoteAddress
     */
    private $remoteAddress;

    /**
     * @var PaymentHelper
     */
    private $paymentHelper;

    /**
     * ResponseValidator constructor.
     */
    public function __construct(
        ResultInterfaceFactory $resultFactory,
        RemoteAddress $remoteAddress,
        // ConfigHelper $config,
        Header $httpHeader
        // PaymentHelper $paymentHelper
    ) {
        parent::__construct($resultFactory);
        $this->httpHeader = $httpHeader;
        // $this->paymentHelper = $paymentHelper;
        // $this->config = $config;
        $this->remoteAddress = $remoteAddress;
    }

    /**
     * Performs domain-related validation for business object.
     *
     * @return ResultInterface
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function validate(array $subject)
    {
        // $checkIp = function () {
        //     $whitelist = $this->config->getlinkserWhiteListIps();
        //     $remoteAddress = $this->remoteAddress->getRemoteAddress();
        //     $agent = $this->httpHeader->getHttpUserAgent(true);
        //     $result = !($whitelist && !in_array($remoteAddress, $whitelist));
        //     return [
        //         $result,
        //         "Malicious client ($agent) from ($remoteAddress)"
        //     ];
        // };

        $statements = [$checkIp];
        /** @var \Closure $statement */
        foreach ($statements as $statement) {
            $result = $statement();
            if (!array_shift($result)) {
                return $this->createResult(false, [__(array_shift($result))]);
            }
        }

        return $this->createResult(true);
    }
}