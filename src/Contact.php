<?php

namespace YllyDoListV8;

class Contact
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var array
     */
    private $fields;

    /**
     * @var array
     */
    private $interestsToAdd;

    /**
     * @var array
     */
    private $interestsToDelete;

    /**
     * @var int
     */
    private $optoutEmail;
    /**
     * @var int
     */
    private $optoutMobile;

    /**
     * @var int
     */
    private $memberId;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return array
     */
    public function getInterestsToAdd()
    {
        return $this->interestsToAdd;
    }

    /**
     * @param array $interestsToAdd
     */
    public function setInterestsToAdd($interestsToAdd)
    {
        $this->interestsToAdd = $interestsToAdd;
    }

    /**
     * @return array
     */
    public function getInterestsToDelete()
    {
        return $this->interestsToDelete;
    }

    /**
     * @param array $interestsToDelete
     */
    public function setInterestsToDelete($interestsToDelete)
    {
        $this->interestsToDelete = $interestsToDelete;
    }

    /**
     * @return int
     */
    public function getOptoutEmail()
    {
        return $this->optoutEmail;
    }

    /**
     * @param int $optoutEmail
     */
    public function setOptoutEmail($optoutEmail)
    {
        $this->optoutEmail = $optoutEmail;
    }

    /**
     * @return int
     */
    public function getOptoutMobile()
    {
        return $this->optoutMobile;
    }

    /**
     * @param int $optoutMobile
     */
    public function setOptoutMobile($optoutMobile)
    {
        $this->optoutMobile = $optoutMobile;
    }

    /**
     * @return int
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * @param int $memberId
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;
    }
}