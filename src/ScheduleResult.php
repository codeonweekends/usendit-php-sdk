<?php

namespace CodeonWeekends\USendIt;

use CodeonWeekends\USendIt\Interfaces\ScheduleResultInterface;
use SimpleXMLElement;

class ScheduleResult implements ScheduleResultInterface
{
    protected $scheduleStatus;
    protected $scheduleMessage;
    protected $eventId;
    protected $importStatus;
    protected $partnerEventId;
    protected $totalScheduledSMS;
    protected $totalRecipients;
    protected $acceptedRecipients;
    protected $rejectedRecipients;
    protected $creditsSpent;
    protected $smsScheduledList;
    protected $msgId;
    protected $partnerMsgId;
    protected $msisdn;
    protected $scheduleMessageStatus;
    protected $numberSMS;

    public function __construct($response, $method)
    {
        switch ($method)
        {
            case 'SendMessage':
                $this->parseSendMessageResponse($response);
                break;
        }
    }

    protected function parseSendMessageResponse(string $response) : void
    {
        $xml = new SimpleXMLElement($response);
        $queryString = (string) $xml[0];
        parse_str($queryString, $result);

        foreach ($result as $k => $v) {
            $this->{'set' . $k}($v);
        }
    }

    /**
     * @return mixed
     */
    public function getScheduleStatus()
    {
        return $this->scheduleStatus;
    }

    /**
     * @param mixed $scheduleStatus
     */
    public function setScheduleStatus($scheduleStatus): void
    {
        $this->scheduleStatus = $scheduleStatus;
    }

    /**
     * @return mixed
     */
    public function getScheduleMessage()
    {
        return $this->scheduleMessage;
    }

    /**
     * @param mixed $scheduleMessage
     */
    public function setScheduleMessage($scheduleMessage): void
    {
        $this->scheduleMessage = $scheduleMessage;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @param mixed $eventId
     */
    public function setEventId($eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * @return mixed
     */
    public function getImportStatus()
    {
        return $this->importStatus;
    }

    /**
     * @param mixed $importStatus
     */
    public function setImportStatus($importStatus): void
    {
        $this->importStatus = $importStatus;
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
    public function getTotalScheduledSMS()
    {
        return $this->totalScheduledSMS;
    }

    /**
     * @param mixed $totalScheduledSMS
     */
    public function setTotalScheduledSMS($totalScheduledSMS): void
    {
        $this->totalScheduledSMS = $totalScheduledSMS;
    }

    /**
     * @return mixed
     */
    public function getTotalRecipients()
    {
        return $this->totalRecipients;
    }

    /**
     * @param mixed $totalRecipients
     */
    public function setTotalRecipients($totalRecipients): void
    {
        $this->totalRecipients = $totalRecipients;
    }

    /**
     * @return mixed
     */
    public function getAcceptedRecipients()
    {
        return $this->acceptedRecipients;
    }

    /**
     * @param mixed $acceptedRecipients
     */
    public function setAcceptedRecipients($acceptedRecipients): void
    {
        $this->acceptedRecipients = $acceptedRecipients;
    }

    /**
     * @return mixed
     */
    public function getRejectedRecipients()
    {
        return $this->rejectedRecipients;
    }

    /**
     * @param mixed $rejectedRecipients
     */
    public function setRejectedRecipients($rejectedRecipients): void
    {
        $this->rejectedRecipients = $rejectedRecipients;
    }

    /**
     * @return mixed
     */
    public function getCreditsSpent()
    {
        return $this->creditsSpent;
    }

    /**
     * @param mixed $creditsSpent
     */
    public function setCreditsSpent($creditsSpent): void
    {
        $this->creditsSpent = $creditsSpent;
    }

    /**
     * @return mixed
     */
    public function getSmsScheduledList()
    {
        return $this->smsScheduledList;
    }

    /**
     * @param mixed $smsScheduledList
     */
    public function setSmsScheduledList($smsScheduledList): void
    {
        $this->smsScheduledList = $smsScheduledList;
    }

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