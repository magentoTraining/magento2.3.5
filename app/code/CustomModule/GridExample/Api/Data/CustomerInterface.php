<?php


namespace CustomModule\GridExample\Api\Data;


interface CustomerInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const Customer_ID = 'id';
    const NAME = 'name';
    const GENDER = 'gender';
    const DATEOFBIRTH = 'dateOfBirth';
    const INTERESTEDCITY = 'interestedCity';
    const BIO = 'bio';
    const CREATEDAT = 'createdAt';
    const UPDATEDAT = 'updatedAt';

    /*
     * Get Customer's Id
     * @return integer
     */
    public function getCustomerId();

    /*
     * Get Customer's Name
     * @return string|null
     */
    public function getName();

    /*
     * Get Customer's Gender
     * @return string
     */
    public function getGender();

    /*
     * Get Customer's Date Of Birth
     * @return string
     */
    public function getDateOfBirth();

    /*
     * Get Customer's Intrested City for Shoping
     * @return string
     */
    public function getIntrestedCity();

    /*
     * Get Customer's Bio
     * @return string|null
     */
    public function getBio();

    /*
     * Get Customer Created Date
     * @return string
     */
    public function getCreatedAt();

    /*
     * Get Customer Updated Date
     * @return string
     */
    public function getUpdatedAt();


    /*
     * Set Customer's Id
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /*
     * Set Customer's Name
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /*
     * Set Customer's Date Of Birth
     * @param string $dateOfBirth
     * @return $this
     */
    public function setDateOfBirth($dateOfBirth);

    /*
     * Set Customer's Gender
     * @param string $gender
     * @return $this
     */
    public function setGender($gender);

    /*
     * Set Customer's Bio
     * @param string $bio
     * @return $this
     */
    public function setBio($bio);

    /*
     * Set Customer Created Date
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /*
     * Set Customer Updated Date
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /*
     * Set Customer's Intrested City for Shoping
     * @param string $intrestedCity
     * @return $this
     */
    public function setIntrestedCity($intrestedCity);


}