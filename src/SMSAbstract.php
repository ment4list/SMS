<?php

namespace Mentalist\SMS;

abstract class SMSAbstract
{

    /**
     * The SMS provider
     * @var Mentalist\SMS\Provider
     */
    protected $provider;

    /**
     * The message
     * @var string
     */
    protected $message;

    /**
     * Set the provider
     *
     * @param Mentalist\SMS\Provider $provider The SMS provider
     *
     * @return void
     */
    public function setProvider($provider) {
        $this->provider = $provider;
    }

    /**
     * Add a single recipient
     *
     * @param string $recipient The recipient's cellphone number
     *
     * @return void
     */
    public function addRecipient($recipient) {
        $this->recipients[] = $recipient;
    }

    /**
     * Add multiple recipients
     *
     * @param array $recipients An array of cellphone numbers
     *
     * @return void
     */
    public function addRecipients($recipients) {
        foreach ($recipients as $recipient) {
            $this->addRecipient($recipient);
        }
    }

    /**
     * Set multiple recipients
     *
     * @param array $recipients An array of recipients' cellphone numbers
     *
     * @return void
     */
    public function setRecipients($recipients) {
        $this->recipients = $recipients;
    }

    /**
     * Get the recipients
     *
     * @return array The recipients
     */
    public function getRecipients() {
        return $this->recipients;
    }

    /**
     * Clear the recipients
     *
     * @return void
     */
    public function clearRecipients() {
        $this->setRecipients([]);
    }

    /**
     * Set the message
     *
     * @param string $message The message
     *
     * @return void
     */
    public function setMessage($message) {
        $this->message = $message;
    }

    /**
     * Get the message
     *
     * @return string The message
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Clear the message
     *
     * @return void
     */
    public function clearMessage() {
        $this->message = "";
    }

    /**
     * Get the message size
     *
     * @return int The message length
     */
    public function getSize() {
        return strlen($this->message);
    }

}
