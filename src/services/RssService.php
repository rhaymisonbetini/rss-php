<?php

namespace Rhaym\Rssphpbrasil\Services;

use GuzzleHttp\Client;
use Rhaym\Rssphpbrasil\Helpers\XmlHelper;
use Rhaym\Rssphpbrasil\Traits\ClearXmlArray;

final class RssService
{
    use ClearXmlArray;

    private $r7 = 'https://noticias.r7.com:443/economia/feed.xml';
    private $gazetaDoPovo = 'https://www.gazetadopovo.com.br:443/feed/rss/economia.xml';
    private $client;
    private $xmlHelper;

    public function __construct()
    {
        $this->client = new Client();
        $this->xmlHelper = new XmlHelper();
    }

    public function GET($endpoint)
    {
        $response = $this->client->request('GET', $this->r7);
        return $response->getBody();
    }


    public function getFinancialRss()
    {
        $r7 = $this->xmlHelper->decodeXml($this->GET($this->r7));  
        $gazetaDoPovo = $this->xmlHelper->decodeXml($this->GET($this->gazetaDoPovo));  
    }
}
