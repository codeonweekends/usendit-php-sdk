<?php

namespace CodeonWeekends\USendIt\Tests;

use CodeonWeekends\USendIt\ScheduleResult;
use CodeonWeekends\USendIt\SMS;
use CodeonWeekends\USendIt\USendIt;
use Exception;
use PHPUnit\Framework\TestCase;

class SendMessageTest extends TestCase
{
    protected USendIt $usendit;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->usendit = new USendIt();
    }

    public function testUSendItIsObject()
    {
        $this->assertIsObject($this->usendit);
        $this->assertInstanceOf(USendIt::class, $this->usendit);
    }

    /**
     * @throws Exception
     */
    public function testInvalidUsernameOrPassword()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(10);
        $this->expectExceptionMessage('Invalid Username or Password.');

        $this->usendit->sendMessage(new SMS());
    }

    /**
     * @throws Exception
     */
    public function testInvalidSMS()
    {
        $this->usendit->setUsername('username_test');
        $this->usendit->setPassword('password');

        $this->expectExceptionCode(11);

        $this->usendit->sendMessage();
    }

    /**
     * @throws Exception
     */
    public function testSendMessage()
    {
        $sms = new SMS('258848914919', 22, 'Test message is sent');
        $uSendIt = new USendIt();
        $uSendIt->setUrl('https://apitest.usendit.co.mz/v2/remoteusendit.asmx');
        $uSendIt->setUsername('username');
        $uSendIt->setPassword('password');

        $response = $uSendIt->sendMessage($sms);

        $this->assertInstanceOf(ScheduleResult::class, $response);
    }
}