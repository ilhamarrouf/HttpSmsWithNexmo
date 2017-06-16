<?php

namespace App\Extensions\Sms;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException as GuzzleException;

/**
* 
*/
class SmsHandler
{
    protected $apiKey;
    protected $apiSecret;
    protected $request;
    protected $url = 'https://rest.nexmo.com/sms/json';

    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey    = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->request   = new Client;
    }

    public function to($to)
    {
        $this->to = $to;

        return $this;
    }

    public function message(string $message)
    {
        $this->message = $message;

        return $this;
    }

    public function send()
    {
        try {
            $client = $this->request->post($this->url, [
                'json' => [
                    'api_key' => $this->apiKey,
                    'api_secret' => $this->apiSecret,
                    'to' => $this->to,
                    'from' => 'Ilham Arrouf',
                    'text' => $this->message
                ]
            ]);
        } catch (GuzzleException $e) {
            return false;
        }

        return true;
    }
}