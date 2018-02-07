<?php

namespace Mentalist\SMS;

use Mentalist\SMS\Provider\NexmoProvider;
use Mentalist\SMS\Provider\LogProvider;

class SMSTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Test message being set
     */
    public function testSMSMessage()
    {
        $Provider = new NexmoProvider('abc', '123');
        $SMS = new SMS($Provider);

        $SMS->setMessage('This is a test');
        $this->assertEquals('This is a test', $SMS->getMessage());
    }

    /**
     * Test message size
     */
    public function testSMSSize()
    {
        $Provider = new LogProvider('not', 'required');
        $SMS = new SMS($Provider);

        $SMS->setMessage('This is a test');
        $this->assertEquals(14, $SMS->getSize());
    }

    /**
     * Test numbers being set
     */
    public function testSMSRecipients()
    {
        // Use default provider
        $SMS = new SMS();

        $numbers = [
            '555-555-5555',
            '123-555-5555',
            '123-123-1234',
        ];
        $SMS->addRecipient($numbers[0]);
        $this->assertContains($numbers[0], $SMS->getRecipients());


        $SMS->addRecipient($numbers[1]);
        // The new
        $this->assertContains($numbers[1], $SMS->getRecipients());
        // The old
        $this->assertContains($numbers[0], $SMS->getRecipients());

        $SMS->setRecipients([$numbers[2]]);
        // The only
        $recipients = $SMS->getRecipients();
        $this->assertEquals(1, count($recipients));
        $this->assertEquals($numbers[2], $recipients[0]);

        $SMS->clearRecipients();
        $this->assertEmpty($SMS->getRecipients());

        $SMS->clearMessage();
        $this->assertEmpty($SMS->getMessage());
    }
}
