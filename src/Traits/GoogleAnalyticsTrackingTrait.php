<?php


namespace YllyDoListV8\Traits;


trait GoogleAnalyticsTrackingTrait
{
    use GoogleVariableTrait;

    /**
     * @var int
     */
    private $googleProfileId;

    /**
     * @return int
     */
    public function getGoogleProfileId()
    {
        return $this->googleProfileId;
    }

    /**
     * @param int $googleProfileId
     */
    public function setGoogleProfileId($googleProfileId)
    {
        $this->googleProfileId = $googleProfileId;
    }
}