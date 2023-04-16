<?php

namespace Rhaym\Rssphpbrasil;

use Rhaym\Rssphpbrasil\Services\RssInternationalService;
use Rhaym\Rssphpbrasil\Services\RssService;

class RssBrasil
{
    /**
     * Instance of rssService for 
     * get And acess any manys endpoints
     */
    private $rssService;


    /**
     * Instance of rssInternationalService for 
     * get And acess any manys endpoints of international news
     */
    private $rssInternationalService;

    /**
     * this constructor create a instance o rssService to 
     * call Guzzle and realize all gets int rss endpoints
     */
    public function __construct()
    {
        $this->rssService = new RssService();
        $this->rssInternationalService = new RssInternationalService();
    }

    /**
     * This method generate a All Rss array
     * @return array
     */
    function getRss(): array
    {
        // $financial = $this->rssService->getFinancialRss();
        // $entretain = $this->rssService->getPolitcRss();
        $getWorldRss = $this->rssInternationalService->europe();
        // print_r($getWorldRss[0]);
        print_r($getWorldRss);
        // print_r($entretain[1]);
        // return $entretain;
        return [];
    }
}   
