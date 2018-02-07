<?php

namespace Mentalist\SMS\Provider;

use Mentalist\SMS\Exceptions\InvalidCredentialsException;
use Mentalist\Logme\Logme;

/**
 * Writes SMS messages to a log file
 */
class LogProvider extends ProviderAbstract implements ProviderInterface
{

    var $logger;

    /**
     * Constructor
     *
     * @param string $key    The API key
     * @param string $secret The API secret
     * @return void
     */
    public function __construct($key, $secret)
    {
        parent::__construct($key, $secret);

        $dir = "/var/tmp/";
        $file = "SMS.log";

        $this->url = "{$dir}{$file}";

        $this->logger = new Logme($dir, $file);
    }

    /**
     * Send the message
     *
     * @param string $message    The message
     * @param array  $recipients The recipients
     *
     * @return void
     */
    public function send($message, $recipients)
    {
        $this->logger->info("SMS Sent!", [
            "message" => $message,
            "recipients" => implode(",", $recipients)
        ]);
    }

    /**
     * Get the available credits
     *
     * @return null||int The available credits. Null on error
     */
    public function getCredits() {
        return 0;
    }

}
