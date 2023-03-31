<?php

namespace Rhaym\Rssphpbrasil;

use Rhaym\Rssphpbrasil\Services\RssService;

class RssBrasil
{
    /**
     * Instance of rssService for 
     * get And acess any manys endpoints
     */
    private $rssService;

    /**
     * this constructor create a instance o rssService to 
     * call Guzzle and realize all gets int rss endpoints
     */
    public function __construct()
    {
        $this->rssService = new RssService();
    }

    /**
     * This method generate a All Rss array
     * @return array
     */
    function getRss(): array
    {
        $teste = $this->rssService->getFinancialRss();
        return $teste;
    }
}
