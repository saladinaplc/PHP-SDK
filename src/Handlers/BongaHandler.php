<?php


namespace BongaTech\Api\Handlers;


use BongaTech\Api\Exceptions\BongaException;
use BongaTech\Api\Models\Sms;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

abstract class BongaHandler
{
    const BASE_URL = "https://bulk.bongatech.co.ke/api/";

    /**
     * @var string
     */
    protected $token;

    protected $sms;

    protected $uri;

    /**
     * BongaHandler constructor.
     * @param string $token
     * @param $sms
     * @param $uri
     * @throws \Exception
     */
    public function __construct(string $token, string $uri, Sms ...$sms)
    {
        $this->token = $token;
        $this->sms = $sms;
        $this->uri = $uri;
    }

    public function process(){
        foreach ($this->sms as $index=>$message){
            $this->validate($index, $message);
        }
        return $this->sendRequest();
    }


    protected function constructHeader(): array
    {
        return [
            "Content-type" => "application/json",
            "Accept" => "application/json",
            "Authorization" => "Bearer $this->token"
        ];
    }

    protected function sendRequest()
    {
        $client = new Client();
        try {
            $results = $client->post(self::BASE_URL . $this->uri,
                [
                    RequestOptions::JSON => $this->sms,
                    RequestOptions::HEADERS => $this->constructHeader()
                ]);
            return json_decode($results->getBody(), true);
        } catch (RequestException $exception) {
            return json_decode($exception->getResponse()->getBody(), true);
        }
    }

    protected function validate(int $index, Sms $message)
    {
        if (!$message->getSender())
            throw new \Exception("Sender is Required \n");
        if (!$message->getPhone())
            throw new \Exception("Phone Number is Required \n");
        if (!$message->getMessage())
            throw new \Exception("Message is Required \n");
    }
}
