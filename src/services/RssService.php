<?php

namespace Rhaym\Rssphpbrasil\Services;

use GuzzleHttp\Client;
use Rhaym\Rssphpbrasil\Helpers\XmlHelper;
use Rhaym\Rssphpbrasil\Traits\ClearXmlArray;

final class RssService
{
    use ClearXmlArray;

    /**
     * r7 endoint rssprovider
     * @var string
     */
    private $r7 = 'https://noticias.r7.com:443/economia/feed.xml';

    /**
     * gazeta do povo endoint rss provider
     * @var string
     */
    private $gazetaDoPovo = 'https://www.gazetadopovo.com.br:443/feed/rss/economia.xml';

    /**
     * gazeta do povo entretain rss provider
     * @var string
     */
    private $gazetaDopovoEntratain = 'https://www.gazetadopovo.com.br:443/feed/rss/cultura.xml';

    /**
     * glogo entretain rss provider
     * @var string
     */
    private $globoEntretain = 'http://gshow.globo.com:80/rss/gshow';

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

    /**
     * this method get a financial brazilian rss
     * @return array
     */
    public function getFinancialRss(): array
    {
        $r7 = $this->xmlHelper->decodeXml($this->GET($this->r7));
        $r7 = $this->financialArrayR7($r7);
        $gazetaDoPovo = $this->xmlHelper->decodeXml($this->GET($this->gazetaDoPovo));
        $gazetaDoPovo = $this->financialArrayGazetaDoPovo($gazetaDoPovo);
        return [$gazetaDoPovo, $r7];
    }

    /**
     * this method get a entretain brazilian rss
     * @return array
     */
    public function getEntretainRss(): array
    {
        $globo = $this->xmlHelper->decodeXml($this->GET($this->globoEntretain));
        $globo = $this->globoEntretainClear($globo);
        return [$globo];
    }
}
