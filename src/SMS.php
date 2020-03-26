<?php

namespace CodeonWeekends\USendIt;

use CodeonWeekends\USendIt\Interfaces\SMSInterface;

class SMS implements SMSInterface
{
    /**
     * @var string
     */
    protected string $partnerEventId;

    /**
     * @var string
     */
    protected string $timezone;

    /**
     * @var string
     */
    protected string $partnerMsgId;

    /**
     * @var string
     */
    protected string $sender;

    /**
     * @var string
     */
    protected string $msisdn;

    /**
     * @var string
     */
    protected string $mobileOperator;

    /**
     * @var string
     */
    protected string $expirationDatetime;

    /**
     * @var int
     */
    protected int $priority;

    /**
     * @var string
     */
    protected string $messageText;

    /**
     * @var string
     */
    protected string $scheduleDatetime;

    /**
     * @var string
     */
    protected string $beginTime;

    /**
     * @var string
     */
    protected string $endTime;

    /**
     * @var string
     */
    protected string $workingDays;

    /**
     * @var string
     */
    protected string $isFlash;

    /**
     * SMS constructor.
     * @param string $msisdn
     * @param string $mobileOperator
     * @param string $messageText
     * @param string $partnerEventId
     * @param string $timezone
     * @param string $partnerMsgId
     * @param string $sender
     * @param string $expirationDatetime
     * @param int $priority
     * @param string $scheduleDatetime
     * @param string $beginTime
     * @param string $endTime
     * @param string $workingDays
     * @param string $isFlash
     */
    public function __construct(
        $msisdn = '',
        $mobileOperator = '',
        $messageText = '',
        $partnerEventId = '',
        $timezone = '',
        $partnerMsgId = '',
        $sender = '',
        $expirationDatetime = '',
        $priority = 0,
        $scheduleDatetime = '',
        $beginTime = '',
        $endTime = '',
        $workingDays = 'false',
        $isFlash = 'false'
    )
    {
        $this->partnerEventId = $partnerEventId;
        $this->timezone = $timezone;
        $this->partnerMsgId = $partnerMsgId;
        $this->sender = $sender;
        $this->msisdn = $msisdn;
        $this->mobileOperator = $mobileOperator;
        $this->expirationDatetime = $expirationDatetime;
        $this->priority = $priority;
        $this->messageText = $messageText;
        $this->scheduleDatetime = $scheduleDatetime;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->workingDays = $workingDays;
        $this->isFlash = $isFlash;
    }

    /**
     * @return mixed
     */
    public function getPartnerEventId()
    {
        return $this->partnerEventId;
    }

    /**
     * @param mixed $partnerEventId
     */
    public function setPartnerEventId($partnerEventId): void
    {
        $this->partnerEventId = $partnerEventId;
    }

    /**
     * @return mixed
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param mixed $timezone
     */
    public function setTimezone($timezone): void
    {
        $this->timezone = $timezone;
    }


    /**
     * @return mixed
     */
    public function getPartnerMsgId()
    {
        return $this->partnerMsgId;
    }

    /**
     * @param mixed $partnerMsgId
     */
    public function setPartnerMsgId($partnerMsgId): void
    {
        $this->partnerMsgId = $partnerMsgId;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     */
    public function setSender($sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return mixed
     */
    public function getMsisdn()
    {
        return $this->msisdn;
    }

    /**
     * @param mixed $msisdn
     */
    public function setMsisdn($msisdn): void
    {
        $this->msisdn = $msisdn;
    }

    /**
     * @return mixed
     */
    public function getMobileOperator()
    {
        return $this->mobileOperator;
    }

    /**
     * @param mixed $mobileOperator
     */
    public function setMobileOperator($mobileOperator): void
    {
        $this->mobileOperator = $mobileOperator;
    }

    /**
     * @return mixed
     */
    public function getExpirationDatetime()
    {
        return $this->expirationDatetime;
    }

    /**
     * @param mixed $expirationDatetime
     */
    public function setExpirationDatetime($expirationDatetime): void
    {
        $this->expirationDatetime = $expirationDatetime;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @param mixed $messageText
     */
    public function setMessageText($messageText): void
    {
        $this->messageText = $messageText;
    }

    /**
     * @return mixed
     */
    public function getScheduleDatetime()
    {
        return $this->scheduleDatetime;
    }

    /**
     * @param mixed $scheduleDatetime
     */
    public function setScheduleDatetime($scheduleDatetime): void
    {
        $this->scheduleDatetime = $scheduleDatetime;
    }

    /**
     * @return mixed
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * @param mixed $beginTime
     */
    public function setBeginTime($beginTime): void
    {
        $this->beginTime = $beginTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getWorkingDays()
    {
        return $this->workingDays;
    }

    /**
     * @param mixed $workingDays
     */
    public function setWorkingDays($workingDays): void
    {
        $this->workingDays = $workingDays;
    }

    /**
     * @return mixed
     */
    public function getIsFlash()
    {
        return $this->isFlash;
    }

    /**
     * @param mixed $isFlash
     */
    public function setIsFlash($isFlash): void
    {
        $this->isFlash = $isFlash;
    }
}