<?php

namespace App\Service;

class Pushall
{
    private $id;
    private $apiKey;

    protected $url = 'https://pushall.ru/api.php';

    public function __construct($apiKey, $id)
    {
        $this->id = $id;
        $this->apiKey = $apiKey;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($text, $title)
    {
        $data = [
            "type" => "self",
            "id" => $this->id,
            "key" => $this->apiKey,
            "text" => $text,
            "title" => $title,
        ];

        $client = new \GuzzleHttp\Client(['base_uri' => $this->url]);

        return  $client->post('', ['form_params' => $data]);

    }
}