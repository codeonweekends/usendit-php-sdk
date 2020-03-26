<?php

namespace CodeonWeekends\USendIt\Interfaces;

use CodeonWeekends\USendIt\SMS;

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
     * USendItInterface constructor.
     * @param SMS|null $sms
     */
    public function __construct();

    /**
     * @param SMS $sms
     * @param bool $async
     * @return ScheduleResultInterface
     */
    public function sendMessage(SMS $sms = null, $async = false) : ScheduleResultInterface;

    /**
     * Set the async request to true for all requests if no argument is passed.
     * Default value is false.
     *
     * @param bool $value
     */
    public function isAsync(bool $value = true) : void;
}