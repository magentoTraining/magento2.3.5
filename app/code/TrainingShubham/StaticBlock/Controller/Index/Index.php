<?php

namespace TrainingShubham\StaticBlock\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

/**
 * This is used to load view
 */
class Index extends \Magento\Framework\App\Action\Action
{

	protected $_resultPageFactory;

	function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
	{
		$this->_resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}