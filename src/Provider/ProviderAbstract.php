<?php

namespace Mentalist\SMS\Provider;

use \Mentalist\SMS\Exceptions\InvalidCredentialsException;

abstract class ProviderAbstract
{

    protected $url;

    protected $api_key;
    protected $api_secret;

    protected $recipients = [];
    protected $message = "";

    /**
     * Constructor
     *
     * @param string $key    The API key
     * @param string $secret The API secret
     * @return void
     */
    public function __construct($key, $secret)
    {
        $this->api_key    = $key;
        $this->api_secret = $secret;

        if( !$this->api_key || !$this->api_secret ) {
            throw new InvalidCredentialsException("Credentials incomplete");
        }
    }

    /**
     * Set the message
     * @param string $message The message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get the message
     * @return string The message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the URL
     * @return string The URL
     */
    public function getUrl()
    {
        return $this->url;
    }

}
