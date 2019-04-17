<?php

namespace YllyDoListV8;

class DolistV8
{
    // Connect to DoList
    const WSDL_CLIENT = "http://api.dolist.net/v2/AuthenticationService.svc?wsdl";
    const SOAP_CLIENT = "http://api.dolist.net/v2/AuthenticationService.svc/soap1.1";

    // Access at Segment Service
    const WSDL_SEG = "http://api.dolist.net/v2/SegmentService.svc?wsdl";
    const SOAP_SEG = "http://api.dolist.net/v2/SegmentService.svc/soap1.1";

    // Access at Contact Service
    const WSDL_CONTACT = "http://api.dolist.net/v2/ContactManagementService.svc?wsdl";
    const SOAP_CONTACT = "http://api.dolist.net/v2/ContactManagementService.svc/soap1.1";

    // Access at Campaign Service
    const WSDL_CAM = "http://api.dolist.net/v2/CampaignManagementService.svc?wsdl";
    const SOAP_CAM = "http://api.dolist.net/v2/CampaignManagementService.svc/soap1.1";

    private $accountId;
    private $authenticationKey;
    private $token;
    private $debug;

    public function __construct($accountId, $authenticationKey, $debug)
    {
        $this->accountId = $accountId;
        $this->authenticationKey = $authenticationKey;
        $this->debug = $debug;
    }

    // Part Connexion & Send //

    /**
     * @return array
     */
    public function connectDoListV8()
    {
        $soapClient = new \SoapClient(self::WSDL_CLIENT, array("trace" => 1, "location" => self::SOAP_CLIENT));

        $authenticationInfos = array("AuthenticationKey" => $this->authenticationKey, "AccountID" => $this->accountId);
        $authenticationRequest = array("authenticationRequest" => $authenticationInfos);

        $result = $soapClient->GetAuthenticationToken($authenticationRequest);

        $this->token = array(
            'AccountID' => $this->accountId,
            'Key' => $result->GetAuthenticationTokenResult->Key
        );

        return $this->token;
    }

    /**
     * @param string $wsdl
     * @param string $soap
     * @param string $function
     * @param array $options
     *
     * @return mixed
     * @throws \SoapFault
     */
    public function send($wsdl, $soap, $function, $options)
    {
        $soap = new \SoapClient($wsdl, array("trace" => 1, "location" => $soap));

        $result = call_user_func([$soap, $function], $options);

        return $result;

    }

    // Part Contact //

    /**
     * @param Contact $contact
     *
     * @throws \SoapFault
     */
    public function saveContact(Contact $contact)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "contact" => array(
                'Email' => $contact->getEmail(),
                'Fields' => $contact->getFields(),
                'InterestsToAdd' => $contact->getInterestsToAdd(),
                'InterestsToDelete' => $contact->getInterestsToDelete(),
                'OptoutEmail' => $contact->getOptoutEmail(),
                'OptoutMobile' => $contact->getOptoutMobile()
            )
        );

        $this->send(self::WSDL_CONTACT, self::SOAP_CONTACT, "SaveContact", $options);

    }

    /**
     * @param string $culture
     * @param boolean $interest
     * @param boolean $lastModifiedOnly
     * @param int $offset
     * @param string $email
     * @param int $memberId
     * @param array $returnFields
     *
     * @throws \SoapFault
     */
    public function getDetailsContact($culture, $offset, $email, $memberId, $returnFields)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "request" => array(
                "AllFields" => true,
                "Culture" => $culture,
                "Interest" => true,
                "LastModifiedOnly" => false,
                "Offset" => $offset,
                "RequestFilter" => array(
                    "Email" => $email,
                    "MemberID" => $memberId
                ),
                "ReturnFields" => $returnFields
            )
        );

        $this->send(self::WSDL_CONTACT, self::SOAP_CONTACT, "GetContact", $options);
    }

    // Part Segment //

    /**
     * @param Segment $segment
     *
     * @throws \SoapFault
     */
    public function createSegment(Segment $segment)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "request" => array(
                "Culture" => $segment->getCulture(),
                "UserEmail" => $segment->getUserEmail(),
                "SegmentName" => $segment->getSegmentName(),
                "RandomCount" => $segment->isRandomCount(),
                "RandomType" => $segment->getRandomType(),
                "RandomValue" => $segment->getRandomValue(),
                "Groups" => $segment->getGroups()
            )
        );

        $this->send(self::WSDL_SEG, self::SOAP_SEG, "CreateSegment", $options);
    }

    /**
     * @param array $emails
     *
     * @throws \SoapFault
     */
    public function createSegmentTest($emails)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "emails" => $emails
        );

        $this->send(self::WSDL_SEG, self::SOAP_SEG, "CreateSegmentTest", $options);
    }

    /**
     * @param Segment $segment
     *
     * @throws \SoapFault
     */
    public function deleteSegment(Segment $segment)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "request" => array(
                "Culture" => $segment->getCulture(),
                "UserEmail" => $segment->getUserEmail(),
                "SegmentID" => $segment->getSegmentId(),
                "checkIsUsedInRunningCampaigns" => true
            )
        );

        $this->send(self::WSDL_SEG, self::SOAP_SEG, "DeleteSegment", $options);
    }

    /**
     * @param Segment $segment
     *
     * @throws \SoapFault
     */
    public function getSegmentById(Segment $segment)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "request" => array(
                "Culture" => $segment->getCulture(),
                "UserEmail" => $segment->getUserEmail(),
                "SegmentID" => $segment->getSegmentId(),
            )
        );

        $this->send(self::WSDL_SEG, self::SOAP_SEG, "GetSegmentById", $options);
    }

    /**
     * @throws \SoapFault
     */
    public function getAllSegments()
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $this->send(self::WSDL_SEG, self::SOAP_SEG, "GetAllSegments", array("token" => $this->token));
    }

    // Part Campaign //


    /**
     * @param Campaign $campaign
     *
     * @throws \SoapFault
     */
    public function createCampaign(Campaign $campaign)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "campaignEmail" => array(
                "Culture" => $campaign->getCulture(),
                "FormatLinkTechnical" => $campaign->getFormatLinkTechnical(),
                "FromAddressPrefix" => $campaign->getFromAddressPrefix(),
                "FromName" => $campaign->getFromName(),
                "GoogleAnalyticsTracking" => array(
                    "GoogleProfileID" => $campaign->getGoogleProfileId(),
                    "GoogleVariableList" => array(
                        "ID" => $campaign->getGoogleVariableId(),
                        "Value" => $campaign->getGoogleVariableValue()
                    )
                ),
                "ID" => $campaign->getCampaignId(),
                "Message" => array(
                    "ContentHtml" => $campaign->getContentHtml(),
                    "ContentText" => $campaign->getContentText(),
                    "Encoding" => $campaign->getEncoding(),
                    "Id" => $campaign->getMessageEmailId(),
                    "MessageType" => $campaign->getMessageType(),
                    "Name" => $campaign->getNameMessageEmail()
                ),
                "PrepaidSendingMode" => $campaign->getPrepaidSendingMode(),
                "ReplyAddress" => $campaign->getReplyAddress(),
                "ReplyName" => $campaign->getReplyName(),
                "Subject" => $campaign->getSubject(),
                "TrackingDomain" => $campaign->getTrackingDomain(),
                "UnsubscribeFormId" => $campaign->getUnsubscribeFormId(),
                "VersionOnline" => $campaign->isVersionOnline()
            )
        );

        $this->send(self::WSDL_CAM, self::SOAP_CAM, "CreateCampaign", $options);
    }

    /**
     * @param Campaign $campaign
     * @param Segment $segment
     *
     * @throws \SoapFault
     */
    public function sendCampaignTest(Campaign $campaign, Segment $segment)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "campaignId" => $campaign->getCampaignId(),
            "segmentId" => $segment->getSegmentId()
        );

        $this->send(self::WSDL_CAM, self::SOAP_CAM, "SendCampaignTest", $options);
    }

    /**
     * @param Campaign $campaign
     * @param Segment $segment
     * @param $planning
     * @param $period
     * @param $volume
     *
     * @throws \SoapFault
     */
    public function sendCampaign(Campaign $campaign, Segment $segment, $planning, $period, $volume)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "campaignId" => $campaign->getCampaignId(),
            "segmentId" => $segment->getSegmentId(),
            "planning" => array(
                "SendDate" => $planning
            ),
            "frequency" => array(
                "Period" => $period,
                "Volume" =>$volume
            )
        );

        $this->send(self::WSDL_CAM, self::SOAP_CAM, "SendCampaign", $options);
    }

    /**
     * @param Campaign $campaign
     *
     * @throws \SoapFault
     */
    public function cancelCampaign(Campaign $campaign)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "campaignId" => $campaign->getCampaignId()
        );

        $this->send(self::WSDL_CAM, self::SOAP_CAM, "CancelCampaign", $options);
    }

    /**
     * @param $date
     * @param $last
     * @param $offset
     *
     * @throws \SoapFault
     */
    public function getCampaignsById($date, $last, $offset)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "request" => array(
                "filter" => array(
                    "AllCampaigns" => false,
                    "Date" => $date,
                    "LastCampaigns" => $last,
                    "Offset" => $offset
                )
            )
        );

        $this->send(self::WSDL_CAM, self::SOAP_CAM, "GetCampaignsID", $options);
    }

    /**
     * @param $date
     * @param $last
     * @param $offset
     *
     * @throws \SoapFault
     */
    public function getAllCampaigns($date, $last, $offset)
    {
        if ($this->token === null) {
            $this->connectDoListV8();
        }

        $options = array(
            "token" => $this->token,
            "request" => array(
                "filter" => array(
                    "AllCampaigns" => 1,
                    "Date" => $date,
                    "LastCampaigns" => $last,
                    "Offset" => $offset
                )
            )
        );

        $this->send(self::WSDL_CAM, self::SOAP_CAM, "GetCampaigns", $options);
    }
}