<?php

namespace YllyDoListV8;

class Segment
{
    /**
     * @var string
     */
    private $culture;

    /**
     * @var string
     */
    private $userEmail;

    /**
     * @var string
     */
    private $segmentName;

    /**
     * @var boolean
     */
    private $randomCount;

    /**
     * @var int
     */
    private $randomType;

    /**
     * @var int
     */
    private $randomValue;

    /**
     * @var array
     */
    private $groups;

    /**
     * @var int
     */
    private $segmentId;

    /**
     * @return string
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * @param string $culture
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;
    }

    /**
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return string
     */
    public function getSegmentName()
    {
        return $this->segmentName;
    }

    /**
     * @param string $segmentName
     */
    public function setSegmentName($segmentName)
    {
        $this->segmentName = $segmentName;
    }

    /**
     * @return bool
     */
    public function isRandomCount()
    {
        return $this->randomCount;
    }

    /**
     * @param bool $randomCount
     */
    public function setRandomCount($randomCount)
    {
        $this->randomCount = $randomCount;
    }

    /**
     * @return mixed
     */
    public function getRandomType()
    {
        return $this->randomType;
    }

    /**
     * @param mixed $randomType
     */
    public function setRandomType($randomType)
    {
        $this->randomType = $randomType;
    }

    /**
     * @return int
     */
    public function getRandomValue()
    {
        return $this->randomValue;
    }

    /**
     * @param int $randomValue
     */
    public function setRandomValue($randomValue)
    {
        $this->randomValue = $randomValue;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return int
     */
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * @param int $segmentId
     */
    public function setSegmentId($segmentId)
    {
        $this->segmentId = $segmentId;
    }
}