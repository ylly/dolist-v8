<?php

namespace YllyDoListV8\Traits;

trait MessageEmailTrait
{
    /**
     * @var string
     */
    private $contentHtml;

    /**
     * @var string
     */
    private $contentText;

    /**
     * @var string
     */
    private $encoding;

    /**
     * @var int
     */
    private $messageEmailId;

    /**
     * @var string
     */
    private $messageType;

    /**
     * @var string
     */
    private $nameMessageEmail;

    /**
     * @return string
     */
    public function getContentHtml()
    {
        return $this->contentHtml;
    }

    /**
     * @param string $contentHtml
     */
    public function setContentHtml($contentHtml)
    {
        $this->contentHtml = $contentHtml;
    }

    /**
     * @return string
     */
    public function getContentText()
    {
        return $this->contentText;
    }

    /**
     * @param string $contentText
     */
    public function setContentText($contentText)
    {
        $this->contentText = $contentText;
    }

    /**
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * @return int
     */
    public function getMessageEmailId()
    {
        return $this->messageEmailId;
    }

    /**
     * @param int $messageEmailId
     */
    public function setMessageEmailId($messageEmailId)
    {
        $this->messageEmailId = $messageEmailId;
    }

    /**
     * @return string
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * @param string $messageType
     */
    public function setMessageType($messageType)
    {
        $this->messageType = $messageType;
    }

    /**
     * @return string
     */
    public function getNameMessageEmail()
    {
        return $this->nameMessageEmail;
    }

    /**
     * @param string $nameMessageEmail
     */
    public function setNameMessageEmail($nameMessageEmail)
    {
        $this->nameMessageEmail = $nameMessageEmail;
    }
}