<?php

namespace CodeonWeekends\USendIt;

use CodeonWeekends\USendIt\Interfaces\AccountInterface;
use CodeonWeekends\USendIt\Interfaces\CharacterCountResultInterface;
use CodeonWeekends\USendIt\Interfaces\InvoiceInterface;
use CodeonWeekends\USendIt\Interfaces\ScheduleResultInterface;
use CodeonWeekends\USendIt\Interfaces\SMSInterface;
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
     * @param SMSInterface $sms
     * @param bool $async
     * @return ScheduleResultInterface
     * @throws \Exception
     */
    public function sendMessage(SMSInterface $sms = null, $async = false) : ScheduleResultInterface
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
     * @param SMSInterface $sms
     * @throws \Exception
     */
    private function validateSMS(SMSInterface $sms = null)
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

    /**
     * @inheritDoc
     */
    public function sendMessages(array $sms, $async = false): ScheduleResultInterface
    {
        // TODO: Implement sendMessages() method.
    }

    /**
     * @inheritDoc
     */
    public function smsCharCounter(string $message): CharacterCountResultInterface
    {
        // TODO: Implement smsCharCounter() method.
    }

    /**
     * @inheritDoc
     */
    public function getPartnersEvents(string $partnerEventId): object
    {
        // TODO: Implement getPartnersEvents() method.
    }

    /**
     * @inheritDoc
     */
    public function getSchedule(int $eventId): ScheduleResultInterface
    {
        // TODO: Implement getSchedule() method.
    }

    /**
     * @inheritDoc
     */
    public function authenticateUser(string $username, string $password): object
    {
        // TODO: Implement authenticateUser() method.
    }

    /**
     * @inheritDoc
     */
    public function getCreditPacks(): object
    {
        // TODO: Implement getCreditPacks() method.
    }

    /**
     * @inheritDoc
     */
    public function buyCredits(int $packId, string $caller): object
    {
        // TODO: Implement buyCredits() method.
    }

    /**
     * @inheritDoc
     */
    public function createAccount(AccountInterface $account, InvoiceInterface $invoiceInfo): object
    {
        // TODO: Implement createAccount() method.
    }

    /**
     * @inheritDoc
     */
    public function confirmAccount(string $confirmationCode): object
    {
        // TODO: Implement confirmAccount() method.
    }

    /**
     * @inheritDoc
     */
    public function resendConfirmationCode(): object
    {
        // TODO: Implement resendConfirmationCode() method.
    }

    /**
     * @inheritDoc
     */
    public function getCountries(): object
    {
        // TODO: Implement getCountries() method.
    }
}