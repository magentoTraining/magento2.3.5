<?php


namespace CustomModule\News\Model\Allnews\Source;


use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    protected $allNews;

    public function __construct(\CustomModule\News\Model\Allnews $allNews)
    {
        $this->allNews = $allNews;
    }

    public function toOptionArray()
    {
        $availableOptions = $this->allNews->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value)
        {
            $options[] = [
                'label' => $value,
                'value' => $key
            ];
        }
        return $options;
    }
}