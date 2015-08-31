<?php

namespace Foggyline\Paybox\Model;

class Paybox extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_PAYBOX_CODE = 'paybox';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_PAYBOX_CODE;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    public function getPayableTo()
    {
        //Data from system.xml fields
        return $this->getConfigData('payable_to');
    }

    /**
     * @return string
     */
    public function getMailingAddress()
    {
        //Data from system.xml fields
        return $this->getConfigData('mailing_address');
    }
}
