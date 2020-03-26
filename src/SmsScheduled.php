<?php

namespace CodeonWeekends\USendIt;

use CodeonWeekends\USendIt\Interfaces\SmsScheduledInterface;

class SmsScheduled implements SmsScheduledInterface
{
    /**
     * @var
     */
    protected $msgId;
    /**
     * @var
     */
    protected $msgGuid;
    /**
     * @var
     */
    protected $msisdn;
    /**
     * @var
     */
    protected $scheduleMessageStatus;
    /**
     * @var
     */
    protected $partnerMsgId;
    /**
     * @var
     */
    protected $numberSMS;

    /**
     * @return mixed
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * @param mixed $msgId
     */
    public function setMsgId($msgId): void
    {
        $this->msgId = $msgId;
    }

    /**
     * @return mixed
     */
    public function getMsgGuid()
    {
        return $this->msgGuid;
    }

    /**
     * @param mixed $msgGuid
     */
    public function setMsgGuid($msgGuid): void
    {
        $this->msgGuid = $msgGuid;
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
    public function getScheduleMessageStatus()
    {
        return $this->scheduleMessageStatus;
    }

    /**
     * @param mixed $scheduleMessageStatus
     */
    public function setScheduleMessageStatus($scheduleMessageStatus): void
    {
        $this->scheduleMessageStatus = $scheduleMessageStatus;
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
    public function getNumberSMS()
    {
        return $this->numberSMS;
    }

    /**
     * @param mixed $numberSMS
     */
    public function setNumberSMS($numberSMS): void
    {
        $this->numberSMS = $numberSMS;
    }
}