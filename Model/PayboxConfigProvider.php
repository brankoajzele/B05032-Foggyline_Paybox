<?php

namespace Foggyline\Paybox\Model;

class PayboxConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{
    /**
     * @var string[]
     */
    protected $methodCode = \Foggyline\Paybox\Model\Paybox::PAYMENT_METHOD_PAYBOX_CODE;

    /**
     * @var \Foggyline\Paybox\Model\Paybox
     */
    protected $method;

    /**
     * @var \Magento\Framework\Escaper
     */
    protected $escaper;

    /**
     * @param \Magento\Payment\Helper\Data $paymentHelper
     * @param \Magento\Framework\Escaper $escaper
     */
    public function __construct(
        \Magento\Payment\Helper\Data $paymentHelper,
        \Magento\Framework\Escaper $escaper
    ) {
        $this->escaper = $escaper;
        $this->method = $paymentHelper->getMethodInstance($this->methodCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return $this->method->isAvailable() ? [
            'payment' => [
                'paybox' => [
                    'mailingAddress' => $this->getMailingAddress(),
                    'payableTo' => $this->getPayableTo(),
                ],
            ],
        ] : [];
    }

    /**
     * Get mailing address from config
     *
     * @return string
     */
    protected function getMailingAddress()
    {
        return nl2br($this->escaper->escapeHtml($this->method->getMailingAddress()));
    }

    /**
     * Get payable to from config
     *
     * @return string
     */
    protected function getPayableTo()
    {
        return $this->method->getPayableTo();
    }
}
