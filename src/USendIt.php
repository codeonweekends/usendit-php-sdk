<?php

namespace CodeonWeekends\USendIt;

use CodeonWeekends\USendIt\Interfaces\USendItInterface;
use GuzzleHttp\Client as HttpClient;

class USendIt implements USendItInterface
{
    /**
     * @var HttpClient $httpClient
     */
    protected HttpClient $httpClient;

    /**
     * @var string $url
     */
    protected string $url = 'https://api.usendit.co.mz/v2/remoteusendit.asmx';

    /**
     * @var string $username
     */
    protected string $username = '';

    /**
     * @var string $password
     */
    protected string $password = '';

    /**
     * @var SMS
     */
    private SMS $sms;

    /**
     * @var bool
     */
    private bool $async;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * @param SMS $sms
     * @param bool $async
     * @return ScheduleResult
     * @throws \Exception
     */
    public function sendMessage(SMS $sms = null, $async = false) : ScheduleResult
    {
        $this->validateCredentials();
        $this->validateSMS($sms);

        $url = $this->url . '/SendMessage';

        $data = [
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'partnerEventId' => $sms->getPartnerEventId(),
            'timezone' => $sms->getTimezone(),
            'partnerMsgId' => $sms->getPartnerMsgId(),
            'sender' => $sms->getSender(),
            'msisdn' => $sms->getMsisdn(),
            'mobileOperator' => $sms->getMobileOperator(),
            'priority' => $sms->getPriority(),
            'expirationDatetime' => $sms->getExpirationDatetime(),
            'messageText' => $sms->getMessageText(),
            'scheduleDatetime' => $sms->getScheduleDatetime(),
            'beginTime' => $sms->getBeginTime(),
            'endTime' => $sms->getEndTime(),
            'workingDays' => $sms->getWorkingDays(),
            'isFlash' => $sms->getIsFlash()
        ];
        $response = null;

        try {
            $client = $this->httpClient;

            if (!$async) {
                $response = $client->request('GET', $url, [
                    'query' => $data
                ]);
            } else {
                $response = $client->requestAsync('GET', $url, [
                    'query' => $data
                ]);
            }

            return new ScheduleResult($response->getBody()->getContents(), 'SendMessage');
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function isAsync(bool $value = true): void
    {
        $this->async = $value;
    }

    /**
     * @inheritDoc
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @inheritDoc
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @throws \Exception
     */
    private function validateCredentials()
    {
        if (!$this->getUsername() || !$this->getPassword()) {
            throw new \Exception('Invalid Username or Password.', 10);
        }
    }

    /**
     * @param SMS $sms
     * @throws \Exception
     */
    private function validateSMS(SMS $sms = null)
    {
        if (!$sms) {
            throw new \Exception('Invalid SMS Object.', 11);
        } else if (!$sms->getMsisdn()) {
            throw new \Exception('Invalid MSISDN.', 12);
        } else if (!$sms->getMobileOperator()) {
            throw new \Exception('Invalid Mobile Operator.', 14);
        } else if (!$sms->getMessageText()) {
            throw new \Exception('Invalid Text Message.', 15);
        }
    }
}