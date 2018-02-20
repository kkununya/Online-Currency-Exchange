<?php
namespace app;

use GuzzleHttp\Client;

class Api
{
    private $client;
    private $URL = 'http://localhost:8080';
    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
    }

    public function getMethod($path)
    {
        return $this->client->get($this->URL . $path);
    }


    public function postMethod($path, $body)
    {

        return $this->client->post($this->URL . $path,
            ['body' => json_encode($body)]
        );
    }
    public function putMethod($path, $body)
    {
        return $this->client->put($this->URL . $path,
            ['body' => json_encode($body)]
        );

    }

    public function deleteMethod($path, $body)
    {
        return $this->client->delete($this->URL . $path,
            ['body' => json_encode($body)]
        );

    }
}