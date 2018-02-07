<?php

namespace Mentalist\SMS;

use Mentalist\SMS\Provider\NexmoProvider;
use Mentalist\SMS\Provider\LogProvider;

class ProviderTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @expectedException Mentalist\SMS\Exceptions\InvalidCredentialsException
     */
    public function testProviderKeyException()
    {
        $Provider = new NexmoProvider(null, null);
    }

    /**
     *
     */
    public function testLogProvider()
    {
        $Provider = new LogProvider('not', 'required');
        $SMS = new SMS($Provider);

        $recipient = '555-555-5555';
        $message = 'This is an SMS';

        $SMS->setProvider($Provider);

        $SMS->addRecipient($recipient);
        $SMS->setMessage($message);

        $SMS->send();

        // Check that the file was created
        $this->assertFileExists($Provider->getUrl());

        // Get the content
        $content = file_get_contents($Provider->getUrl());

        $this->assertContains($message, $content);
        $this->assertContains($recipient, $content);
    }
}

