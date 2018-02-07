<?php

namespace Mentalist\SMS;

interface SMSInterface
{

    /**
     * Set the provider
     *
     * @return Mentalist\SMS\Provider The SMS provider
     */
    public function setProvider($provider);

    /**
     * Set the message
     *
     * @param  string $message The SMS message
     * @return void
     */
    public function setMessage($message);

    /**
     * Get the message
     *
     * @return string The SMS message
     */
    public function getMessage();

    /**
     * Get the message size
     *
     * @return int The amount of SMSs that will be sent
     */
    public function getSize();

    /**
     * Send the message
     *
     * @return void
     */
    public function send();

    /**
     * Get the recipients
     *
     * @return array An array of the recipients
     */
    public function getRecipients();

}
