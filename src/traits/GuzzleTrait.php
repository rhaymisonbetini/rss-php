<?php

namespace Rhaym\Rssphpbrasil\Traits;
use GuzzleHttp\Client;
use Rhaym\Rssphpbrasil\Helpers\XmlHelper;

trait GuzzleTrait
{
    /**
     * the Guzzle client
     */
    private $client;

    /**
     * the xml helper class to conver xml in php 
     * array struct client
     */
    private $xmlHelper;

    public function __construct()
    {
        $this->client = new Client();
        $this->xmlHelper = new XmlHelper();
    }

    /**
     * this function take a GET by guzzle in end point
     * to get XML. Reice a string endpoint to call
     * @param string 
     */
    public function GET(string $endpoint)
    {
        $response = $this->client->request('GET', $endpoint);
        return $response->getBody();
    }
}
