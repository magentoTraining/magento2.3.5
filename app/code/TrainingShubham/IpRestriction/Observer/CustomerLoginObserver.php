<?php


namespace TrainingShubham\IpRestriction\Observer;


use Magento\Framework\App\Response\Http;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\UrlFactory;
use TrainingShubham\IpRestriction\Helper\CustomerIp;
use TrainingShubham\IpRestriction\Helper\Data;

class CustomerLoginObserver implements ObserverInterface
{
    protected $ipHelper;
    protected $dataHelper;
    protected $urlFactory;
    protected $response;
    protected $messageManager;

    public function __construct(CustomerIp $ipHelper, Data $dataHelper, Http $response, ManagerInterface $messageManager, UrlFactory $urlFactory)
    {
        $this->ipHelper = $ipHelper;
        $this->dataHelper = $dataHelper;
        $this->response = $response;
        $this->messageManager = $messageManager;
        $this->urlFactory = $urlFactory;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $event = $observer->getEvent()->getRequest();
        $visitorIp = $this->ipHelper->getVisitorsIp();
        $customerData = $this->dataHelper->getCustomerData();
        $customerIp = $customerData['custom_attributes']['customer_ip']['value'];
        if ($visitorIp == $customerIp)
        {
            $this->response->setRedirect($this->urlFactory->create()->getUrl('customer/account/login'));
            $this->messageManager->addErrorMessage(__("You have Not Allowed to login to access this site"));
            exit();
        }
        else
        {
            $this->messageManager->addSuccessMessage(__("You are allow to login."));
        }
    }
}