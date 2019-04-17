<?php

namespace YllyDoListV8\Traits;

trait GoogleVariableTrait
{
    /**
     * @var int
     */
    private $googleVariableId;

    /**
     * @var string
     */
    private $googleVariableValue;

    /**
     * @return int
     */
    public function getGoogleVariableId()
    {
        return $this->googleVariableId;
    }

    /**
     * @param int $googleVariableId
     */
    public function setGoogleVariableId($googleVariableId)
    {
        $this->googleVariableId = $googleVariableId;
    }

    /**
     * @return string
     */
    public function getGoogleVariableValue()
    {
        return $this->googleVariableValue;
    }

    /**
     * @param string $googleVariableValue
     */
    public function setGoogleVariableValue($googleVariableValue)
    {
        $this->googleVariableValue = $googleVariableValue;
    }
}