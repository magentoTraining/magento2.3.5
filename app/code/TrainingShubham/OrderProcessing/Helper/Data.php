<?php


namespace TrainingShubham\OrderProcessing\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ORDERFEES_ORDERPROCESSING_ENABLE = 'orderfees/orderprocessing/active';
    const XML_PATH_ORDERFEES_ORDERPROCESSING_TITLE = 'orderfees/orderprocessing/title';
    const XML_PATH_ORDERFEES_ORDERPROCESSING_NAME = 'orderfees/orderprocessing/name';
    const XML_PATH_ORDERFEES_ORDERPROCESSING_APPLY_FEE = 'orderfees/orderprocessing/apply_fee';
    const XML_PATH_ORDERFEES_ORDERPROCESSING_ORDER_PROCESSING_FEE = 'orderfees/orderprocessing/order_processing_fee';

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * @param $config
     * @return mixed
     */
    public function getConfig($config)
    {
        return $this->scopeConfig->getValue($config, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get module status
     *
     * @return bool
     */
    public function isEnable()
    {
        return $this->getConfig(self::XML_PATH_ORDERFEES_ORDERPROCESSING_ENABLE);
    }

    /**
     * Get module Title
     * @return string
     */
    public function getTitle()
    {
        return $this->getConfig(self::XML_PATH_ORDERFEES_ORDERPROCESSING_TITLE);
    }

    /**
     * Get module Name
     * @return string
     */
    public function getName()
    {
        return $this->getConfig(self::XML_PATH_ORDERFEES_ORDERPROCESSING_NAME);
    }

    /**
     * Get Apply Fee
     * @return int
     */
    public function isFeeApply()
    {
        return $this->getConfig(self::XML_PATH_ORDERFEES_ORDERPROCESSING_APPLY_FEE);
    }

    /**
     * Get Order Processing Fee
     * @return string
     */
    public function getOrderProcessingFee()
    {
        return $this->getConfig(self::XML_PATH_ORDERFEES_ORDERPROCESSING_ORDER_PROCESSING_FEE);
    }
}