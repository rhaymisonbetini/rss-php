<?php

namespace Rhaym\Rssphpbrasil\Services;

use GuzzleHttp\Client;
use Rhaym\Rssphpbrasil\Helpers\XmlHelper;
use Rhaym\Rssphpbrasil\Traits\ClearXmlArray;
use Rhaym\Rssphpbrasil\Traits\GuzzleTrait;

final class RssService
{
    use ClearXmlArray;
    use GuzzleTrait;


    /**
     * array or rss url in Brasil
     * @var Array
     */
    private $urlBrasil = [
        'r7' => 'https://noticias.r7.com:443/economia/feed.xml',
        'gazetaDoPovo' => 'https://www.gazetadopovo.com.br:443/feed/rss/economia.xml',
        'gazetaDopovoEntratain' => 'https://www.gazetadopovo.com.br:443/feed/rss/cultura.xml',
        'globoEntretain' => 'http://gshow.globo.com:80/rss/gshow',
        'g1' => 'https://g1.globo.com:443/rss/g1/politica',
        'elpais' => 'https://feeds.elpais.com:443/mrss-s/pages/ep/site/brasil.elpais.com/portada',
        'sportsBrasil' => 'https://www.gazetadopovo.com.br:443/feed/rss/esportes.xml',
        'tecBrasil' => 'https://rss.tecmundo.com.br:443/feed',
        'g1world' => 'https://g1.globo.com:443/rss/g1/mundo/',
        'gazetaDoPovoworld' => 'https://www.gazetadopovo.com.br:443/feed/rss/mundo.xml',
        'generalG1' => 'https://g1.globo.com:443/rss/g1/',
        'generalR7' => 'https://noticias.r7.com:443/feed.xml'
    ];
    
    /**
     * this method get a financial brazilian rss
     * @return array
     */
    public function getFinancialRss(): array
    {
        $r7 = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['r7']));
        $r7 = $this->r7GeneralClear($r7);
        $gazetaDoPovo = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['gazetaDoPovo']));
        $gazetaDoPovo = $this->gazetaDoPovoGeneral($gazetaDoPovo);
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
        $gazetaPovoEntretain = $this->gazetaDoPovoGeneral($gazetaPovoEntretain);
        return [$globo, $gazetaPovoEntretain];
    }

    /**
     * this method get a politics brazilian rss
     * @return array
     */
    public function getPolitcRss(): array
    {
        $elpais = $this->xmlHelper->decodeXmlWithMediacontent($this->GET($this->urlBrasil['elpais']));
        $elpais = $this->elPaisPolitcClear($elpais[0], $elpais[1]);
        $g1 = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['g1']));
        $g1 = $this->g1Generalclear($g1);
        return [$g1, $elpais];
    }


    /**
     * this method get a sport brazilian rss
     * @return array
     */
    public function getSportsRss(): array
    {
        $sportsBrasil = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['sportsBrasil']));
        $sportsBrasil = $this->gazetaDoPovoGeneral($sportsBrasil);
        return [$sportsBrasil];
    }

    /**
     * this method get a sport brazilian rss
     * @return array
     */
    public function getTecRss(): array
    {
        $tecBrasil = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['tecBrasil']));
        $tecBrasil = $this->tecmundoClear($tecBrasil);
        return [$tecBrasil];
    }

    /**
     * this method get a world news for Brasil peoples rss
     * @return array
     */
    public function getWorldRss(): array
    {
        $gazetaDoPovoworld = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['gazetaDoPovoworld']));
        $gazetaDoPovoworld = $this->gazetaDoPovoGeneral($gazetaDoPovoworld);
        $g1world = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['g1world']));
        $g1world = $this->g1Generalclear($g1world);
        return [$gazetaDoPovoworld, $g1world];
    }

     /**
     * this method get a general news rss
     * @return array
     */
    public function getGeneralRss():array
    {
        $generalG1 = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['generalG1']));
        $generalG1 = $this->g1Generalclear($generalG1);
        $generalR7 = $this->xmlHelper->decodeXml($this->GET($this->urlBrasil['generalR7']));
        $generalR7 = $this->r7GeneralClear($generalR7);
        return [$generalG1, $generalR7];
    }
}
