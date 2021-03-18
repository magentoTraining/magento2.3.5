<?php


namespace TrainingShubham\IpRestriction\Observer;


use Magento\Framework\App\Http\Context;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerLoginObserver implements ObserverInterface
{

    private $contextHttp;

    function __construct(Context $contextHttp)
    {
        $this->contextHttp = $contextHttp;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $objctManager = \Magento\Framework\App\ObjectManager::getInstance();
        $remote = $objctManager->get('Magento\Framework\HTTP\PhpEnvironment\RemoteAddress');
        $ipAddress = $remote->getRemoteAddress();
        echo "<script>alert('$ipAddress');</script>";
    }
}