<?php


namespace TrainingShubham\IpRestriction\Helper;


use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

class CustomerIp extends AbstractHelper
{
    private $remoteAddress;

    public function __construct(Context $context, RemoteAddress $remoteAddress)
    {
        $this->remoteAddress = $remoteAddress;
        parent::__construct($context);
    }

    public function getVisitorsIp()
    {
        return $this->remoteAddress->getRemoteAddress();
    }

}