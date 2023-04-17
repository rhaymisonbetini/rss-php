<?php

namespace Rhaym\Rssphpbrasil\Services;

use Rhaym\Rssphpbrasil\Traits\ClearXmlInternational;
use Rhaym\Rssphpbrasil\Traits\GuzzleTrait;

class RssInternationalService
{
    use ClearXmlInternational;
    use GuzzleTrait;

    /**
     * array or rss url in Brasil
     * @var Array
     */
    private $urlIrnational = [
       'us' => 'https://rss.nytimes.com/services/xml/rss/nyt/US.xml',
       'europe' => 'https://news.un.org/feed/subscribe/en/news/region/europe/feed/rss.xml'
    ];

    public function unitedStates()
    {
        $us = $this->xmlHelper->decodeXmlWithMediacontent($this->GET($this->urlIrnational['us']));
        $us = $this->euaNews($us[0], $us[1]);
        return $us;
    }

    public function europe()
    {
        $europe = $this->xmlHelper->decodeXml($this->GET($this->urlIrnational['europe']));
        $europe = $this->europeNews($europe);
        return $europe;
    }
}