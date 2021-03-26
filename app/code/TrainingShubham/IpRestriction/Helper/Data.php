<?php


namespace TrainingShubham\IpRestriction\Helper;


use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    protected $customerRepositoryInterface;

    public function __construct(Context $context, CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepositoryInterface = $customerRepository;
        parent::__construct($context);
    }

    public function getCustomerData()
    {
        $customerId = 2;
        $customer = $this->customerRepositoryInterface->getById($customerId);
        $customerAttributeData = $customer->__toArray();
        return $customerAttributeData;
    }

}