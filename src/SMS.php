<?php

namespace Mentalist\SMS;

use Mentalist\SMS\Exceptions\InvalidMessageException;
use Mentalist\SMS\Provider\LogProvider;

class SMS extends SMSAbstract implements SMSInterface
{

    /**
     * Create a new SMS Instance
     *
     * @param \Mentalist\SMS\Provider $provider The SMS provider
     */
    public function __construct()
    {
        // Set the default provider
        $this->provider = new LogProvider('not', 'required');
    }

    /**
     * Send the message
     *
     * @throws InvalidMessageException
     * @return void
     */
    public function send()
    {
        if( !$this->getSize() ) {
            throw new InvalidMessageException("No message set");
        }

        $this->provider->send($this->message, $this->getRecipients());
    }

    /**
     * Get available credits
     *
     * @return float|int|null
     */
    public function getCredits()
    {
        return $this->provider->getCredits();
    }
}
