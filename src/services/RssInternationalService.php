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
       'us' => 'https://rss.nytimes.com/services/xml/rss/nyt/US.xml'
    ];

    public function unitedStates()
    {
        $us = $this->xmlHelper->decodeXmlWithMediacontent($this->GET($this->urlIrnational['us']));
        $us = $this->euaNews($us[0], $us[1]);
    }

    public function europe()
    {

    }
}