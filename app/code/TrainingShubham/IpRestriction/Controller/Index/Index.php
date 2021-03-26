<?php


namespace TrainingShubham\IpRestriction\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use TrainingShubham\IpRestriction\Helper\CustomerIp;
use TrainingShubham\IpRestriction\Helper\Data;


class Index extends Action
{
    protected $ipHelper;
    protected $dataHelper;

    public function __construct(Context $context, CustomerIp $ipHelper, Data $dataHelper)
    {
        $this->ipHelper = $ipHelper;
        $this->dataHelper = $dataHelper;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        echo "Hii <br> This is Visitor's Ip Address : ";
        $visitorIp = $this->ipHelper->getVisitorsIp();
        echo $visitorIp;
        $customerData = $this->dataHelper->getCustomerData();
        echo "<br>";
//        print_r($customerData);
        $customerIp = $customerData['custom_attributes']['customer_ip']['value'];
        echo $customerIp;
        if ($visitorIp == $customerIp)
        {
            echo "<br> Ip Matched";
        }
        else
        {
            echo "<br> Ip is not Matched";
        }

    }
}