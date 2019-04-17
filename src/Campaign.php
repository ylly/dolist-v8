<?php

namespace YllyDoListV8;

use YllyDoListV8\Traits\GoogleAnalyticsTrackingTrait;
use YllyDoListV8\Traits\MessageEmailTrait;

class Campaign
{

    use MessageEmailTrait, GoogleAnalyticsTrackingTrait;

    /**
     * @var string
     */
    private $culture;

    /**
     * Require
     *
     * @var string
     */
    private $formatLinkTechnical;

    /**
     * @var string
     */
    private $fromAddressPrefix;

    /**
     * @var string
     */
    private $fromName;

    /**
     * Require
     *
     * @var int
     */
    private $campaignId;

    /**
     * Require
     *
     * @var string
     */
    private $prepaidSendingMode;

    /**
     * @var string
     */
    private $replyAddress;

    /**
     * @var string
     */
    private $replyName;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $trackingDomain;

    /**
     * Require
     *
     * @var int
     */
    private $unsubscribeFormId;

    /**
     * Require
     *
     * @var boolean
     */
    private $versionOnline;

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
    public function getFormatLinkTechnical()
    {
        return $this->formatLinkTechnical;
    }

    /**
     * @param string $formatLinkTechnical
     */
    public function setFormatLinkTechnical($formatLinkTechnical)
    {
        $this->formatLinkTechnical = $formatLinkTechnical;
    }

    /**
     * @return string
     */
    public function getFromAddressPrefix()
    {
        return $this->fromAddressPrefix;
    }

    /**
     * @param string $fromAddressPrefix
     */
    public function setFromAddressPrefix($fromAddressPrefix)
    {
        $this->fromAddressPrefix = $fromAddressPrefix;
    }

    /**
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param int $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }

    /**
     * @return string
     */
    public function getPrepaidSendingMode()
    {
        return $this->prepaidSendingMode;
    }

    /**
     * @param string $prepaidSendingMode
     */
    public function setPrepaidSendingMode($prepaidSendingMode)
    {
        $this->prepaidSendingMode = $prepaidSendingMode;
    }

    /**
     * @return string
     */
    public function getReplyAddress()
    {
        return $this->replyAddress;
    }

    /**
     * @param string $replyAddress
     */
    public function setReplyAddress($replyAddress)
    {
        $this->replyAddress = $replyAddress;
    }

    /**
     * @return string
     */
    public function getReplyName()
    {
        return $this->replyName;
    }

    /**
     * @param string $replyName
     */
    public function setReplyName($replyName)
    {
        $this->replyName = $replyName;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getTrackingDomain()
    {
        return $this->trackingDomain;
    }

    /**
     * @param string $trackingDomain
     */
    public function setTrackingDomain($trackingDomain)
    {
        $this->trackingDomain = $trackingDomain;
    }

    /**
     * @return int
     */
    public function getUnsubscribeFormId()
    {
        return $this->unsubscribeFormId;
    }

    /**
     * @param int $unsubscribeFormId
     */
    public function setUnsubscribeFormId($unsubscribeFormId)
    {
        $this->unsubscribeFormId = $unsubscribeFormId;
    }

    /**
     * @return bool
     */
    public function isVersionOnline()
    {
        return $this->versionOnline;
    }

    /**
     * @param bool $versionOnline
     */
    public function setVersionOnline($versionOnline)
    {
        $this->versionOnline = $versionOnline;
    }
}