<?php

namespace CodeonWeekends\USendIt\Interfaces;

/**
 * Interface USendItInterface
 * @package CodeonWeekends\USendIt\Interfaces
 *
 * @property string $url
 * @property string $username
 * @property string $password
 */
interface USendItInterface
{
    /**
     * @param SMSInterface $sms
     * @param bool $async
     * @return ScheduleResultInterface
     */
    public function sendMessage(SMSInterface $sms = null, $async = false) : ScheduleResultInterface;

    /**
     * This method allows to send SMS to multiple contacts at once.
     *
     * @param array $sms - the list of sms to sent.
     * @param bool $async
     * @return ScheduleResultInterface
     */
    public function sendMessages(array $sms, $async = false) : ScheduleResultInterface;

    /**
     * This method allows to count the total number of characters in a text message.
     *
     * @param string $message
     * @return CharacterCountResultInterface
     */
    public function smsCharCounter(string $message) : CharacterCountResultInterface;

    /**
     * @param string $partnerEventId
     * @return object
     */
    public function getPartnersEvents(string $partnerEventId) : object;

    /**
     * @param int $eventId
     * @return ScheduleResultInterface
     */
    public function getSchedule(int $eventId) : ScheduleResultInterface;

    /**
     * @param string $username
     * @param string $password
     * @return object
     */
    public function authenticateUser(string $username, string $password) : object;

    /**
     * @return object
     */
    public function getCreditPacks() : object;

    /**
     * @param int $packId
     * @param string $caller
     * @return object
     */
    public function buyCredits(int $packId, string $caller) : object;

    /**
     * @param AccountInterface $account
     * @param InvoiceInterface $invoiceInfo
     * @return object
     */
    public function createAccount(AccountInterface $account, InvoiceInterface $invoiceInfo) : object;

    /**
     * @param string $confirmationCode
     * @return object
     */
    public function confirmAccount(string $confirmationCode) : object;

    /**
     * @return object
     */
    public function resendConfirmationCode() : object;

    /**
     * @return object
     */
    public function getCountries() : object;

    /**
     * Set the async request to true for all requests if no argument is passed.
     * Default value is false.
     *
     * @param bool $value
     */
    public function isAsync(bool $value = true) : void;
}