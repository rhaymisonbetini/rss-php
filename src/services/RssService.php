<?php

namespace Rhaym\Rssphpbrasil\Services;

use GuzzleHttp\Client;
use Rhaym\Rssphpbrasil\Helpers\XmlHelper;
use Rhaym\Rssphpbrasil\Traits\ClearXmlArray;

final class RssService
{
    use ClearXmlArray;

    /**
     * array or rss url in Brasil
     * @var Array
     */
    private $urlBrasil = [
        'r7' => 'https://noticias.r7.com:443/economia/feed.xml',
        'gazetaDoPovo ' => 'https://www.gazetadopovo.com.br:443/feed/rss/economia.xml',
        'gazetaDopovoEntratain' => 'https://www.gazetadopovo.com.br:443/feed/rss/cultura.xml',
        'globoEntretain' => 'http://gshow.globo.com:80/rss/gshow',
        'g1' => 'https://g1.globo.com:443/rss/g1/politica',
        'elpais' => 'https://feeds.elpais.com:443/mrss-s/pages/ep/site/brasil.elpais.com/portada'
    ];
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
        $r7 = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['r7']));
        $r7 = $this->financialArrayR7($r7);
        $gazetaDoPovo = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['gazetaDoPovo']));
        $gazetaDoPovo = $this->financialArrayGazetaDoPovo($gazetaDoPovo);
        return [$gazetaDoPovo, $r7];
    }

    /**
     * this method get a entretain brazilian rss
     * @return array
     */
    public function getEntretainRss(): array
    {
        $globo = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['globoEntretain']));
        $globo = $this->globoEntretainClear($globo);
        $gazetaPovoEntretain = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['gazetaDopovoEntratain']));
        $gazetaPovoEntretain = $this->gazetaDoPovoEntretain($gazetaPovoEntretain);
        return [$globo, $gazetaPovoEntretain];
    }

    /**
     * this method get a entretain brazilian rss
     * @return array
     */
    public function getPolitcRss(): array
    {
        $elpais = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['elpais']));
        $elpais = $this->elPaisPolitcClear($elpais);
        $g1 = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['g1']));
        $g1 = $this->g1Politiclear($g1);
        return [$g1, $elpais];
    }
}
