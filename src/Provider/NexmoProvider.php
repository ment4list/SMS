<?php

namespace Mentalist\SMS\Provider;

use Mentalist\SMS\Exceptions\InvalidCredentialsException;

class NexmoProvider extends ProviderAbstract implements ProviderInterface
{

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
        $this->url = "https://rest.nexmo.com/";
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
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', $this->url . 'sms/json', [
            'form_params' => [
                'api_key' => $this->api_key,
                'api_secret' => $this->api_secret,
                'from' => 'NEXMO',
                'to' => implode(',', $recipients),
                'text' => $message
            ]
        ]);
    }

    /**
     * Get the available credits
     *
     * @return null||int The available credits. Null on error
     */
    public function getCredits() {
        $client = new \GuzzleHttp\Client();

        try {
            $params = [
                'api_key' => $this->api_key,
                'api_secret' => $this->api_secret,
            ];
            $res = $client->request( 'GET', $this->url . 'account/get-balance?'. http_build_query($params), [
            ] );
        } catch (\Exception $e) {
            throw $e;
        }


        if ( !$res ) {
            return null;
        } else {
            if( $res->getBody() ) {
                $json = json_decode($res->getBody()->getContents());
                return $json && $json->value ? $json->value : 0;
            }
            return 0;
        }
    }

}
