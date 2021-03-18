<?php


namespace TrainingShubham\CustomerAttribute\Helper;




use TrainingShubham\CustomerAttribute\Api\CustomerMetadataInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use TrainingShubham\CustomerAttribute\Api\Data\CustomerParentInterface;

class Data extends AbstractHelper
{
    const XML_PATH_TRAININGSHUBHAM_CUSTOMERATTRIBUTE_FATHER_ENABLE = 'customer/additional_information/father_name';
    const XML_PATH_TRAININGSHUBHAM_CUSTOMERATTRIBUTE_MOTHER_ENABLE = 'customer/additional_information/mother_name';


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
        return $this->scopeConfig->getValue($config, ScopeInterface::SCOPE_STORES);
    }

    /**
     * Get Father Name status
     *
     * @return bool
     */
    public function isFatherNameEnable()
    {
        return $this->getConfig(self::XML_PATH_TRAININGSHUBHAM_CUSTOMERATTRIBUTE_FATHER_ENABLE);
    }

    /**
     * Get Mother Name status
     *
     * @return bool
     */
    public function isMotherNameEnable()
    {
        return $this->getConfig(self::XML_PATH_TRAININGSHUBHAM_CUSTOMERATTRIBUTE_MOTHER_ENABLE);
    }





}