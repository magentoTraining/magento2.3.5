<?php


namespace TrainingShubham\SampleModule\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use TrainingShubham\SampleModule\Helper\Data\Data;


class Index extends Action
{

    protected $helper;

    public function __construct(Context $context, Data $helper)
    {
        parent::__construct($context);
        $this->helper = $helper;
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
        echo "Hii <br>";
        $productCollection = $this->helper->getProductCollection();
        foreach ($productCollection as $product)
        {
            $data =$product->getData();
            print_r($data);
            echo "<br>";
        }
    }
}