<?php

namespace Mentalist\SMS\Provider;

interface ProviderInterface
{

    /**
     * Constructor
     *
     * @param string $key    The API key
     * @param string $secret The API secret
     * @return void
     */
    public function __construct($key, $secret);

    /**
     * Send the message
     *
     * @param string $message    The message
     * @param array  $recipients The recipients
     *
     *  @return void
     */
    public function send($message, $recipients);

    /**
     * Get the available credits
     * @return int|float
     */
    public function getCredits();

    /**
     * Get the message
     * @return string
     */
    public function getMessage();

}
