<?php


namespace CustomModule\GridExample\Model;


use CustomModule\GridExample\Api\Data\CustomerInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel implements IdentityInterface, CustomerInterface
{
    /*
     * Cache tag
     */
    const CACHE_TAG = 'custommodule_gridexample_formexample';

    /*
     * Customer Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('CustomModule\GridExample\Model\ResourceModel\Customer');
    }

    public function getCustomerId()
    {
        return $this->getData(self::Customer_ID);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getGender()
    {
        return $this->getData(self::GENDER);
    }

    public function getDateOfBirth()
    {
        return $this->getData(self::DATEOFBIRTH);
    }

    public function getIntrestedCity()
    {
        return $this->getData(self::INTERESTEDCITY);
    }

    public function getBio()
    {
        return $this->getData(self::BIO);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATEDAT);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATEDAT);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function setDateOfBirth($dateOfBirth)
    {
        return $this->setData(self::DATEOFBIRTH, $dateOfBirth);
    }

    public function setGender($gender)
    {
        return $this->setData(self::GENDER, $gender);
    }

    public function setBio($bio)
    {
        return $this->setData(self::BIO, $bio);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATEDAT, $createdAt);
    }

    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATEDAT, $updatedAt);
    }

    public function setIntrestedCity($intrestedCity)
    {
        return $this->setData(self::INTERESTEDCITY, $intrestedCity);
    }

    public function setId($id)
    {
        return $this->setData(self::Customer_ID, $id);
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }
}